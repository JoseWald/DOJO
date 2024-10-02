<?php
namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
                'id'=> 1 ,
                'title'=>'Listing 1',
                'description'=>"Arono what to write here"
            ],
            [
                'id'=> 2 ,
                'title'=>'Listing 2',
                'description'=>"Arono what to write here (2)"
            ]
        ];
    }

    public static function find($id){
        $listings=self::all();

        foreach($listings as $list){
            if($list['id'] == $id){
                return $list;
            }
        }
    }
}