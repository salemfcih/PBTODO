<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    // public function testResponse()
    // {
    //     $response = $this->json('GET', '/proxy');

    //     $response
    //         ->assertStatus(200)
    //         ->assertJson([
    //             "name" => "Media One Hotel",
    //             "price" => 102.2,
    //             "city" => "dubai",
    //             "availability" => [
    //                 json_encode(["from" => "10-10-2020", "to" => "15-10-2020"]),
    //                 json_encode(["from" => "25-10-2020", "to" => "15-11-2020"]),
    //                 json_encode(["from" => "10-12-2020", "to" => "15-12-2020"])
    //             ]
    //         ]);
    // }
}
