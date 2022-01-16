<?php

namespace App\Services;

use App\Models\Instant;
use App\Repository\CommentRepository;

class CommentServices{
    public function addComment($user, $instantId, $comment)
    {
        $instant = Instant::find($instantId);
        if(!$user || !$instant) return;
        $instant->addComment($user, $comment);
    }

    public function allComments($instantId): array
    {
        $comments = [];
        $instant = Instant::find($instantId);
        if(!$instant) return $comments;
        
        foreach ($instant->commentators as $commentor) {
            array_push($comments, new CommentRepository(
                $commentor->id, 
                $commentor->name,
                $commentor->pivot->comment));
        }
        return $comments;
    }
}