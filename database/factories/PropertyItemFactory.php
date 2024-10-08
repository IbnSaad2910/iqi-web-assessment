<?php

namespace Database\Factories;

use App\Models\PropertyItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyItemFactory extends Factory
{
    protected $model = PropertyItem::class;

    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Rooms', 'Bathrooms', 'Car Parks', 'Size', 'Furnishing']),
            'type' => $this->faker->randomElement(['range', 'number', 'description']),
            'prefix' => null,
            'postfix' => null,
        ];
    }
}
