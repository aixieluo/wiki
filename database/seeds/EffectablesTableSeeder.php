<?php

use Illuminate\Database\Seeder;

class EffectablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Effectable::class, 100)->create();
    }
}
