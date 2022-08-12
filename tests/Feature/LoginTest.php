<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $response = $this->post('/api/auth/login',['email' => 'demard@example.com', 'password' => 'password']);
        $response->assertStatus(200);
    }
    /**
     * 
     */
    public function testLoginFailure()
    {
        $response = $this->post('/api/auth/login',['email' => 'demard@example.com', 'password' => 'password222']);
        $response->assertUnauthorized();
    }
}
