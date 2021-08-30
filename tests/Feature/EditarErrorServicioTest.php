<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditarErrorServicioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        $profile = Profile::factory()->count(1)->create();
        $user = $profile->first()->user;
        $this->actingAs($user)->post('/service', [
            'title' => 'cocinero',
            'description' => 'cocina comida super nutritiva',
            'type_service_id' => 1,
            'price' => 4729
        ]);

        $service = Service::where('title', 'cocinero')->first();

        $response = $this->actingAs($user)->put('/service/' . $service->id, [
            'title' => 'lechero',
            'description' => 'cocina comida super nutritiva',
            'type_service_id' => 2,
            'price' => 4729
        ]);

        $service = Service::where('id', $service->id)->first();

        $this->assertEquals($service->title, 'lechero');
        $this->assertEquals($service->description, 'cocina comida super nutritiva');
        $this->assertEquals($service->price, 4729);
    }
}
