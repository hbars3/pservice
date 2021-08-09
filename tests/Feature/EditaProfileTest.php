<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditaProfileTest extends TestCase
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
            'firstname' => 'pepito',
            'lastname' => 'botella',
            'address' => 'Montaña Paoz',
            'phone_number' => "123456789",
            'profession' => 'el ingeniero'
        ]);

        $profile = Profile::where('firstname', 'pepito')->first();

        $this->assertEquals($profile->firstname, 'pepito');
        $this->assertEquals($profile->lastname, 'botella');
        $this->assertEquals($profile->address, 'Montaña Paoz');
        $this->assertEquals($profile->phone_number, 123456789);
        $this->assertEquals($profile->profession, 'el ingeniero');
    }
}
