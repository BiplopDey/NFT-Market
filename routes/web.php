<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
class Instants {
    public $title = 'titulo1';
    function __construct($title)
    {
        $this->title = $title;
    }
}
Route::get('/', function () {
    $instants = [new Instants('hola'),new Instants('mundo')];
    return view('landing', ['instants'=>$instants]);
});
