<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('baldai/{prekesKategorija}', function (Request $request) {
    return view('baldai', [
        'category' => $request->prekesKategorija
    ]);
})->name('baldai');

Route::get('cart', function () {
    return view('cart');
})->name('cart');

Route::get('wishList', function() {
    return view('wishList');
})->name('wishList');

Route::get('auth', function() {
    return view('auth');
})->name('auth');
