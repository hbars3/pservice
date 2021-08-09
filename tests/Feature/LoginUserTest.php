<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        $this->post('/register', [
            'name' => 'juanito',
            'email' => 'juanito@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        $response = $this->get('/login', [
            'email' => 'juanito',
            'password' => '12345678'
        ]);
        $response->assertStatus(302);
    }
}
