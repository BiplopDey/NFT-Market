@extends('layouts.app')

@section('content')

  <ul class="list-group">
    @empty($lovers)
        No lovers
    @endempty
    @foreach($lovers as $lover)
        <li class="list-group-item">{{$lover->name}}</li>
    @endforeach   
  </ul>
@endsection
 