<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('welcome');

// Blog;
Route::get('/blog/{slug}', [FrontController::class, 'single_blog'])->name('single.blog');

// Subscriber;
Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');


Route::middleware(['auth'])->group(function () {
    Route::get('profile', [FrontController::class, 'profile']);
});
