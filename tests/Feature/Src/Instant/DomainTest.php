<?php

namespace Tests\Feature\Src\Instant;

use App\Src\Instant\Domain\IdNotFound;
use App\Src\Instant\Domain\InstantId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DomainTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_InstantId()
    {
        
        $id = new InstantId(1);

        $this->assertEquals(1, $id->value());
    }
    
    public function test_wrong_InstantId()
    {
        $this->expectException(IdNotFound::class);
        $id = new InstantId(-1);
    }
}
