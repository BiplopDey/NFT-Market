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

    public function sendComment()
    {        
        $commentService = new CommentServices;
        $commentService->addComment(Auth::user(), $this->instant->id, $this->comment);
    }

    public function render()
    {
        $commentService = new CommentServices;
        return view('livewire.comments', [
            'comments' =>  $commentService->allComments($this->instant->id),
        ]);
    }
}
