<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->middleware('auth');

Route::get('/form1', function () {
    return view('form1');
})->middleware('auth');
;

Route::get('/form2', function () {
    return view('form2');
})->middleware('auth');
;

Route::get('/form3', function () {
    return view('form3');
})->middleware('auth');
;

Route::get('/form4', function () {
    return view('form4');
})->middleware('auth');

Route::get('/messegs', function () {
    return view('messegs');
})->middleware('auth');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


