<?php

namespace Tests\Feature\Vehicles;

use App\Models\Vehicle;
use Tests\TestCase;

class SimulateTest extends TestCase
{
    /** @test */
    public function should_return_error_if_input_value_is_not_sended()
    {

        $vehicle = Vehicle::factory()->createOne();

        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor('input_value')
            ->assertJsonFragment(['message' => 'O valor de entrada deve ser informado.']);

    }

    /** @test */
    public function should_return_error_if_input_value_is_not_a_number()
    {

        $vehicle = Vehicle::factory()->createOne();

        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => 'a'])
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor('input_value');

    }

    /** @test */
    public function should_return_error_if_input_value_is_negative()
    {

        $vehicle = Vehicle::factory()->createOne();

        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => -2])
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor('input_value');

    }

    /** @test */
    public function should_return_error_if_input_value_is_zero()
    {

        $vehicle = Vehicle::factory()->createOne();

        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => 0])
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor('input_value');

    }

    /** @test */
    public function should_return_error_if_input_value_is_greater_than_value_of_vehicle()
    {

        $vehicle = Vehicle::factory()->createOne();
        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => $vehicle->price + 1])
            ->assertUnprocessable()
            ->assertJsonFragment(['message' => 'O valor de entrada deve ser menor que ' . $vehicle->price . '.']);

    }

    /** @test */
    public function should_return_error_if_input_value_is_equal_than_value_of_vehicle()
    {
        $vehicle = Vehicle::factory()->createOne();
        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => $vehicle->price])
            ->assertUnprocessable()
            ->assertJsonFragment(['message' => 'O valor de entrada deve ser menor que ' . $vehicle->price . '.']);

    }

    /** @test
     *
     */
    public function should_return_all_installments()
    {

        $vehicle = Vehicle::factory()->createOne([
            'price' => 120000,
        ]);

        $this->postJson(route('api.vehicles.simulate', ['id' => $vehicle->id]), ['input_value' => 40000])
            ->assertSuccessful()
            ->assertJsonFragment([
                'first_installment'  => '15,827.33',
                'second_installment' => '8,222.67',
                'third_installment'  => '2,133.92',
            ]);

    }

}
