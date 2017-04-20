<?php

use Illuminate\Database\Seeder;

class EquipmentInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EquipmentInfo::class, 10)->create();
    }
}
