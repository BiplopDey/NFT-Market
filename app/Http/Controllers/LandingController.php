<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Instants {
    public $title = 'titulo1';
    function __construct($title)
    {
        $this->title = $title;
    }
}

class LandingController extends Controller
{
    public function index()
    {
        $instants = Instant::all();
        return view('landing', ['instants'=>$instants, 'topInstants' => Instant::topInstants(3)]);
    }
   
    public function myInstants()
    {
        if(!Auth::user()) return back();

        return view('myInstants', ['instants'=>Auth::user()->instants]);
    }
}
