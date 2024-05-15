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
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function simulateTax(int $quantityOfInstallments, $inputValue)
    {

        return match ($quantityOfInstallments) {
            6  => $tax = ($this->price + ($this->price * 0.1247) - $inputValue) / 6,
            12 => $tax = ($this->price + ($this->price * 0.1556) - $inputValue) / 12,
            48 => $tax = ($this->price + ($this->price * 0.1869) - $inputValue) / 48,
        };

    }

}
