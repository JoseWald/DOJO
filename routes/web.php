<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

//All listing
Route::get('/', [ListingController::class, 'index']);


//Show create form
Route::get('/list/create', [ListingController::class, 'create']);


//Single listing
Route::get('/list/{listing}',[ListingController::class, 'show']);

//Store the listing data
Route::post('/listing',[ListingController::class, 'store']);

//Show edit form
Route::get('/list/{listing}/edit',[ListingController::class, 'edit']);

//Submit the updated post
Route::put('/list/{listing}',[ListingController::class, 'update']);

//Deleting post
Route::delete('/list/{listing}',[ListingController::class, 'delete']);

//Show register create form
Route::get('/register',[UserController::class,'register']);

//Create new user
Route::post('/users',[UserController::class, 'store']);

//Logging out
Route::post('/logout',[UserController::class,'logout']);

//Show login form
Route::get('/login',[UserController::class, 'login']);

//Route to login
Route::post('/users/login',[UserController::class, 'authenticate']);

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