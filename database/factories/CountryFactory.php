<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        $countries = [
            'Singapore',
            'Vietnam',
            'Thailand',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($countries),
        ];
    }
}
