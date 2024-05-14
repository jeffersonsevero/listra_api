<?php

use App\Http\Controllers\{ListVehiclesController, SimulateVehicleController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('vehicles', ListVehiclesController::class)->name('api.vehicles.index');
Route::post('vehicles/{id}/simulate', SimulateVehicleController::class)->name('api.vehicles.simulate');
