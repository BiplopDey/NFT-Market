<?php

namespace App\Services;

use App\Models\Instant;

class CommentServices{
    public static function addComment($user, $instantId, $comment)
    {
        if(!$user) return;
        $instant = Instant::find($instantId);
        $instant->addComment($user, $comment);
    }
}