<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardRoutesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_user_redirect_to_login()
    {
        $response = $this->get(route('admin.index'));

        $response->assertRedirect(route('login'));
    }
    public function test_user_redirect_to_landing()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.index'));

        $response->assertRedirect(route('landing'));
    }
    public function test_admin_can_see_dashboard()
    {
        $admin = User::factory()->create(['isAdmin'=>true]);

        $response = $this->actingAs($admin)->get(route('admin.index'));

        $response->assertStatus(200)->assertViewIs('admin.index');
    }
}
