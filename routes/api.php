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

Route::group(['namespace' => 'Api'], function () {
    Route::get('simulator/dancerInfo/{id}', 'SimulatorController@getByDancerInfo');
    Route::get('simulator/equipment', 'SimulatorController@getByEquipment');
    Route::get('simulator/technologies', 'SimulatorController@getByTechnologies');
    Route::get('simulator/technologyTypes', 'SimulatorController@getByTechnologyTypes');
    Route::get('simulator/tactics', 'SimulatorController@getByTactics');
    Route::get('simulator/skills', 'SimulatorController@getBySkills');
});

Route::group(['namespace' => 'Api\Dashboard'], function () {
    Route::resource('type', 'TypeController', ['except' => ['show', 'create']]);
    Route::get('types', 'TypeController@getList');

    Route::resource('country', 'CountryController', ['except' => ['show', 'create']]);
    Route::get('countries', 'CountryController@getList');

    Route::resource('rarity', 'RarityController', ['except' => ['show', 'create']]);
    Route::get('rarities', 'RarityController@getList');

    Route::resource('dancer', 'DancerController', ['except' => ['show', 'create']]);
    Route::get('dancers', 'DancerController@getList');
    Route::get('relation/dancer/{id}/technology', 'DancerController@getByTechnologies');
    Route::post('relation/dancer/technology', 'DancerController@syncTechnologies');
    Route::post('relation/dancer/slot', 'DancerController@syncSlots');

    Route::resource('equipmentInfo', 'EquipmentInfoController', ['except' => ['show', 'create']]);
    Route::get('equipmentInfos', 'EquipmentInfoController@getList');

    Route::resource('equipment', 'EquipmentController', ['except' => ['index', 'show', 'create']]);
    Route::get('equipment/{pId}', 'EquipmentController@index');

    Route::resource('slot', 'SlotController', ['except' => ['show', 'create']]);
    Route::get('slots', 'SlotController@getList');

    Route::resource('technologyCategory', 'TechnologyCategoryController', ['except' => ['show', 'create']]);
    Route::get('technologyCategories', 'TechnologyCategoryController@getList');

    Route::resource('technologyType', 'TechnologyTypeController', ['except' => ['index', 'show', 'create']]);
    Route::get('technologyType/{gId}', 'TechnologyTypeController@index');
    Route::get('technologyTypes', 'TechnologyTypeController@getList');

    Route::resource('technology', 'TechnologyController', ['except' => ['index', 'show', 'create']]);
    Route::get('technology/{pId}', 'TechnologyController@index');
    Route::get('technologies', 'TechnologyController@getList');

    Route::resource('tacticInfo', 'TacticInfoController', ['except' => ['show', 'create']]);
    Route::get('tacticInfos', 'TacticInfoController@getList');

    Route::resource('tactic', 'TacticController', ['except' => ['index', 'show', 'create']]);
    Route::get('tactic/{pId}', 'TacticController@index');

    Route::resource('skillInfo', 'SkillInfoController', ['except' => ['show', 'create']]);
    Route::get('skillInfos', 'SkillInfoController@getList');

    Route::resource('skill', 'SkillController', ['except' => ['index', 'show', 'create']]);
    Route::get('skill/{pId}', 'SkillController@index');
});
