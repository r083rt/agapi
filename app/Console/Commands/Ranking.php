<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\PayableAssigmentNotification;
use App\Notifications\PayableQuestionListNotification;
use App\Models\User;
use DB;
class Ranking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    private $percentage = 0.01;
    protected $signature = 'ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengambil 1% data tertinggi kemudian set is_paid';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->assigmentsRanking();
        $this->questionListsRanking();
        // print_r($assigment_ids);
        
        return 0;
       
    }
    private function assigmentsRanking(){
        //referensi file: top_assigments2.sql

        //subquery yg dipakai untuk join
        $topAssigments = DB::table('top_assigments')->selectRaw('created_at,assigment_id,max(id) as max_id')
        ->groupBy('assigment_id');
        
        $population = DB::table('assigments as a')->selectRaw('a.id,a.user_id,a.code,a.name,a.topic,ta2.score as latest_score,ta2.created_at')
        ->joinSub($topAssigments,'ta',function($join){
            $join->on('ta.assigment_id', '=', 'a.id');
        })
        ->join('top_assigments as ta2','ta2.id','=','ta.max_id')
        ->whereNotNull('ta2.score')
        ->where(function($query){
            $query->where('is_paid',-1)->orWhereNull('is_paid');
        })
        ->orderBy('ta2.score', 'desc');
        $count = $population->count();
        $limit = round($this->percentage*($count)); 
        
        #nilai is_paid
        # -1 konfirmsasi berbayar atau tidak
        # NULL belum dicek
        # 0 terkonfirmasi TIDAK terbayar. TIDAK usah dilakukan pengecekan lgi
        # >0 terkonfirmasi terbayar. TIDAK usah dilakukan pengecekan lagi

        $sample = $population->limit($limit)->get(); //mengambil 10% dari total populasi

        //update is_paid = -1 di table assigments, menandakan hrus konfirmasi apakah mau dijadikan soal berbayat
        $assigment_ids = [];
        foreach($sample as $data){
            array_push($assigment_ids, $data->id);
        }
        print_r($assigment_ids);
        $updated_count = DB::table('assigments')->whereIn('id',$assigment_ids)->update([
            'is_paid'=>-1]);
        echo "{$updated_count} assigments updated\n";
        
        // notifikasi dan hapus notifikasi lama
        foreach($sample as $assigment){
            $user = User::find($assigment->user_id);
            $removeNotification =  $user->notifications()->where('data->assigment->id', $assigment->id)
            ->where('type', 'App\Notifications\PayableAssigmentNotification')
            ->delete();
            echo $removeNotification."\n";
            $user->notify(new PayableAssigmentNotification($assigment));
            
            
            // return 0;
        }
      

     
    }
    private function questionListsRanking(){
        //referensi file: top_assigments2.sql

        //subquery yg dipakai untuk join
        $topQuestionLists = DB::table('top_question_lists')->selectRaw('created_at,question_list_id,max(id) as max_id')
        ->groupBy('question_list_id');
        
        $population = DB::table('question_lists as ql')->selectRaw('ql.id,aql.creator_id,ql.name,tql2.score as latest_score,tql2.created_at')
        ->joinSub($topQuestionLists,'tql',function($join){
            $join->on('tql.question_list_id', '=', 'ql.id');
        })
        ->join('top_question_lists as tql2','tql2.id','=','tql.max_id')
        ->join('assigment_question_lists as aql','aql.question_list_id','=','ql.id')
        ->whereNotNull('tql2.score')
        ->where(function($query){
                $query->where('is_paid',-1)->orWhereNull('is_paid');
        })
        ->orderBy('tql2.score', 'desc');
        $count = $population->count();
        $limit = round($this->percentage*($count)); 

          #nilai is_paid
        # -1 konfirmsasi berbayar atau tidak
        # NULL belum dicek
        # 0 terkonfirmasi TIDAK terbayar. TIDAK usah dilakukan pengecekan lgi
        # >0 terkonfirmasi terbayar. TIDAK usah dilakukan pengecekan lagi

        $sample = $population->limit($limit)->get(); //mengambil 10% dari total populasi

        //update is_paid = -1 di table assigments, menandakan hrus konfirmasi apakah mau dijadikan soal berbayat
        $question_list_ids = [];
        foreach($sample as $data){
            array_push($question_list_ids, $data->id);
        }
        print_r($question_list_ids);
        $updated_count = DB::table('question_lists')->whereIn('id',$question_list_ids)->update([
            'is_paid'=>-1]); //-1 = konfirmsasi berbayar atau tidak
        echo "{$updated_count} question_lists updated\n";
        // return 0;
         // notifikasi dan hapus notifikasi lama
        foreach($sample as $question_list){
            $user = User::find($question_list->creator_id);
            $removeNotification =  $user->notifications()->where('data->question_list->id', $question_list->id)
            ->where('type', 'App\Notifications\PayableQuestionListNotification')
            ->delete();
            echo $removeNotification."\n";
            $question_list->name = strip_tags($question_list->name); //hapus tag html dri soal
            $user->notify(new PayableQuestionListNotification($question_list)); 
            // return 0;
        }
        
       
    }
}
