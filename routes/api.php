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

Route::group(['namespace'=>'Api'], function () {
    /*part dancer start*/

    //获取舞姬的基础属性
    Route::post('dancer/attributes', 'DancerController@attributes');
    //获取舞姬的成长属性
    Route::post('dancer/growAttributes', 'DancerController@growAttributes');
    //获取舞姬的各装备槽个数
    Route::post('dancer/equipmentSlots', 'DancerController@equipmentSlots');

    /*part dancer end*/



    /*part equipment start*/

    //获取某位置的所有装备
    Route::post('equipment/part/list/', 'EquipmentController@equipmentList');

    /*part equipment end*/
});

