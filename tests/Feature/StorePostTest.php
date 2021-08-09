<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorePostTest extends TestCase
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
        $service = Service::where('user_id', '<>', $user->id)->first();
        $response = $this->actingAs($user)->post('/post', [
            'user_id' => $user->id,
            'service_id' => $service->id,
            'body' => 'servicio de prueba'
        ]);
        $post = Post::where([
            ['user_id', $user->id],
            ['service_id', $service->id]
        ])->first();

        $this->assertEquals($post->body, 'servicio de prueba');
    }
}
