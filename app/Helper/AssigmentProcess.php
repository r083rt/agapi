<?php 
namespace App\Helper;

use DB;
class AssigmentProcess{
    public static function getQualityDescription($score){
        $arr = [
            ['score'=>0.96,
            'text'=>'Kualitas Luar Biasa'],
            ['score'=>0.91,
            'text'=>'Kualitas Sangat Baik'],
            ['score'=>0.86,
            'text'=>'Kualitas Sangat Bagus'],
            ['score'=>0.81,
            'text'=>'Kualitas Bagus'],
            ['score'=>0.76,
            'text'=>'Kualitas Berpotensi'],
            ['score'=>0.71,
            'text'=>'Kualitas Memadai'],
            ['score'=>0.66,
            'text'=>'Kualitas Lumayan'],
            ['score'=>0.61,
            'text'=>'Kualitas Berkembang'],
            ['score'=>0.56,
            'text'=>'Kualitas Cukup'],
            ['score'=>0.51,
            'text'=>'Kualitas Biasa'],
        ];
        foreach($arr as $k=>$v){
            if($score>=$v['score'])return $v['text'];
        }
        return 'Kualitas Kurang';

    }
    public static function calculatePaidAssigmentTopsis($is_verbose=false){
        $assigmentPivot = DB::table('assigment_sessions as ass')
        ->selectRaw(' ass.id,ass.assigment_id,a2.is_paid,std(ass.total_score) as score, count(1) as scores_count')
        ->join('assigments as a2','a2.id', '=', 'ass.assigment_id')
        ->whereNull('a2.teacher_id') // teacher_id NULL adalah master paket soal
        ->where('ass.type','paid') // hanya mengambil sessions dari pengerjaan paket soal premium, sehingga sessions dari latihan mandiri tidak ikut terambil
        ->groupBy('a2.id');

        $query = DB::table('assigments as a')
        ->selectRaw('a.id,a.user_id,a.name,a.topic,a.is_paid,
        assigment_pivot.score, assigment_pivot.scores_count')
        ->joinSub($assigmentPivot, 'assigment_pivot', function($join){
            $join->on('assigment_pivot.assigment_id', '=', 'a.id');
        })
        ->where('a.is_paid','>',0)  
        ->whereNull('a.teacher_id') // teacher_id NULL adalah master paket soal
        ->orderBy('a.id','desc');

        $attributes = ['scores_count'=>['type'=>'benefit'],
        'score'=>['type'=>'cost']
        ];
        $dataset = $query->get();

        if($is_verbose)echo count($dataset)." master paket soal berbayar -> ";

        $topsis = new \App\Helper\Topsis($attributes, $dataset);
        $topsis->enableEntropyWeightMethod(); //aktifkan pembobotan otomatis
        $topsis->addPreferenceAttribute();
        $ranking = $topsis->calculate();


        $insert = [];
        $datetime = \Carbon\Carbon::now();
        foreach($ranking as $key=>$assigment){
            array_push($insert, ['assigment_id'=>$assigment->id,
            'score'=>$assigment->preference_score,
            'created_at'=> $datetime,
            'updated_at'=> $datetime,
            'rank'=>$key+1
            ]);
          
        }
        $cok = DB::table('top_paid_assigments')->insert($insert);
        if($is_verbose)echo $cok?"sukses insert\n":"gagal insert\n";
    }
    public static function paidAssigmentScoring($where_funct=null){
        $latestScoring = DB::table('top_paid_assigments')
        ->selectRaw('assigment_id,max(id) as max_id')
        ->groupBy('assigment_id');

        $query = DB::table('assigments as a')->selectRaw('
        a.id,a.is_paid,latest_scoring.max_id,tpa.created_at,tpa.score,tpa.rank
        ')
        ->joinSub($latestScoring, 'latest_scoring', function($join){
            $join->on('latest_scoring.assigment_id','=','a.id');
        })
        ->join('top_paid_assigments as tpa','tpa.id', '=', 'latest_scoring.max_id')
        ->where('a.is_paid','>',0)
        ->whereNull('a.teacher_id');

        if(is_callable($where_funct)){
            $query->where($where_funct);
        }
        return $query;
    }
}