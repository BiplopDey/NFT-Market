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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/instants/create',[InstantController::class, 'create'])->name('instants.create')->middleware('auth');
Route::post('/instants',[InstantController::class, 'store'])->name('instants.store');
Route::delete('/instants/{id}',[InstantController::class, 'destroy'])->name('instants.delete');

Route::get('/edit/{id}', [InstantController::class, 'edit'])->name('instants.edit');
Route::put('/update/{id}', [InstantController::class, 'update'])->name('instants.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
