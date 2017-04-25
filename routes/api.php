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

Route::group(['namespace' => 'Api\Home'], function () {
    /*part dancer start*/

    //获取舞姬的基础属性
    Route::match(['get', 'post'], 'dancer/attributes', 'DancerController@attributes');
    //获取舞姬的成长属性
    Route::match(['get', 'post'], 'dancer/growAttributes', 'DancerController@growAttributes');
    //获取舞姬的各装备槽个数
    Route::match(['get', 'post'], 'dancer/equipmentSlots', 'DancerController@equipmentSlots');
    //获取舞姬稀有度
    Route::match(['get', 'post'], 'rarity', 'DancerController@rarity');
    //获取舞姬各科技各级别的大件个数
    Route::match(['get', 'post'], 'dancer/technologyPartNumber', 'DancerController@technologyPartNumber');
    //获取与舞姬相关联的科技种类
    Route::match(['get', 'post'], 'dancer/technologyParts', 'DancerController@technologyParts');
    //获取某舞姬某科技的所有大件
    Route::match(['get', 'post'], 'dancer/technologySlots', 'DancerController@technologySlots');

    /*part dancer end*/


    /*part equipment start*/

    //获取某位置的所有装备
    Route::match(['get', 'post'], 'equipment/part/list/', 'EquipmentController@equipmentList');
    Route::match(['get', 'post'], 'equipment/attributes', 'EquipmentController@equipmentAttributes');

    /*part equipment end*/


    Route::match(['get', 'post'], 'tactic/names', 'TacticController@tacticNames');
    Route::match(['get', 'post'], 'tactic/attributes', 'TacticController@tacticAttributes');


    Route::match(['get', 'post'], 'skill/names', 'SkillController@skillNames');
    Route::match(['get', 'post'], 'skill/attributes', 'SkillController@skillAttributes');
});

Route::group(['namespace' => 'Api\Dashboard'], function () {
    Route::resource('type', 'TypeController', ['except' => ['show', 'create']]);
    Route::get('types', 'TypeController@getList');

    Route::resource('country', 'CountryController', ['except' => ['show', 'create']]);
    Route::get('countries', 'CountryController@getList');

    Route::resource('rarity', 'RarityController', ['except' => ['show', 'create']]);
    Route::get('rarities', 'RarityController@getList');

    Route::resource('dancer', 'DancerController', ['except' => ['show', 'create']]);
    Route::get('dancer/attributes/{id}', 'DancerController@getByAttributes');

    Route::resource('equipmentInfo', 'EquipmentInfoController', ['except' => ['show','create']]);
    Route::get('equipmentInfos', 'EquipmentInfoController@getList');

    Route::resource('equipment', 'EquipmentController', ['except' => ['show','create']]);
    Route::get('equipment/attributes/{id}', 'EquipmentController@getByAttributes');

    Route::resource('slot', 'SlotController', ['except' => ['show', 'create']]);
    Route::get('slots', 'SlotController@getList');

    Route::resource('technologyCategory', 'TechnologyCategoryController', ['except' => ['show', 'create']]);
    Route::get('technologyCategories', 'TechnologyCategoryController@getList');

    Route::resource('technologyType', 'TechnologyTypeController', ['except' => ['show', 'create']]);
    Route::get('technologyTypes', 'TechnologyTypeController@getList');

    Route::resource('technology', 'TechnologyController', ['except' => ['show', 'create']]);
    Route::get('technology/attributes/{id}', 'TechnologyController@getByAttributes');

    Route::resource('tacticInfo', 'TacticInfoController', ['except' => ['show', 'create']]);
    Route::get('tacticInfos', 'TacticInfoController@getList');

    Route::resource('tactic', 'TacticController', ['except' => ['show', 'create']]);

    Route::resource('skillInfo', 'SkillInfoController', ['except' => ['show', 'create']]);
    Route::get('skillInfos', 'SkillInfoController@getList');

    Route::resource('skill', 'SkillController', ['except' => ['show', 'create']]);
});
