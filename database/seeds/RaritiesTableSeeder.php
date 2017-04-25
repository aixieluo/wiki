<?php

use Illuminate\Database\Seeder;

class RaritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Rarity::class, 3)->create();
    }
}
