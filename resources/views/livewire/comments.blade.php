<div>  

  <h1>Comments</h1>
  <ul class="list-group">
    @foreach ($comments as $c)
      <li class="list-group-item" >
        Auth: {{$c->getAuthorName()}} | Comment: {{$c->getContent()}}
      </li>
    @endforeach
  </ul>

  <p>Add Comment</p>
  <div class="album py-5 bg-light">
    <div class="container">
        <div class="form-group">
          <label for="exampleFormControlInput1">TITLE</label>
          <input type="text" wire:model="comment" class="form-control" >
        </div>
        <button  wire:click="sendComment" class="btn btn-primary mb-2">COMMENT</button>
    </div>
  </div>
  
</div>
