<?php

use Illuminate\Database\Seeder;

class EquipmentSlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EquipmentSlot::class, 20)->create();
    }
}
