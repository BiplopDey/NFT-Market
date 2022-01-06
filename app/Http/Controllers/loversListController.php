<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use Illuminate\Http\Request;

class loversListController extends Controller
{
    public function loversList(int $instantId)
    {
        $instant = Instant::find($instantId);
        return view('loversList', ['lovers' => $instant->lovers]);
    }
}
