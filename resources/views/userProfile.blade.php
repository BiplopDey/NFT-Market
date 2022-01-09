@extends('layouts.app')

@section('content') 
    <h1>{{$user->name}}</h1>

    <h2>NFT:</h2>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($user->instants as $instant)
          <x-instantCard :instant='$instant'/> 
        @endforeach
      </div>
    </div>
  </div>
@endsection
