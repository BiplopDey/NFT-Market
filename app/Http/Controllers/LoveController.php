<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoveController extends Controller
{
    public function loveToggle($instantId){
        Auth::user()->loveToggle($instantId);
        return back();
    }

}
