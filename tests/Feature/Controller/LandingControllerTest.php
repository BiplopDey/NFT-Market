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
        User::factory()->create();
        $instants = Instant::factory()->create();
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

    public function test_can_see_authors_name_in_instant_list()
    {
        $user=User::factory()->create();
        $instants = Instant::factory(3)->create();
        
        $response = $this->get(route('landing'));
        $response->assertSee($instants[0]->author->title)
        ->assertSee($instants[1]->author->title)
        ->assertSee($user->name);
    }

    public $instantDeleteButton = "Delete";
    public $instantEditButton = "Edit";

    public function test_not_auth_cant_see_edit_and_delete_button()
    {
        $user=User::factory(3)->create();
        $instants = Instant::factory(3)->create();
        
        $response = $this->get(route('landing'));
        $response->assertDontSee($this->instantDeleteButton)->assertDontSee($this->instantEditButton);
    }

    public function test_auth_user_can_only_see_edit_and_delete_button_of_their_instants()
    {
        $user=User::factory()->create();
        $instants = Instant::factory(3)->create();
        
        $response = $this->actingAs($user)->get(route('landing'));
        $response->assertSee($this->instantDeleteButton)->assertSee($this->instantEditButton);
    }

    public function test_not_auth_user_cant_see_my_instants_page()
    {
        $user=User::factory()->create();
        $instants = Instant::factory()->create();
        
        $response = $this->get(route('myInstants'));
        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_auth_user_can_see_their_instants_page()
    {
        $user=User::factory()->create();
        $instants = Instant::factory(2)->create();
        $response = $this->actingAs($user)->get(route('myInstants'));
        $response->assertSee($instants[0]->title)->assertSee($instants[0]->title);
    }
}
