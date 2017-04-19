<?php

use Illuminate\Database\Seeder;

class EquipmentNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EquipmentName::class, 10)->create();
    }
}
