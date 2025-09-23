<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state' => 'string',
            'min_rooms' => 'integer|min:1',
            'max_rooms' => 'integer|min:1',
            'min_bathrooms' => 'integer|min:1',
            'max_bathrooms' => 'integer|min:1',
            'per_page' => 'integer|min:1'
        ], [
            'state.string' => 'The state must be a string.',
            'min_rooms.integer' => 'The minimum rooms is invalid.',
            'min_rooms.min' => 'The minimum rooms must be at least :min.',
            'max_rooms.integer' => 'The maximum rooms is invalid.',
            'max_rooms.min' => 'The maximum rooms must be at least :min.',
            'min_bathrooms.integer' => 'The minimum bathrooms is invalid.',
            'min_bathrooms.min' => 'The minimum bathrooms must be at least :min.',
            'max_bathrooms.integer' => 'The maximum bathrooms is invalid.',
            'max_bathrooms.min' => 'The maximum bathrooms must be at least :min.',
            'per_page.integer' => 'The per page value is invalid.',
            'per_page.min' => 'The per page value must be at least :min.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 403);
        }

        $validated = $validator->validated();
        $query = Property::with(['property_items'])->where('status', 'available');

        if (isset($validated['state'])) {
            $query->whereHas('property_location.state', function ($q) use ($validated) {
                $q->where('name', 'like', '%' . $validated['state'] . '%');
            });
        }

        if (isset($validated['min_rooms'])) {
            $query->whereHas('property_items', function ($q) use ($validated) {
                // casts value to unsigned integer for comparison
                $q->where('type', 'rooms')->whereRaw('CAST(value as UNSIGNED) >= ?', [$validated['min_rooms']]);
            });
        }

        if (isset($validated['max_rooms'])) {
            $query->whereHas('property_items', function ($q) use ($validated) {
                // casts value to unsigned integer for comparison
                $q->where('type', 'rooms')->whereRaw('CAST(value as UNSIGNED) <= ?', [$validated['max_rooms']]);
            });
        }

        if (isset($validated['min_bathrooms'])) {
            $query->whereHas('property_items', function ($q) use ($validated) {
                // casts value to unsigned integer for comparison
                $q->where('type', 'bathrooms')->whereRaw('CAST(value as UNSIGNED) >= ?', [$validated['min_bathrooms']]);
            });
        }

        if (isset($validated['max_bathrooms'])) {
            $query->whereHas('property_items', function ($q) use ($validated) {
                // casts value to unsigned integer for comparison
                $q->where('type', 'bathrooms')->whereRaw('CAST(value as UNSIGNED) <= ?', [$validated['max_bathrooms']]);
            });
        }

        if (isset($validated['per_page'])) {
            $properties = $query->paginate($request->per_page);
        } else {
            $properties = $query->get();
        }

        return response()->json(['data' => $properties]);
    }
}
