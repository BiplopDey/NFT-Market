<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use App\Models\Instant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_a_landig_page()
    {
        $response = $this->get(route('landing'));

        $response->assertStatus(200)->assertViewIs('landing');
    }

    public function test_can_see_all_user_instant_list()
    {
        User::factory(3)->create();
        $instants = Instant::factory(3)->create();
        
        $response = $this->get(route('landing'));
        $response->assertSee($instants[0]->title);// looks at html and find the given string
        //$response->assertStatus(200)->assertViewIs('landing');
    }

    public function test_can_see_uthors_name_in_instant_list()
    {
        $user=User::factory()->create();
        $instants = Instant::factory(3)->create();
        
        $response = $this->get(route('landing'));
        $response->assertSee($instants[0]->author->title)
        ->assertSee($instants[1]->author->title)
        ->assertSee($user->name);
    }
}
