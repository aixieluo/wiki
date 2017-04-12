<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(AdminsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RaritiesTableSeeder::class);
        $this->call(DancersTableSeeder::class);
        $this->call(TechnologyCategoriesTableSeeder::class);
        $this->call(TechnologyTypesTableSeeder::class);
        $this->call(TechnologiesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(DancerTechnologiesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(SlotsTableSeeder::class);
        $this->call(EquipmentSlotsTableSeeder::class);
        $this->call(EffectsTableSeeder::class);
        $this->call(EffectablesTableSeeder::class);
    }
}
