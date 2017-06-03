<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TechnologyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(\App\Models\TechnologyCategory::class, 10)->create();
        DB::table('technology_categories')->insert([
            ['name' => '主炮', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '防护', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '车体', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '引擎', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '侦查', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
