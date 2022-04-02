<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('baldai/{itemCategory}', [ProductController::class, 'index'])->name('baldai');

// Route::get('cart/increment', [CartController::class, 'increment'])->name('increment');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [CartController::class, 'store'])->name('cartStore');
Route::delete('cart/{cart_item_id}', [CartController::class, 'destroy'])->name('destroy');

Route::get('wishList', [WishlistController::class, 'index'])->name('wishList');
Route::post('wishlist/{product}', [WishlistController::class, 'store'])->name('wishStore');
Route::delete('wishlist/{wish_item}', [WishlistController::class, 'destroy'])->name('wish.destroy');

Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/login', [AuthController::class, 'loginUser'])->name('login');

Route::get('auth/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('auth/registration', [AuthController::class, 'register'])->name('registration');

Route::get('details', function() {
    return view('details');
})->name('details');

Route::get('order', function() {
    return view('order');
})->name('order');
