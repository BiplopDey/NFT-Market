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
    /*
    public function test_the_top_1_most_loved_instant()
    {
        $users = User::factory(5)->create();
        $instant = Instant::factory(5)->create();
        $instantTop1 = $instant[0];

        $users[0]->loves()->attach($instantTop1);
        $users[1]->loves()->attach($instantTop1);
        $users[2]->loves()->attach($instantTop1);
        $users[3]->loves()->attach($instantTop1);
        
        $users[0]->loves()->attach($instantTop2);
        $users[1]->loves()->attach($instantTop2);
        $users[2]->loves()->attach($instantTop2);

        $users[0]->loves()->attach($instantTop3);
        $users[1]->loves()->attach($instantTop3);

        $users[0]->loves()->attach($instant[3]);
        $users[0]->loves()->attach($instant[4]);

        $instantTopLovers = Instant::topLovers(3);

        $this->assertEquals($instantTop1, $instantTopLovers[0]);
    }
    */
    /*
    public function test_the_top_3_most_loved_instant()
    {
        $users = User::factory(5)->create();
        $instant = Instant::factory(5)->create();
        $instantTop1 = $instant[0];
        $instantTop2 = $instant[1];
        $instantTop3 = $instant[2];

        $users[0]->loves()->attach($instantTop1);
        $users[1]->loves()->attach($instantTop1);
        $users[2]->loves()->attach($instantTop1);
        $users[3]->loves()->attach($instantTop1);
        
        $users[0]->loves()->attach($instantTop2);
        $users[1]->loves()->attach($instantTop2);
        $users[2]->loves()->attach($instantTop2);

        $users[0]->loves()->attach($instantTop3);
        $users[1]->loves()->attach($instantTop3);

        $users[0]->loves()->attach($instant[3]);
        $users[0]->loves()->attach($instant[4]);

        $instantTopLovers = Instant::topLovers(3);

        $this->assertEquals($instantTop1, $instantTopLovers[0]);
    }
    */
}
