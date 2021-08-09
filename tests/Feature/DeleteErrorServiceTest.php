<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteErrorServiceTest extends TestCase
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
            'description' => 'rqsdaew adas',
            'type_service_id' => 2,
            'price' => 7890
        ]);

        $service = Service::where('title', 'cocinero')->first();
        $response = $this->actingAs($user)->delete('/service/'.$service->id);

        $service = Service::where('title', $service->title)->first();
        $this->assertEquals(null, $service);
    }
}
