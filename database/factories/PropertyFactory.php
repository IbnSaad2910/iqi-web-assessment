<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyLocation;
use App\Models\PropertyType;
use App\Models\PropertyItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        $propertyType = PropertyType::inRandomOrder()->first();
        $location = PropertyLocation::inRandomOrder()->first();

        $price = $this->faker->numberBetween(100000, 2000000);

        return [
            'title' => "{$propertyType->name} in {$location->location_name} for RM{$price}",
            'description' => $this->faker->paragraph(),
            'price' => $price,
            'property_type_id' => $propertyType->id,
            'property_location_id' => $location->id,
            'status' => $this->faker->randomElement(['available', 'sold', 'pending']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
