<div>
<h1>Add Comment</h1>
  <div class="album py-5 bg-light">
    <div class="container">
      {{-- <form action="{{route('instant.comment', ['id' => $instant->id])}}" method="POST">
        @csrf --}}
        <div class="form-group">
          <label for="exampleFormControlInput1">TITLE</label>
          <input type="text" wire:model="comment" class="form-control" >
        </div>
        <button  wire:click="sendComment" class="btn btn-primary mb-2">COMMENT</button>
      {{-- <form/> --}}
      {{-- {{$comment}} --}}
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
</div>
