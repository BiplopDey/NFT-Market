<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($instants as $instant)
        <div class="col">
            <div class="card shadow-sm">
                <img src = "{{$instant->img}}" class="bd-placeholder-img card-img-top" width="100%" height="225" ></img>
                <div class="card-body">
                <p class="card-text">{{$instant->title}}</p>
                <p class="card-text">
                Owner: 
                <a href="{{route('user.profile', $instant->author->id)}}">{{$instant->author->name}}</a>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    @auth
                        <a href="{{route('instants.show', ['id' => $instant->id])}}">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </a>
                        @if(Auth::user()->isAuthor($instant) || Auth::user()->isAdmin)
                            <a href="{{route('instants.edit', ['id' => $instant->id])}}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </a>
                            
                            <button wire:click="delete({{$instant->id}})" class="btn btn-sm btn-outline-secondary">Delete</button>
                            
                        @endif
                        
                        @php
                            $heart = 'bi bi-heart';
                            if(Auth::user()->isInLove($instant)) $heart = 'bi bi-heart-fill';
                        @endphp
                        </div>
                            <small class="text-muted">
                                <i wire:click="love({{$instant->id}})" class="{{$heart}}"></i>
                                {{-- {{$instant->lovesCount()}} --}}
                                @if ($instant->lovesCount())
                                <a href="{{route('instants.lovers', ['id'=>$instant->id])}}">
                                    <div>
                                        {{$instant->lovesCount()}}-Lovers    
                                    </div> 
                                </a>
                                @endif
                            </small>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>