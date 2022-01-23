<?php

namespace Tests\Feature\Src\Instant;

use App\Models\Instant;
use App\Models\User;
use App\Src\Instant\Application\LoveInstantUseCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_use_case_user_can_love_an_insstant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $loveService = new LoveInstantUseCase();
        $loveService->toggleLove($user, $instant->id);
        $this->assertEquals(1, $user->loves()->count());
        
    }
/*
    public function test_use_time()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        dd($instant->created_at->timestamp);
        
    }*/
}
