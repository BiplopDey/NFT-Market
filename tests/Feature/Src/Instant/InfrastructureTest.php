<?php

namespace Tests\Feature\Src\Instant;

use App\Models\Instant;
use App\Models\User;
use App\Src\Instant\Domain\InstantId;
use App\Src\Instant\Infrastructure\EloquentInstantRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InfrastructureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_EloquentRepository_search_timestamp()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        $elquentRepo = new EloquentInstantRepository();
        $data = $elquentRepo->search(new InstantId($instant->id));
        $this->assertIsNumeric($data['createdAtTimestamp']);
    }
}
