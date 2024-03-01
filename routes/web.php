<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserStatsController;
use App\Http\Controllers\ReferralLinkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;



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


Route::get('/products',[ ProductController::class ,'index']);




// Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('reviews.create');

Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');
// Route for displaying a form to create a new review and submit review earnings
Route::post('/submit-review', [ReviewController::class, 'submitReview'])->name('submit-review');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
