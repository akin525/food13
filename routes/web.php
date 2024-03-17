<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'landingpage'])->name('home');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('product/{id}', [HomeController::class, 'getproduct']);
Route::get('food', [HomeController::class, 'allcake'])->name('food');
Route::get('cakedetail/{id}', [HomeController::class, 'cakedetail'])->name('cakedetail');
Route::get('addcart/{id}', [HomeController::class, 'addcart'])->name('addcart');
Route::get('cart', [HomeController::class, 'mycart'])->name('cart');
Route::get('cancelcart/{id}', [CartController::class, 'removefromcart'])->name('cancelcart');
Route::get('clearcart', [CartController::class, 'clearcart'])->name('clearcart');
Route::get('category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('ready', [HomeController::class, 'loadrtb'])->name('ready');
Route::get('about', [HomeController::class, 'aboutus'])->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
