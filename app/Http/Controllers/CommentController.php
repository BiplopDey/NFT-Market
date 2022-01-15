<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use App\Services\CommentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment($instantId, Request $request)
    {
        $user = Auth::user();
        if(!$user) return back();

        $commentService = new CommentServices;
        $commentService->addComment($user, $instantId, $request->comment);
        return back();
    }
}
