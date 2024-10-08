<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypesTableSeeder extends Seeder
{
    public function run()
    {
        PropertyType::insert([
            ['name' => 'Apartment'],
            ['name' => 'Condo'],
            ['name' => 'Terrace House'],
            ['name' => 'Semi-Detached House'],
            ['name' => 'Bungalow'],
            ['name' => 'Commercial Lot'],
            ['name' => 'Land'],
            ['name' => 'Shop Lot'],
        ]);
    }
}
