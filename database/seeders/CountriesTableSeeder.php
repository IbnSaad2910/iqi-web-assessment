<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        Country::create([
            'id' => 1,
            'name' => 'Malaysia',
        ]);

        Country::factory()->count(2)->create();
    }
}
