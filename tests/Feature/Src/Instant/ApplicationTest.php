<?php

namespace Tests\Feature\Src\Instant;

use App\Models\Instant;
use App\Models\User;
use App\Src\Instant\Application\FindInstantUseCase;
use App\Src\Instant\Application\LoveInstantUseCase;
use App\Src\Instant\Infrastructure\EloquentInstantRepository;
use Carbon\Carbon;
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
    public function test_user_can_love_an_insstant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $loveService = new LoveInstantUseCase();
        $loveService->toggleLove($user, $instant->id);
        $this->assertEquals(1, $user->loves()->count());
        
    }

    public function test_find_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        // $model = new Instant();
        // $data = $model->findOrFail($instant->id)->toArray();
        
        // $data['createdAtTimestamp'] = Carbon::parse($data['created_at'])->timestamp;
        // dd($data);
        
       $useCase = new FindInstantUseCase(new EloquentInstantRepository());
       $intantEntity = $useCase->execute($instant->id);
       $this->assertEquals($instant->title, $intantEntity->title());
    }

}
