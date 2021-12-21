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
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <a href="{{route('instants.edit', ['id' => $instant->id])}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </a>
                <form action="{{route('instants.delete', ['id' => $instant->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                </form>
            @endauth
            </div>
                <small class="text-muted"><i class="bi bi-heart"></i></small>
            </div>
        </div>
    </div>
</div>