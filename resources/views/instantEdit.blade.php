@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
    <div class="container">
      <form action="{{ route('instants.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">TITLE</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput2">IMAGE URL</label>
          <input type="url" name="img" class="form-control" id="exampleFormControlInput2" >
        </div>
        <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
      <form/>
    </div>
  </div>
@endsection
  
