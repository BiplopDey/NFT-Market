<?php

namespace Tests\Feature\Src\Instant;

use App\Models\Instant;
use App\Models\User;
use App\Src\Instant\Domain\InstantEntity;
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
        $eloquentRepo = new EloquentInstantRepository();
        $data = $eloquentRepo->search(new InstantId($instant->id));
        $this->assertIsNumeric($data['createdAtTimestamp']);
    }
/*
    public function test_EloquentRepository_update_timestamp()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        $created_at = $instant->created_at;
        
        $eloquentRepo = new EloquentInstantRepository();
        $data = $eloquentRepo->search(new InstantId($instant->id));

        $title = "updating";
        $data['title'] = $title;
        $instantEntity = InstantEntity::fromArray($data);
        $eloquentRepo->save($instantEntity);

        $updatedInstantArray = $eloquentRepo->search(new InstantId($instant->id));

        $this->assertEquals($created_at, $updatedInstantArray['created_at']);
    }*/
}
