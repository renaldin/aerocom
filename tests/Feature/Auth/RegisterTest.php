<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_render_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_submit_data()
    {
        $response = $this->post('/register', [
            'name' => 'Test Renaldi',
            'email' => 'test.renaldi' . rand(0, 9999) . '@example.com',
            'password' => 'testpassrey',
            'password_confirmation' => 'testpassrey'
        ]);

        $this->assertAuthenticated();
        // $response->assertRedirect('/');
    }
}
