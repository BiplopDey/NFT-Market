<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment($instantId, Request $request)
    {
        $comment = $request->comment;
        $user = Auth::user();
        if(!$user) return back();

        $instant = Instant::find($instantId);
        $instant->addComment($user, $comment);
        return back();
    }
}
