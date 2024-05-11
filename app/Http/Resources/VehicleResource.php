<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'image'            => $this->image,
            'city'             => $this->city,
            'make'             => $this->make,
            'model'            => $this->model,
            'description'      => $this->description,
            'year'             => $this->year,
            'mileage'          => $this->mileage,
            'type_of_exchange' => $this->type_of_exchange,
            'phone'            => $this->phone,
            'price'            => $this->price,

        ];
    }
}
