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
    Route::get('/home', 'HomeController@index');

    //dancer
    Route::resource('/dancer', 'DancerController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');


    Route::resource('/dancer', 'DancerController');

    Route::resource('/type', 'DancerTypeController');
});

Route::get('/dashboard', 'Admin\DashboardController@index');
