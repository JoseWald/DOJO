<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//All listing
Route::get('/', function () {
    return view('listings',[
        'heading'=>'latest listing',
        'listings'=>Listing::all()
    ]);
});

//Single listing
Route::get('/list/{id}',function($id){
    return view('listing',[
        'listing'=>Listing::find($id)
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