@extends('layouts.app')

@section('content')
     <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($instants as $instant)
        <div class="col">
          <div class="card shadow-sm">
            <img src = "{{$instant->img}}" class="bd-placeholder-img card-img-top" width="100%" height="225" ></img>

            <div class="card-body">
              <p class="card-text">{{$instant->title}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  <form action="/instants/{{$instant->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                  </form>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
@endsection
 

