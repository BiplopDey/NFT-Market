<div>

    @if($maxBidding)
        <ul class="list-group">
            <li> Current Bid</li>
            <li class="list-group-item">Value: {{$maxBidding->getAmount()}} | user: {{$maxBidding->getBidderName()}}</li>
        </ul>
    @endif
    
    @if ($showBiddingInput)
        <input type="text" wire:model="amount" class="form-control" >
        <input type="text" wire:model="currency" class="form-control" >
        <button type="button" wire:click="placeBid" class="btn btn-primary">Bid</button>
        <button type="button" wire:click="toggleBiddingInput" class="btn btn-primary">Cancel</button>
    @else
        <button type="button" wire:click="toggleBiddingInput" class="btn btn-primary">Place bid</button>    
    @endif
   
    <h2>Bidding history</h2>
    <ul class="list-group">
        @foreach ($biddings as $bid)
            <li class="list-group-item">Value: {{$bid->getAmount()}} | user: {{$bid->getBidderName()}}</li>    
        @endforeach
    </ul>
</div>
