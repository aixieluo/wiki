<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


/*part dancer*/

//获取某辆车的基础属性
Route::post('dancer/attributes', 'Api\DancerController@attributes');
//获取某辆车的成长属性
Route::post('dancer/grow', 'Api\DancerController@grow');

