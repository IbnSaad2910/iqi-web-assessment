<?php

namespace Database\Seeders;

use App\Models\PropertyLocation;
use Illuminate\Database\Seeder;

class PropertyLocationsTableSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 15) as $stateId) {
            PropertyLocation::factory()->create([
                'state_id' => $stateId,
                'country_id' => 1,
            ]);
        }

        PropertyLocation::factory()->count(5)->create([
            'state_id' => rand(1, 15),
            'country_id' => 1,
        ]);

    }
}
