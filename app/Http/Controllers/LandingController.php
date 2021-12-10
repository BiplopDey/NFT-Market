<?php

namespace App\Http\Controllers;

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
        $instants = [new Instants('hola'),new Instants('mundo')];
        return view('landing', ['instants'=>$instants]);
    }
   
}
