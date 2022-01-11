<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\LoveServices;

class LoveController extends Controller
{
    public function loveToggle($instantId){
        $user = Auth::user();
        $loveServices = new LoveServices();
        $loveServices->toggleLove($user, $instantId);
        return back();
    }

}
