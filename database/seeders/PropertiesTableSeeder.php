<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    public function run()
    {
        Property::factory()->count(5000)->create();
    }
}
