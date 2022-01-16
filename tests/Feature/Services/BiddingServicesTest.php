<?php

namespace Tests\Feature\Services;

use App\Models\Instant;
use App\Models\User;
use App\Services\BiddingServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BiddingServicesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_bid_service()
    {
        
        $user = User::factory()->create();
        $instant = Instant::factory()->create();
        
        $biddingService = new BiddingServices();
        $biddingService->placeBid($instant->id, $user, 20, 'BTC');
        $this->assertDatabaseCount('biddings', 1);
    }

    public function test_can_get_my_auctions_services()
    {
        $user = User::factory()->create();
        $instants = Instant::factory(4)->create();
    
        foreach ($instants as $instant)
            $instant->placeBid($user->id, 3, 'btc');    
        
        $instants[0]->placeBid($user->id, 2, 'eth');

        $biddingService = new BiddingServices();
        $myAuctions = $biddingService->getUsersAuctions($user);

        $this->assertCount(4, $myAuctions);
        foreach ($instants as $instant)
            $myAuctions->contains($instant->id);    
    }

    public function test_can_get_instant_biddings()
    {
        $users = User::factory(4)->create();
        $instant = Instant::factory()->create();
    
        foreach ($users as $user)
            $instant->placeBid($user->id, 3, 'btc');
        

        $biddingService = new BiddingServices();
        $biddings = $biddingService->getInstantsBiddings($instant->id);

        $this->assertCount(4, $biddings);
        
        foreach ($biddings as $bid){
            $this->assertEquals(3, $bid->getAmount());
            $this->assertTrue($users->contains($bid->getBidderId()));
        }
    }

    public function test_can_get_highest_bid()
    {
        $users = User::factory(3)->create();
        $instant = Instant::factory()->create();
    
        $instant->placeBid($users[0]->id, 13, 'btc');
        $instant->placeBid($users[1]->id, 3, 'btc');
        $instant->placeBid($users[2]->id, 30, 'btc');

        $biddingService = new BiddingServices();
        $highestBid = $biddingService->getHighestBid($instant->id);
    
        $this->assertEquals(30, $highestBid->getAmount());
        $this->assertEquals($users[2]->id, $highestBid->getBidderId());
    }


}
