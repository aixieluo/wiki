<?php

use Illuminate\Database\Seeder;

class DancerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DancerType::class, 10)->create();
    }
}
