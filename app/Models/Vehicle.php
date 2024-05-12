<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'image',
        'city',
        'make',
        'model',
        'description',
        'year',
        'mileage',
        'type_of_exchange',
        'phone',
        'price',

    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value / 100, 2, '.', ''),
            set: fn ($value) => $value * 100
        );
    }
}
