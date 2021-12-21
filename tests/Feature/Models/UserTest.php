<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use App\Models\Instant;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_auth_user_isAuth()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        
        $this->actingAs($user)->assertTrue(Auth::user()->isAuthor($instant));
    }

    public function test_user_can_love_an_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $user->loves()->attach($instant);
        $this->assertEquals(1, $user->loves()->count());
    }

    public function test_user_can_love_an_instant_and_dislove()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $user->loves()->attach($instant);
        $user->loves()->detach($instant);
        $this->assertEquals(0, $user->loves()->count());
    }

    public function test_can_know_if_user_loves_an_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $user->loves()->attach($instant);
        $this->assertTrue($user->isInLove($instant));

        $user->loves()->detach($instant);
        $this->assertFalse($user->isInLove($instant));
    }


}
