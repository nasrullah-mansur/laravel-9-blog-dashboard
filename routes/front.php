<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('welcome');

// Blog;

Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blog');
Route::get('/blog/{slug}', [FrontController::class, 'single_blog'])->name('single.blog');
Route::get('/blogs/category/{slug}', [FrontController::class, 'blog_by_category'])->name('blog.by.category');
Route::get('/blogs/tag/{slug}', [FrontController::class, 'blog_by_tag'])->name('blog.by.tag');

// Subscriber;
Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');


Route::middleware(['auth'])->group(function () {
    Route::get('profile', [FrontController::class, 'profile']);
});
