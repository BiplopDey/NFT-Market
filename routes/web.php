<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\InstantController;
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

Route::get('/', [LandingController::class, 'index']);

Route::get('/instants/create',[InstantController::class, 'create']);
Route::delete('/instants/{id}',[InstantController::class, 'destroy']);
