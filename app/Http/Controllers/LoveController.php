<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoveController extends Controller
{
    public function loveToggle($instantId){
        $user = Auth::user();
        if($user->isInLove($instantId)){
            $user->loves()->detach($instantId);
            return back();
        }
        $user->loves()->attach($instantId);
        //Auth::user()->loves()->attach($instantId);
       // dd($id);
        return back();
    }

}
