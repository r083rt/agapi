<?php 
namespace App\Helper;
class Topsis{

    private $attributes;
    private $data;
    private $sorted_data;
    private $normalizedData;
    private $positiveIdealSolution;
    private $negativeIdealSolution;
    private $preferences;
    private $is_add_preference_column = false;
    private $is_entropy = false;
    public function __construct($attributes, $data){
        /*
        usage:  $attributes = ['scores_count'=>['weight'=>5, 'type'=>'benefit'],
        'score'=>['weight'=>4, 'type'=>'cost']
        ];
        new Topsis($attribute, $data);
        */
        if(!is_array($attributes)){
            echo "Attributes harus array";
            die;
        }
        $this->attributes = $attributes;
        $this->normalizedData = [];
        $this->preferences = [];
        $this->data = $data;
        $count = count($this->data);
        for($i=0; $i<$count; $i++){
            $copy = clone $this->data[$i];
            array_push($this->normalizedData,  $copy);
        }

    }
    public function calculateAttributeEntropy(){
        //referensi: https://www.hindawi.com/journals/mpe/2020/3564835/

        $count = count($this->data);
        if($count===1)return;
        $E_arr = [];
        foreach($this->attributes as $attribute=>$options){
            $sum=0;
            //hitung sum
            for($i=0; $i<$count; $i++){
                $sum +=  $this->data[$i]->{$attribute};
            }
            // hitung P[i][j] => ith atribut/indikator, jth sample
            $P[$attribute] = [];
            for($i=0; $i<$count; $i++){
                $P[$attribute][$i] =  $this->data[$i]->{$attribute}/$sum;
            }

            $sum2 = 0;
            for($i=0; $i<$count; $i++){
                if($P[$attribute][$i]>0){
                    $sum2 += $P[$attribute][$i] * log($P[$attribute][$i]);
                }
            }
            $E_arr[$attribute] = (-1*$sum2)/log($count); 

        }

        $sum = array_sum($E_arr);
        foreach($E_arr as $key=>$E){
            $w = (1-$E)/$sum;
            //masukkan $w ke weight tiap atribut
            $this->attributes[$key]['weight'] = $w;
        }
      
    }
    public function calculate(){

        if($this->is_entropy){
            $this->calculateAttributeEntropy();
        }
        
        $this->normalize();
        $this->calculatePreferences();
        $this->sortPreferences();
        return $this->sorted_data;
    }
    public function normalize(){
        $count = count($this->data);
        foreach($this->attributes as $attribute=>$options){
            $sum=0;
            for($i=0; $i<$count; $i++){
                $sum +=  pow($this->data[$i]->{$attribute}, 2);
            }
            $sqrt = sqrt($sum);
    
            for($i=0; $i<$count; $i++){
                $y = $options['weight'] * ($this->data[$i]->{$attribute}/$sqrt);
                $this->normalizedData[$i]->{$attribute} = $y;
            }
            // min max untuk solusi ideal
            $min = $max = $this->normalizedData[0]->{$attribute};
            for($i=0; $i<$count; $i++){
                $value =  $this->normalizedData[$i]->{$attribute};
                if($value<$min)$min=$value;
                if($value>$max)$max=$value;
            }

            if($options['type']==='benefit'){
                $this->positiveIdealSolution[$attribute] = $max;
                $this->negativeIdealSolution[$attribute] = $min;
            }else{
                // selain atribut benefit, yaitu atribut cost 
                $this->positiveIdealSolution[$attribute] = $min;
                $this->negativeIdealSolution[$attribute] = $max;
            }        
        }

    }
    public function calculatePreferences(){
        $count = count($this->data);
        for($i=0; $i<$count; $i++){
            $distance_p = 0;
            $distance_n = 0;
            foreach($this->attributes as $attribute=>$options){
                $distance_p += pow($this->positiveIdealSolution[$attribute] - $this->normalizedData[$i]->{$attribute},2);
                $distance_n += pow($this->negativeIdealSolution[$attribute] - $this->normalizedData[$i]->{$attribute},2);
            }
            $distance_p = sqrt($distance_p);
            $distance_n = sqrt($distance_n);
            // dd([$distance_n, $distance_p]);
            $divider = $distance_n + $distance_p;
            if($divider==0)$divider = $count;
            array_push($this->preferences, $distance_n / $divider);
        }
    }
    public function addPreferenceAttribute(){
        $this->is_add_preference_column = true;
    }
    public function enableEntropyWeightMethod(){
        $this->is_entropy = true;   
    }
    private function cmp($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? 1 : -1;
    }      
    public function sortPreferences(){
       
        $this->sorted_data = [];
        uasort($this->preferences, array($this,'cmp'));
        foreach($this->preferences as $key=>$preference){
            $obj = $this->data[$key];
            if($this->is_add_preference_column){
                $obj->preference_score = $preference;
            }
            array_push($this->sorted_data, $obj);
        }
    }
    

}
