<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ListVehiclesController extends Controller
{
    public function __invoke(Request $request)
    {
        return VehicleResource::collection(Vehicle::all());
    }
}
