<?php

namespace App\Services;

class CheckFormSearchData{

    public static function CreateQuery($formSearchData, $query){
        if($formSearchData !== null){

            // 全角スペース入力　→　半角スペース変換
            $searchData_arrange = mb_convert_kana($formSearchData, 's');
            // 入力データを空白で区切る
            $searchData_split = preg_split('/[\s]+/', $searchData_arrange,-1,PREG_SPLIT_NO_EMPTY);

            // 区切った値をループで回す
            foreach($searchData_split as $value){
                $query = $query->where('your_name', 'like', '%' .$value. '%');
            }
            return $query;
        };

    }
}
