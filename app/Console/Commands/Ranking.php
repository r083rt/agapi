<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\PayableAssigmentNotification;
use App\Notifications\PayableQuestionListNotification;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use DB;
class Ranking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   
    protected $signature = 'ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengambil n% data tertinggi kemudian set is_paid';

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

        Log::channel('topsis')->info("[+] Paket soal");
        $this->assigmentsRanking(0.2, 0.3);

        Log::channel('topsis')->info("[+] Butir soal pilihan ganda");
        $this->questionListsRanking(["selectoptions"], 0.2, 0.3);

        Log::channel('topsis')->info("[+] Butir soal uraian");
        $this->questionListsRanking(["textfield","textarea"], 0.2, 0.3);
        // print_r($assigment_ids);
        
        return 0;
       
    }
    private function assigmentsRanking($percentage=0.1, $min_score=0.3){
        //referensi file: top_assigments2.sql
        Log::channel('topsis')->info("[+]Mengambil $percentage paket soal dari keseluruhan soal yang memiliki minimal skor $min_score");
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
            // $query->where('is_paid',-1)->orWhereNull('is_paid');
            $query->whereNull('is_paid');
        })
        ->where('ta2.score', '>=',$min_score)
        ->orderBy('ta2.score', 'desc');
        $count = $population->count();
        Log::channel('topsis')->info("[+] total data: {$count}");
        $limit = round($percentage*($count)); 
        Log::channel('topsis')->info("[+] data diambil: {$limit}");
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
        // print_r($assigment_ids);
        $updated_count = DB::table('assigments')->whereIn('id',$assigment_ids)->update([
            'is_paid'=>-1]);
        Log::channel('topsis')->info("[+] {$updated_count} assigments updated to -1");
        
        // notifikasi dan hapus notifikasi lama
        Log::channel('topsis')->info("[+] removeNotification:");
        $log='';
        foreach($sample as $assigment){
            $user = User::find($assigment->user_id);
            $removeNotification =  $user->notifications()->where('data->assigment->id', $assigment->id)
            ->where('type', 'Appotifications\PayableAssigmentNotification')
            ->delete();
            $log.= "\n$removeNotification ";
            $user->notify(new PayableAssigmentNotification($assigment));
            $log.= " -> Skor assigment id {$assigment->id}: {$assigment->latest_score}";
            // return 0;
        }
        Log::channel('topsis')->info($log."\n");
      

     
    }
    private function questionListsRanking($assigment_type=["selectoptions"], $percentage=0.01, $min_score=0.3){
      
        Log::channel('topsis')->info("[+] Mengambil $percentage paket soal dari keseluruhan butir soal yang memiliki minimal skor $min_score");
        // print_r($assigment_type);
        //referensi file: top_assigments2.sql

        //subquery yg dipakai untuk join
        $topQuestionLists = DB::table('top_question_lists')->selectRaw('created_at,question_list_id,max(id) as max_id')
        ->groupBy('question_list_id');
        
        $population = DB::table('question_lists as ql')->selectRaw('distinct ql.id,aql.creator_id,ql.name,tql2.score as latest_score,tql2.created_at')
        ->joinSub($topQuestionLists,'tql',function($join){
            $join->on('tql.question_list_id', '=', 'ql.id');
        })
        ->join('top_question_lists as tql2','tql2.id','=','tql.max_id')
        ->join('assigment_question_lists as aql','aql.question_list_id','=','ql.id')
        ->join('assigment_types as att', 'aql.assigment_type_id','=','att.id')
        ->whereNotNull('tql2.score')
        ->where(function($query){
                // $query->where('is_paid',-1)->orWhereNull('is_paid');
                $query->whereNull('is_paid');
        })
        ->whereIn('att.description',$assigment_type)
        // ->groupBy('aql.question_list_id')
        ->where('tql2.score', '>=',$min_score)
        ->orderBy('tql2.score', 'desc');
      
        $count = $population->count();
        $limit = round($percentage*($count)); 

        Log::channel('topsis')->info("[+] total data: {$count}");
        Log::channel('topsis')->info("[+] data diambil: {$limit}");
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
        // print_r($question_list_ids);
        $updated_count = DB::table('question_lists')->whereIn('id',$question_list_ids)->update([
            'is_paid'=>-1]); //-1 = konfirmsasi berbayar atau tidak

        Log::channel('topsis')->info("{$updated_count} question_lists updated to -1");
        // return 0;
         // notifikasi dan hapus notifikasi lama
        Log::channel('topsis')->info("[+] removeNotification:");
        $log = '';
        foreach($sample as $question_list){
            $user = User::find($question_list->creator_id);
            $removeNotification =  $user->notifications()->where('data->question_list->id', $question_list->id)
            ->where('type', 'Appotifications\PayableQuestionListNotification')
            ->delete();
            $log.="\n".$removeNotification;
            $question_list->name = strip_tags($question_list->name); //hapus tag html dri soal
            $user->notify(new PayableQuestionListNotification($question_list)); 
            $log.=" -> Skor question_list id {$question_list->id}: {$question_list->latest_score}";
            // return 0;
        }
        Log::channel('topsis')->info($log."\n");
        
       
    }
}
