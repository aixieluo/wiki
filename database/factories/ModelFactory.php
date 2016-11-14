<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//用户表
$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'confirm_code' => str_random(48),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


//舞姬表
$factory->define(\App\Models\Dancer::class, function (Faker\Generator $faker) {
    $type = ["重坦", "中坦", "轻坦", "自行", "轻歼", "突击"];

    return [
        'name' => $faker->name,
        'dance_outfit' => $faker->name,
        'type' => $faker->randomElement($type),
        'country' => $faker->countryCode,
        'rarity' => $faker->randomElement(array( 1, 2, 3 )),
        'subjection' => "S.V.S",
        'introduction' => $faker->sentence(20),
        'character' => $faker->sentence(20),
        'grow_fire' => $faker->randomFloat(2, 1, 10),
        'grow_penetrate' => $faker->randomFloat(2, 1, 10),
        'grow_durable' => $faker->randomFloat(2, 1, 10),
        'grow_armor' => $faker->randomFloat(2, 1, 10),
        'barbette' => $faker->numberBetween(0, 2),
        'refit' => $faker->numberBetween(0, 2),
        'outside' => $faker->numberBetween(0, 2),
        'inwall' => $faker->numberBetween(0, 2),
        'inwarehouse' => $faker->numberBetween(0, 2),
        'carriage' => $faker->numberBetween(0, 2),
        'special' => $faker->numberBetween(0, 2),
    ];
});


//科技表
$factory->define(\App\Models\Technology::class, function (Faker\Generator $faker) {
    $category = $faker->randomElement(["主炮", "防护", "车体", "引擎"]);
    $arr = array(
        "主炮" => array("AP", "APCR", "APDS", "HE", "RP", "HEAT", "HESH"),
        "防护" => array("标准防护", "重装防护", "轻薄防护"),
        "车体" => array("综合车体"),
        "引擎" => array("综合引擎"),
    );
    $type = $faker->randomElement($arr[$category]);

    return [
        'name' => $faker->name,
        'category' => $category,
        'type' => $type,
        'rank' => $faker->numberBetween(1, 3),
    ];
});


//特性表
$factory->define(\App\Models\Effect::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'describe' => $faker->sentence,
    ];
});


//基本属性表，多态关联
$factory->define(\App\Models\Attribute::class, function (Faker\Generator $faker) {
    $type = $faker->randomElement(["App\Model\Dancer", "App\Model\Technology"]);

    return [
        'attributeable_id' => $faker->numberBetween(1, 30),
        'attributeable_type' => $type,
        'fire' => $faker->randomFloat(2, 1, 10),
        'penetrate' => $faker->randomFloat(2, 1, 10),
        'durable' => $faker->randomFloat(2, 1, 10),
        'armor' => $faker->randomFloat(2, 1, 10),
        'hit' => $faker->randomFloat(2, 1, 10),
        'dodge' => $faker->randomFloat(2, 1, 10),
        'concealment' => $faker->randomFloat(2, 1, 10),
        'spy' => $faker->randomFloat(2, 1, 10),
    ];
});


//舞姬与科技中间表，多对多
$factory->define(\App\Models\DancerTechnology::class, function (Faker\Generator $faker) {
    $dancer_ids = \App\Models\Dancer::pluck('id')->toArray();
    $technology_ids = \App\Models\Technology::pluck('id')->toArray();

    return [
        'dancer_id' => $faker->randomElement($dancer_ids),
        'technology_id' => $faker->randomElement($technology_ids),
    ];
});


//科技与特性中间表，多对多
$factory->define(\App\Models\TechnologyEffect::class, function (Faker\Generator $faker) {
    $technology_ids =\App\Models\Technology::pluck('id')->toArray();
    $effect_ids =\App\Models\Effect::pluck('id')->toArray();

    return [
        'technology_id' => $faker->randomElement($technology_ids),
        'effect_id' => $faker->randomElement($effect_ids),
    ];
});

//图片表
$factory->define(\App\Models\Image::class, function (Faker\Generator $faker) {
    return [
        'imageable_id' => $faker->numberBetween(0,50),
        'imageable_type' => $faker->randomElement([
            'App\Models\User', 'App\Models\Technology', 'App\Models\Effect', 'App\Models\Dancer'
        ]),
        'type' => 'avator',
        'path' => $faker->imageUrl(256,256),
    ];
});
