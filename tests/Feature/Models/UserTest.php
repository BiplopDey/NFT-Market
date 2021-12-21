<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function test_user_can_love_an_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $user->loves()->attach($instant);
        $this->assertEquals(1, $user->loves()->count());
    }
}
