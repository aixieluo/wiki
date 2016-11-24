<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('home.index');
});



Route::group(['namespace'=>'Home'], function (){
    //auth login register
    Auth::routes();

    //
    Route::get('home', 'HomeController@index');

    //dancer
    Route::resource('dancer', 'DancerController');
});

