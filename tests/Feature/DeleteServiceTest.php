<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteServiceTest extends TestCase
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
            'title' => 'lavandero',
            'description' => 'asdasdasd',
            'type_service_id' => 2,
            'price' => 4000
        ]);

        $service = Service::where('title', 'lavandero')->first();
        $response = $this->actingAs($user)->delete('/service/'.$service->id);

        $service = Service::where('title', $service->title)->first();
        $this->assertEquals(null, $service);
    }
}
