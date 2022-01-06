<?php

namespace Tests\Feature\Models;

use App\Models\Instant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstantTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_instant_is_loved_by_users()
    {
        $users = User::factory(2)->create();
        $instant = Instant::factory()->create();
        $users[0]->loves()->attach($instant);
        $users[1]->loves()->attach($instant);
        $this->assertEquals(2, $instant->lovers->count());
    }

}
