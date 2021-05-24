<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
    protected $description = 'Mengambil 10% data tertinggi kemudian set is_paid';

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
        
        $population = DB::table('assigments as a')->selectRaw('a.id,a.user_id,a.name,a.topic,ta2.score as latest_score,ta2.created_at')
        ->joinSub($topAssigments,'ta',function($join){
            $join->on('ta.assigment_id', '=', 'a.id');
        })
        ->join('top_assigments as ta2','ta2.id','=','ta.max_id')
        ->whereNotNull('ta2.score')
        ->orderBy('ta2.score', 'desc');
        $count = $population->count();
        $limit = round(0.1*($count)); 
        
        $sample = $population->limit($limit)->get(); //mengambil 10% dari total populasi

        //update is_paid = -1 di table assigments, menandakan hrus konfirmasi apakah mau dijadikan soal berbayat
        $assigment_ids = [];
        foreach($sample as $data){
            array_push($assigment_ids, $data->id);
        }
        echo DB::table('assigments')->whereIn('id',$assigment_ids)->update([
            'is_paid'=>-1]);
    }
    private function questionListsRanking(){
         //referensi file: top_assigments2.sql

        //subquery yg dipakai untuk join
        $topAssigments = DB::table('top_assigments')->selectRaw('created_at,assigment_id,max(id) as max_id')
        ->groupBy('assigment_id');
        
        $population = DB::table('assigments as a')->selectRaw('a.id,a.user_id,a.name,a.topic,ta2.score as latest_score,ta2.created_at')
        ->joinSub($topAssigments,'ta',function($join){
            $join->on('ta.assigment_id', '=', 'a.id');
        })
        ->join('top_assigments as ta2','ta2.id','=','ta.max_id')
        ->whereNotNull('ta2.score')
        ->orderBy('ta2.score', 'desc');
        $count = $population->count();
        $limit = round(0.1*($count)); 
        
        $sample = $population->limit($limit)->get(); //mengambil 10% dari total populasi

        //update is_paid = -1 di table assigments, menandakan hrus konfirmasi apakah mau dijadikan soal berbayat
        $assigment_ids = [];
        foreach($sample as $data){
            array_push($assigment_ids, $data->id);
        }
        echo DB::table('assigments')->whereIn('id',$assigment_ids)->update([
            'is_paid'=>-1]);
    }
}
