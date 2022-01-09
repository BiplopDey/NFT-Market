@extends('layouts.app')

@section('content')

  <ul class="list-group">
    @empty($lovers)
        No lovers
    @endempty
    @foreach($lovers as $lover)
        <li class="list-group-item">
          <a href="{{route('user.profile', $lover->id)}}">{{$lover->name}}</a>
        </li>
    @endforeach   
  </ul>
@endsection
 