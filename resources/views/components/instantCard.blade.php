@props(['instant'])
<div class="col">
    <div class="card shadow-sm">
        <img src = "{{$instant->img}}" class="bd-placeholder-img card-img-top" width="100%" height="225" ></img>
        <div class="card-body">
        <p class="card-text">{{$instant->title}}</p>
        <p class="card-text">{{$instant->author->name}}</p>
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
                    <form action="{{route('instants.delete', ['id' => $instant->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                    </form>  
                @endif
                
                @php
                    $heart = 'bi bi-heart';
                    if(Auth::user()->isInLove($instant)) $heart = 'bi bi-heart-fill';
                @endphp
                </div>
                    <small class="text-muted">
                        <a href="{{route('instants.love', ['id'=>$instant->id])}}">
                            <i class="{{$heart}}"></i>
                        </a> 
                        @if ($instant->lovers->count())
                        <a href="{{route('instants.lovers', ['id'=>$instant->id])}}">
                            <div>
                                {{$instant->lovers->count()}}-Lovers    
                            </div> 
                        </a>
                        @endif
                    </small>
                </div>
            @endauth
        </div>
    </div>
</div>