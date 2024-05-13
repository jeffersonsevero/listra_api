<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'input_value' => ['required', 'numeric',  'min:200'],
        ];
    }

    public function messages(): array
    {

        return [
            'input_value.required' => 'O valor de entrada deve ser informado.',
            'input_value.numeric'  => 'O valor de entrada deve ser um valor numérico.',
            'input_value.min'      => 'O valor de entrada deve ser maior que 200.',
        ];
    }
}
