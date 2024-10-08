<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            PropertyTypesTableSeeder::class,
            PropertyLocationsTableSeeder::class,
            PropertiesTableSeeder::class,
            PropertyItemsTableSeeder::class,
        ]);
    }
}
