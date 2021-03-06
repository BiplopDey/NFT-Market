<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\InstantController;
use App\Http\Controllers\LoveController;
use App\Http\Controllers\loversListController;
use App\Http\Controllers\UserController;
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
Route::post('/instants',[InstantController::class, 'store'])->name('instants.store')->middleware('auth');
Route::delete('/instants/{id}',[InstantController::class, 'destroy'])->name('instants.delete')->middleware('auth');
Route::get('/edit/{id}', [InstantController::class, 'edit'])->name('instants.edit')->middleware('auth');
Route::put('/update/{id}', [InstantController::class, 'update'])->name('instants.update')->middleware('auth');
Route::get('/instants/love/{id}', [LoveController::class, 'loveToggle'])->name('instants.love')->middleware('auth');

Route::get('/instant/{id}',[InstantController::class, 'show'])->name('instants.show');
Route::post('/comment/{id}', [CommentController::class, 'addComment'])->name('instant.comment')->middleware('auth');
Route::get('/myInstants', [LandingController::class, 'myInstants'])->name('myInstants')->middleware('auth');

Route::get('/instant/{id}/lovers', [loversListController::class, 'loversList'])->name('instants.lovers');
Route::get('/profile/{id}', [UserController::class, 'view'])->name('user.profile');

//Admin Routes
Route::get('/dashboard', function(){
    return view('admin.index');
})->name('admin.index')->middleware('Admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
