<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }

    public function property_location()
    {
        return $this->belongsTo(PropertyLocation::class, 'property_location_id', 'id');
    }

    public function property_items()
    {
        return $this->hasMany(PropertyItem::class, 'property_id', 'id');
    }
}
