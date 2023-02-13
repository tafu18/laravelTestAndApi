<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAboutPage()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function testContactPage()
    {
        $response = $this->get('/contact');

        $response->assertStatus(404);
    }

    public function testWelcomePageDocumentationLaracast()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(['laracast', 'Documentation']);
    }

    public function testLoginRedirectToDashboardSuccessfully()
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

    public function testAuthUserCanAccessWelcomePage()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    public function testUnauthUserCannotAccessWelcomePage()
    {
        $response = $this->get('dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function testAuthUserCanAccessDashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }
}
