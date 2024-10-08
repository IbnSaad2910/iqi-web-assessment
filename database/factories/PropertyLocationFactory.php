<?php

namespace Database\Factories;

use App\Models\PropertyLocation;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyLocationFactory extends Factory
{
    protected $model = PropertyLocation::class;

    public function definition()
    {
        return [
            'location_name' => $this->faker->city,
            'longitude' => $this->faker->latitude(-180, 180),
            'latitude' => $this->faker->longitude(-90, 90),
            'state_id' => rand(1,15),
            'country_id' => 1,
        ];
    }
}
