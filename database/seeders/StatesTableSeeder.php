<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        $malaysiaCountryId = 1;
        State::insert([
            ['name' => 'Johor', 'country_id' => $malaysiaCountryId],
            ['name' => 'Kedah', 'country_id' => $malaysiaCountryId],
            ['name' => 'Kelantan', 'country_id' => $malaysiaCountryId],
            ['name' => 'Malacca', 'country_id' => $malaysiaCountryId],
            ['name' => 'Negeri Sembilan', 'country_id' => $malaysiaCountryId],
            ['name' => 'Pahang', 'country_id' => $malaysiaCountryId],
            ['name' => 'Penang', 'country_id' => $malaysiaCountryId],
            ['name' => 'Perak', 'country_id' => $malaysiaCountryId],
            ['name' => 'Perlis', 'country_id' => $malaysiaCountryId],
            ['name' => 'Selangor', 'country_id' => $malaysiaCountryId],
            ['name' => 'Terengganu', 'country_id' => $malaysiaCountryId],
            ['name' => 'Sabah', 'country_id' => $malaysiaCountryId],
            ['name' => 'Sarawak', 'country_id' => $malaysiaCountryId],
            ['name' => 'Kuala Lumpur', 'country_id' => $malaysiaCountryId],
            ['name' => 'Labuan', 'country_id' => $malaysiaCountryId],
        ]);

    }
}
