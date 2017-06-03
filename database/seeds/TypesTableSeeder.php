<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //        factory(\App\Models\Type::class, 10)->create();
        DB::table('types')->insert([
            ['name' => '中坦', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '轻歼', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '重坦', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '轻坦', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '自行', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '突击', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
