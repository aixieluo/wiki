<?php

use Illuminate\Database\Seeder;

class TechnologyEffectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TechnologyEffect::class, 50)->create();
    }
}
