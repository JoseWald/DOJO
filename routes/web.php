<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('listing',[
        'heading'=>'latest listing',
        'listings'=>[
            [
                'id'=> 1 ,
                'title'=>'Listing 1',
                'description'=>"Arono what to write here"
            ],
        ]
    ]);
});

Route::get('/hello',function () { 
    return response('Hello',401)->header('Content-Type', 'application')
    ->header('foo', 'bar'); 
});

Route::get('/posts/{id}',function($id){
    return response($id);
})->where('id', '[0-9]+');

Route::get('/search',function(Request $request){
    return $request->name.'  '.$request->city;
});