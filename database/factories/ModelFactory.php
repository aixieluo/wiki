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
    return [
        'name' => $faker->name,
        'dance_outfit' => $faker->name,
        'type' => $faker->randomElement(["重坦", "中坦", "轻坦", "自行", "轻歼", "突击"]),
        'country' => $faker->countryCode,
        'rarity' => $faker->randomElement([1, 2, 3]),
        'subjection' => "S.V.S",
        'introduction' => $faker->sentence(20),
        'character' => $faker->sentence(20),
        'grow_fire' => $faker->numberBetween(1, 10),
        'grow_penetrate' => $faker->numberBetween(1, 10),
        'grow_durable' => $faker->numberBetween(1, 10),
        'grow_armor' => $faker->numberBetween(1, 10),
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



//基本属性表，多态关联
$factory->define(\App\Models\Attribute::class, function (Faker\Generator $faker) {
    return [
        'attributeable_id' => $faker->numberBetween(1, 10),
        'attributeable_type' => $faker->randomElement(["App\Models\Dancer", "App\Models\Technology"]),
        'fire' => $faker->numberBetween(1, 10),
        'penetrate' => $faker->numberBetween(1, 10),
        'durable' => $faker->numberBetween(1, 10),
        'armor' => $faker->numberBetween(1, 10),
        'hit' => $faker->numberBetween(1, 10),
        'dodge' => $faker->numberBetween(1, 10),
        'concealment' => $faker->numberBetween(1, 10),
        'spy' => $faker->numberBetween(1, 10),
    ];
});


//舞姬与科技中间表，多对多
$factory->define(\App\Models\DancerTechnology::class, function (Faker\Generator $faker) {
    return [
        'dancer_id' => $faker->randomElement(\App\Models\Dancer::pluck('id')->toArray()),
        'technology_id' => $faker->randomElement(\App\Models\Technology::pluck('id')->toArray()),
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


//装备表
$factory->define(\App\Models\Equipment::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lv' => $faker->numberBetween(1, 10),
        'rank' => $faker->boolean(),
        'describe' => $faker->sentence(20),
        'price' => 450,
    ];
});

//装备槽表
$factory->define(\App\Models\Slot::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['炮座', '改装', '外身', '内壁', '内仓', '炮架', '特殊']),
    ];
});

//装备与装备槽中间表,多对多
$factory->define(\App\Models\EquipmentSlot::class, function (Faker\Generator $faker) {
    return [
        'equipment_id' => $faker->randomElement(\App\Models\Equipment::pluck('id')->toArray()),
        'slot_id' => $faker->randomElement(\App\Models\Slot::pluck('id')->toArray()),
    ];
});


//特性表
$factory->define(\App\Models\Effect::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'describe' => $faker->sentence,
    ];
});

//特性多态关联中间表
$factory->define(\App\Models\Effectable::class, function (Faker\Generator $faker) {
    return [
        'effect_id' => $faker->randomElement(\App\Models\Effect::pluck('id')->toArray()),
        'effectable_id' => $faker->randomElement(\App\Models\Technology::pluck('id')->toArray()),
        'effectable_type' => $faker->randomElement(['App\Models\Technology', 'App\Models\Equipment']),
    ];
});