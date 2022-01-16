<?php

namespace App\Http\Livewire;

use App\Models\Instant;
use App\Services\CommentServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $instant;
    public $comment;
/*    public $comments;

    public function mount()
    {
        $commentService = new CommentServices;
        $this->comments = $commentService->allComments($this->instant->id);
    }
*/
    public function sendComment()
    {        
        $commentService = new CommentServices;
        $commentService->addComment(Auth::user(), $this->instant->id, $this->comment);
        //$this->instant = Instant::find($this->instant->id);
        //$this->comments = $commentService->allComments($this->instant->id);
    }
    public function render()
    {
        $commentService = new CommentServices;
        return view('livewire.comments', [
            'comments' =>  $commentService->allComments($this->instant->id),
        ]);
    }
}
