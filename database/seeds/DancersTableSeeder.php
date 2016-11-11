<?php

use Illuminate\Database\Seeder;

class DancersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Dancer::class, 50)->create();
    }
}
