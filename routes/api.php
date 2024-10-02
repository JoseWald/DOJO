<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/post',function(){
    return response()->json([
        'posts'=>[
            ['TITLE'=>'post 1']
        ]
    ]);
});