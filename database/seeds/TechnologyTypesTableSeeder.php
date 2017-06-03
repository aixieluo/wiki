<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TechnologyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(\App\Models\TechnologyType::class, 10)->create();
        DB::table('technology_types')->insert([
            ['technology_category_id' => 1, 'name' => 'AP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'APCR', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'APDS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'HE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'RP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'HEAT', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 1, 'name' => 'HESH', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 2, 'name' => '标准防护', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 2, 'name' => '重装防护', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 2, 'name' => '轻薄防护', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 3, 'name' => '综合车体', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 4, 'name' => '综合引擎', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['technology_category_id' => 5, 'name' => '综合索敌', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
