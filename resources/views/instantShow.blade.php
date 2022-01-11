@extends('layouts.app')

@section('content')
  <div class="card mb-3">
    <img src="{{$instant->img}}" class="card-img-top" alt="{{$instant->title}}">
    <div class="card-body">
      <h5 class="card-title">{{$instant->title}}</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">
        Owner: <a href="{{route('user.profile', $instant->author->id)}}">{{$instant->author->name}}</a>
      </small></p>
    </div>
  </div>
  <h1>Add Comment</h1>
  <div class="album py-5 bg-light">
    <div class="container">
      <form action="{{route('instant.comment', ['id' => $instant->id])}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">TITLE</label>
          <input type="text" name="comment" class="form-control" id="exampleFormControlInput1" >
        </div>
        <button type="submit" class="btn btn-primary mb-2">COMMENT</button>
      <form/>
    </div>
  </div>

  <h1>commentators</h1>
  <ul class="list-group">
    @foreach ($instant->commentators as $commentor)
    <li class="list-group-item">
      Auth:
      {{$commentor->name}} |
      Comment:{{$commentor->pivot->comment}}</li>    
    @endforeach
  </ul>
@endsection
  
