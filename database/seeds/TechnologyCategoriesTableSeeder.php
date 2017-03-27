<?php

use Illuminate\Database\Seeder;

class TechnologyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TechnologyCategory::class, 10)->create();
    }
}
