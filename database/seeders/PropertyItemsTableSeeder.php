<?php
namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyItem;
use Illuminate\Database\Seeder;

class PropertyItemsTableSeeder extends Seeder
{
    public function run()
    {
        $propertyItems = [
            ['title' => 'Rooms', 'type' => 'rooms'],
            ['title' => 'Bathrooms', 'type' => 'bathrooms'],
        ];

        Property::all()->each(function ($property) use ($propertyItems) {
            foreach ($propertyItems as $item) {
                switch ($item['type']) {
                    case 'rooms':
                        $value = rand(1, 10);
                        break;
                    case 'bathrooms':
                        $value = rand(1, 5);
                        break;
                    default:
                        $value = null;
                }

                PropertyItem::create([
                    'property_id' => $property->id,
                    'title' => $item['title'],
                    'type' => $item['type'],
                    'value' => $value,
                    'prefix' => null,
                    'postfix' => null,
                ]);
            }
        });
    }
}
