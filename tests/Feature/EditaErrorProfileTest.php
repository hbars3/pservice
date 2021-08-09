<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditaErrorProfileTest extends TestCase
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
        $response = $this->actingAs($user)->put('/profile/update', [
            'firstname' => 'juanito',
            'lastname' => 'cigarro',
            'address' => 'El callao',
            'phone_number' => "7321234123",
            'profession' => 'el economista'
        ]);

        $profile = Profile::where('firstname', 'juanito')->first();

        $this->assertEquals($profile->firstname, 'juanito');
        $this->assertEquals($profile->lastname, 'cigarro');
        $this->assertEquals($profile->address, 'El callao');
        $this->assertEquals($profile->phone_number, 7321234123);
        $this->assertEquals($profile->profession, 'el economista');
    }
}
