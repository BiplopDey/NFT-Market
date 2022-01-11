@extends('layouts.app')

@section('content')
  @if (!empty($topInstants))
    <x-slider :events='$topInstants'/> 
  @endif
  
  <div class="album py-5 bg-light">
    <div class="container">
      <livewire:instants-list />
    </div>
  </div>
@endsection
 

