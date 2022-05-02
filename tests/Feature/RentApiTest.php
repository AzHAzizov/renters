<?php

namespace Tests\Feature;

use App\Models\Renter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RentApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_can_update_renter() 
    {
        $updateData = [
            "car_id" => "3"
        ];

        $this->put(
            'api/renters/2', ['car_id' => 2], 
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])
            ->assertStatus(200)
            ->assertJson($updateData);
    }
}
