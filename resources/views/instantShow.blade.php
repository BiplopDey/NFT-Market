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

  <livewire:biddings :instant="$instant"/>
  <livewire:comments :instant="$instant"/>
  
@endsection
  
