<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RaritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(\App\Models\Rarity::class, 3)->create();
        DB::table('rarities')->insert([
            ['lv' => 3, 'name' => '橙', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['lv' => 2, 'name' => '紫', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['lv' => 1, 'name' => '蓝', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
