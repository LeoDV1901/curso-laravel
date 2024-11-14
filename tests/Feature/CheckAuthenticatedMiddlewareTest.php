<?php 
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckAuthenticatedMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('login');
    }

    /** @test */
    public function it_allows_access_if_user_is_authenticated()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertSee('Bienvenido al Dashboard');
    }
}
