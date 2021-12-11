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

Route::view('/', 'auth.login')
    ->name('root');

Route::get('/feed', \App\Http\Livewire\Feed::class)
    ->name('feed');

Route::view('/watch/live', 'watch.live')
    ->name('watch.live');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/home', function () { return view('home');})
    ->name('home');
