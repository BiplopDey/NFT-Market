<?php

namespace App\Http\Livewire;

use App\Services\BiddingServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Biddings extends Component
{
    public $instant;
    public $showBiddingInput = false;
    public $amount = "";
    public $currency = "";

    
    public function toggleBiddingInput()
    {
        $this->showBiddingInput = !$this->showBiddingInput;
    }

    public function placeBid()
    {
        $biddingService = new BiddingServices();
        $biddingService->placeBid(
            $this->instant->id,
            Auth::user(), 
            $this->amount, 
            $this->currency
        );
        $this->showBiddingInput=false;
    }

    public function render()
    {
        $biddingService = new BiddingServices();
        return view('livewire.biddings', 
        [
         'maxBidding'=>$biddingService->getHighestBid($this->instant->id),
         'biddings'=>$biddingService->getInstantsBiddings($this->instant->id),
        ]);
    }
}