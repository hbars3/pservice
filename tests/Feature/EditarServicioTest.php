<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditarServicioTest extends TestCase
{
    use RefreshDatabase;
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
            'title' => 'lavandero',
            'description' => 'asdasdasd',
            'price' => 4000
        ]);

        $service = Service::where('title', 'lavandero')->first();

        $response = $this->actingAs($user)->put('/service/' . $service->id, [
            'title' => 'cocinero',
            'description' => 'asdasdasdf',
            'price' => 5000
        ]);

        $service = Service::where('id', $service->id)->first();

        $this->assertEquals($service->title, 'cocinero');
        $this->assertEquals($service->description, 'asdasdasdf');
        $this->assertEquals($service->price, 5000);
    }
}
