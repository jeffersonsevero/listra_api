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
        $vehicle = Vehicle::query()->find($request->id);

        if (!$vehicle) {
            return response()->json(['message' => 'Veículo não encontrado.'], 404);
        }

        if($request->input_value > $vehicle->price || $request->input_value === $vehicle->price) {
            return response()->json(['message' => 'O valor de entrada deve ser menor que ' . $vehicle->price . '.'], 422);

        }

        /** @var Vehicle $vehicle */

        $firstInstallment  = $vehicle->simulateTax(quantityOfInstallments: 6, inputValue: $request->input_value);
        $secondInstallment = $vehicle->simulateTax(quantityOfInstallments: 12, inputValue: $request->input_value);
        $thirdInstallment  = $vehicle->simulateTax(quantityOfInstallments:48, inputValue:$request->input_value);

        return response()->json([
            'first_installment'  => number_format($firstInstallment, 2, '.', ','),
            'second_installment' => number_format($secondInstallment, 2, '.', ','),
            'third_installment'  => number_format($thirdInstallment, 2, '.', ','),
        ]);

    }
}
