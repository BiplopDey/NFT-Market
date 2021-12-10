<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use Illuminate\Http\Request;

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
        return view('landing', ['instants'=>$instants]);
    }
   
}
