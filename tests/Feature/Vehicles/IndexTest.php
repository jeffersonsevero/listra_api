<?php

namespace Tests\Feature\Vehicles;

use App\Models\Vehicle;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function it_can_list_vehicles()
    {

        Vehicle::factory(10)->create();

        $this->getJson(route('api.vehicles.index'))
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');

    }
}
