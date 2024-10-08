<?php

namespace Tests\Unit;

use App\Models\Property;
use App\Models\PropertyLocation;
use App\Models\PropertyItem;
use App\Models\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

class PropertyTest extends TestCase
{
    // IMPORTANT NOTICE:
    // Please do not make any adjustments to this test file. Any modifications will result in the automatic withdrawal of your application.
    // Ensure that you only complete the required tasks without altering the provided code or comments.
    // Thank you for your cooperation.

    public function test_query_properties_validation()
    {
        $response = $this->get(route('property.index', [
            'min_rooms' => 'one'
        ]));

        $response->assertStatus(403);

        $response->assertJsonValidationErrors(['min_rooms']);
        $this->assertContains('The minimum rooms is invalid.', $response->json('errors.min_rooms'));
    }

    public function test_query_properties_within_state()
    {
        $selangorStateId = State::where('name', 'Selangor')->value('id');
        $response = $this->get(route('property.index', [
            'state' => 'Selangor',
        ]));

        $response->assertStatus(200);
        $properties = $response->json('data');
        $stateIds = array_column(array_column($properties, 'property_location'), 'state_id');
        $this->assertNotEmpty($properties, 'The properties response should not be empty.');
        $propertyStatuses = collect($properties)->pluck('status');
        $this->assertTrue($propertyStatuses->every(fn($status) => $status === 'available'), 'All properties should have a status of available.');
        $this->assertTrue(count(array_diff($stateIds, [$selangorStateId])) === 0, 'Some properties belong to states other than Selangor.');
        $this->assertArrayNotHasKey('current_page', $properties, 'Response is paginated');
    }

    public function test_query_properties_within_min_max_bedroom_bathroom()
    {
        $response = $this->get(route('property.index', [
            'min_rooms' => 4,
            'max_rooms' => 6,
            'min_bathrooms' => 3,
        ]));

        $response->assertStatus(200);
        $properties = $response->json('data');

        $roomCounts = array_merge(
            ...array_map(function ($property) {
                return array_column(
                    array_filter($property['property_items'], function ($item) {
                        return in_array($item['type'], ['rooms']);
                    }),
                    'value'
                );
            }, $properties)
        );

        $validRoomCounts = [4,5,6]; // 4-6
        $invalidRoomCounts = array_diff($roomCounts, $validRoomCounts);

        $valueBathroomCounts = array_merge(
            ...array_map(function ($property) {
                return array_column(
                    array_filter($property['property_items'], function ($item) {
                        return in_array($item['type'], ['bathrooms']);
                    }),
                    'value'
                );
            }, $properties)
        );

        $validBathroomCounts = [3,4,5]; // > 3 (Data seeded max of 5 for bathroom)
        $invalidBathroomCounts = array_diff($valueBathroomCounts, $validBathroomCounts);

        $this->assertNotEmpty($properties, 'The properties response should not be empty.');
        $this->assertEmpty($invalidRoomCounts, 'Found invalid numbers of rooms');
        $this->assertEmpty($invalidBathroomCounts, 'Found invalid numbers of bathrooms');
        $this->assertArrayNotHasKey('current_page', $properties, 'Response is paginated');
    }

    public function test_query_property_limit_to_300_rows()
    {
        $response = $this->get(route('property.index', [
            'per_page' => 300,
        ]));

        $response->assertStatus(200);
        $properties = $response->json('data');
        $this->assertIsArray(@$properties['data'], 'Found invalid data response');
        $this->assertCount(300, @$properties['data']);
    }
}
