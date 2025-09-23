<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function states()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    public function property_locations()
    {
        return $this->hasMany(PropertyLocation::class, 'country_id', 'id');
    }
}
