<?php

use Illuminate\Database\Seeder;

class TechnologyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TechnologyType::class, 10)->create();
    }
}
