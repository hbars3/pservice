<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreServiceTest extends TestCase
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
        $response = $this->actingAs($user)->post('/service', [
            'title' => 'lavandero',
            'description' => 'asdasdasd',
            'type_service_id' => 1,
            'price' => 4000
        ]);

        $service = Service::where('title', 'lavandero')->first();

        $this->assertEquals($service->title, 'lavandero');
        $this->assertEquals($service->description, 'asdasdasd');
        $this->assertEquals($service->type_service_id, 1);
        $this->assertEquals($service->price, 4000);
    }
}
