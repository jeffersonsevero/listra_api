<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimulateVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SimulateVehicleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SimulateVehicleRequest $request)
    {
        $vehicle = Vehicle::query()->findOrFail($request->id);

        if (!$vehicle) {
            return response()->json(['message' => 'Veículo não encontrado.'], 404);
        }

        if($request->input_value > $vehicle->price || $request->input_value === $vehicle->price) {
            return response()->json(['message' => 'O valor de entrada deve ser menor que ' . $vehicle->price . '.'], 422);

        }
        $firstInstallment  = ($vehicle->price + ($vehicle->price * 0.1247) - $request->input_value) / 6;
        $secondInstallment = ($vehicle->price + ($vehicle->price * 0.1556) - $request->input_value) / 12;
        $thirdInstallment  = ($vehicle->price + ($vehicle->price * 0.1869) - $request->input_value) / 48;

        return response()->json([
            'first_installment'  => number_format($firstInstallment, 2, '.', ','),
            'second_installment' => number_format($secondInstallment, 2, '.', ','),
            'third_installment'  => number_format($thirdInstallment, 2, '.', ','),
        ]);

    }
}
