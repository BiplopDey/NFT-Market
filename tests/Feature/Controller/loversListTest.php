<?php

namespace Tests\Feature\Controller;

use App\Models\Instant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loversListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_lovers_list()
    {
        $user=User::factory()->create();
        $instant = Instant::factory()->create();
        $instant->attachUser($user);

        $response = $this->get(route('instants.lovers', ['id'=>$instant->id]));

        $response->assertSee($user->name);
    }
}
