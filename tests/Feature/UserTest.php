<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_about_page()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_contact_page()
    {
        $response = $this->get('/contact');

        $response->assertStatus(404);
    }

    public function test_welcome_page_documentation_laracast()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(['laracast', 'Documentation']);
    }

    public function test_login_redirect_to_dashboard_successfully()
    {
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_auth_user_can_access_welcome_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_welcome_page()
    {
        $response = $this->get('dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }
}
