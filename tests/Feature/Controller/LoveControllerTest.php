<?php

namespace Tests\Feature\Controller;

use App\Models\Instant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoveControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_auth_user_can_love_an_instant(){
        
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $response = $this->actingAs($user)
        ->get(route('instants.love',['id'=>$instant->id]));

        $this->assertTrue($user->isInLove($instant));
    }

    public function test_auth_user_can_un_love_an_instant(){
        
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        $user->loves()->attach($instant);

        $response = $this->actingAs($user)
        ->get(route('instants.love',['id'=>$instant->id]));

        $this->assertFalse($user->isInLove($instant));
    }

   
}
