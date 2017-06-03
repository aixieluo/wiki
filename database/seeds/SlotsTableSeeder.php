<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        factory(\App\Models\Slot::class, 7)->create();
        DB::table('slots')->insert([
            ['name' => '炮座', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '改装', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '内壁', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '外身', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '特殊', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '炮架', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '内仓', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
