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
        
        $instant->attachUser($users[0]);
        $instant->attachUser($users[1]);
        $this->assertEquals(2, $instant->loversCount);
    }
    
    public function test_the_top_loved_instant()
    {
        $users = User::factory(5)->create();
        $instant = Instant::factory(5)->create();
        $instantTop1 = $instant[0];

        $instantTop1->attachUser($users[0]);
        
        $instanttopInstants = Instant::topInstants(1);
        $this->assertEquals($instantTop1->id, $instanttopInstants[0]->id);
    }
    
    
    public function test_the_top_3_most_loved_instant()
    {
        $users = User::factory(5)->create();
        $instants = Instant::factory(5)->create();
        $instantTop1 = $instants[0];
        $instantTop2 = $instants[1];
        $instantTop3 = $instants[2];
        
        $instantTop1->attachUser($users[0]);
        $instantTop1->attachUser($users[1]);
        $instantTop1->attachUser($users[2]);
        $instantTop1->attachUser($users[3]);
        
        $instantTop2->attachUser($users[0]);
        $instantTop2->attachUser($users[1]);
        $instantTop2->attachUser($users[2]);

        $instantTop3->attachUser($users[0]);
        $instantTop3->attachUser($users[1]);

        $instants[3]->attachUser($users[0]);
        $instants[4]->attachUser($users[1]);

        $instanttopInstants = Instant::topInstants(3);

        $this->assertEquals($instantTop1->id, $instanttopInstants[0]->id);
        $this->assertEquals($instantTop2->id, $instanttopInstants[1]->id);
        $this->assertEquals($instantTop3->id, $instanttopInstants[2]->id);
    }
    
    public function test_can_bid_instants()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $instant->bidders()->attach($user->id, ['bid' => 20, 'currency' => 'BTC']);
        $this->assertDatabaseCount('biddings', 1);
    }

    public function test_can_bid_method()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $instant->placeBid($user->id, 20, 'BTC');
        $this->assertDatabaseCount('biddings', 1);
    }
    
}
