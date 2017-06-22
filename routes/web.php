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

    //Dancer
    Route::get('/dancer', 'DancerController@index');
});

Route::resource('dancer', 'DancerController');

//后台管理部分
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');
});

Route::get('/dashboard/{path?}', 'Admin\DashboardController@index')->where('path', '[\/\w\.-]+');
