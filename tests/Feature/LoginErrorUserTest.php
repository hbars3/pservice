<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginErrorUserTest extends TestCase
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
            'name' => 'jean',
            'email' => 'jean@test.com',
            'password' => '87654321',
            'password_confirmation' => '87654321'
        ]);
        $response = $this->get('/login', [
            'email' => 'jean@test.com',
            'password' => '87654321'
        ]);
        $response->assertStatus(302);
    }
}
