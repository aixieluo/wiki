<?php

use Illuminate\Database\Seeder;

class DancerTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DancerTechnology::class, 500)->create();
    }
}
