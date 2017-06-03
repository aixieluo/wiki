<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //        factory(\App\Models\Country::class, 10)->create();
        DB::table('countries')->insert([
            ['name' => '德系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '英系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '苏系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '美系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '中系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '日系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '法系', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
