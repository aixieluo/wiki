<?php

use Illuminate\Database\Seeder;

class EffectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Effect::class, 50)->create();
    }
}
