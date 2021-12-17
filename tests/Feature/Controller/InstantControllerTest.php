<?php

namespace Tests\Feature\Controller;

use App\Models\Instant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class InstantControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // CREATE
    public function test_auth_user_can_see_an_instant_create_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('instants.create'));//acting as user loged in

        $response->assertStatus(200)->assertViewIs('instantForm');//check if is rendering the instantForm.blade.php
    }

    public function test_not_auth_user_cannot_see_an_instant_create_form_and_redirect_to_login()
    {
        
        $response = $this->get(route('instants.create'));//acting as user loged in

        $response->assertStatus(302)->assertRedirect('/login');//the middleware always redirect
    }

    public function test_auth_user_can_create_an_instant()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'titulo1',
            'img' => 'http://hola.jpg'
        ];
        $response = $this->actingAs($user)->post(route('instants.store'), $data);

        $this->assertDatabaseCount('instants', 1);
    }

    public function test_not_auth_user_cant_create_an_instant()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'titulo1',
            'img' => 'http://hola.jpg'
        ];
        $response = $this->post(route('instants.store'), $data);

        $this->assertDatabaseCount('instants', 0);
    }

    //DELETE
    public function test_not_auth_user_cant_delete_an_instant()
    {
        User::factory()->create();
        $instant = Instant::factory()->create();
        
        $response = $this->delete(route('instants.delete',$instant->id));

        $this->assertDatabaseCount('instants', 1);
    }

    public function test_auth_user_can_delete_own_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        
        $response = $this->actingAs($user)->delete(route('instants.delete',$instant->id));

        $this->assertDatabaseCount('instants', 0);
    }

    public function test_auth_user_cant_delete_others_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create(['user_id'=>2]);
        
        $response = $this->actingAs($user)->delete(route('instants.delete',$instant->id));

        $this->assertDatabaseCount('instants', 1);
    }

    public function test_auth_user_isAuth()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        
        $this->actingAs($user)->assertTrue(Auth::user()->isAuthor($instant));
    }
}
