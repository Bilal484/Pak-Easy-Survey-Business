<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserStatsController;
use App\Http\Controllers\ReferralLinkController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::resource('user-stats', UserStatsController::class);


Route::get('/products', [ProductController::class, 'index']);



// product

Route::get('/productS', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products-post', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{product}/review', [ProductController::class, 'review'])->name('products.review');


Route::post('products/{product}/review', [ProductReviewController::class, 'store'])->name('products.review.store');

// Route::post('/products/{product}/review', 'ProductReviewController@store')->name('products.review.store');

Route::get('/referral-users', [UserStatsController::class, 'referralUsers'])->name('referral-users');

// Front end routes

Route::get('admin',[FrontController::class ,'admin'])->name('admin');
