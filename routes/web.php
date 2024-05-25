<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


