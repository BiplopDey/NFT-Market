<?php

namespace App\Services;

use App\Models\Instant;
use App\Repository\BidRepository;

class BiddingServices{
    public function placeBid($instantId, $user, $amount, $currency)
    {
        $instant = Instant::find($instantId);
        if(!$user || !$instant) return;
        
        $instant->placeBid($user, $amount, $currency);
    }

    public function getUsersAuctions($user)
    {
        if(!$user) return;

        return $user->myUniqueAuctions();
    }

    public function getInstantsBiddings($instantId): array
    {
        $biddings = [];
        $instant = Instant::find($instantId);
        if(!$instant) return $biddings;

        foreach ($instant->bidders as $bidder)
            array_push($biddings, new BidRepository(
                $bidder->id, 
                $bidder->name,
                $bidder->pivot->bid,
                $bidder->pivot->currency
            ));

        return $biddings;
    }

    public function getHighestBid($instantId): ?BidRepository
    {
        $biddings = $this->getInstantsBiddings($instantId);
        if(count($biddings)===0) return null;
        $max=0;
        $MaxBidding = null;
        
        foreach ($biddings as $bidding)
            if($max < $bidding->getAmount()){
                $MaxBidding = $bidding;
                $max = $bidding->getAmount();
            }
                
        return $MaxBidding;
    }
}