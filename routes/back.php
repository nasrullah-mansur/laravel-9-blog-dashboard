<?php

use App\Http\Controllers\Back\BlogCategoryController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\BlogTagController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // =====================================
    // ======================== Admin Routes 
    // =====================================

    Route::prefix('admin')->group(function () {
        // User;
        Route::get('users', [UserController::class, 'index'])->name('admin.user');
        Route::get('users/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('users/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('users/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('users/update', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('user/delete', [UserController::class, 'delete'])->name('admin.user.delete');

        // Blog Categories;
        Route::get('blog/categories', [BlogCategoryController::class, 'index'])->name('blog.category.index');
        Route::get('blog/category/create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
        Route::post('blog/category/store', [BlogCategoryController::class, 'store'])->name('blog.category.store');
        Route::get('blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
        Route::post('blog/category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog.category.update');
        Route::post('blog/category/delete', [BlogCategoryController::class, 'delete'])->name('blog.category.delete');

        // Blog Tags;
        Route::get('blog/tags', [BlogTagController::class, 'index'])->name('blog.tag.index');
        Route::get('blog/tag/create', [BlogTagController::class, 'create'])->name('blog.tag.create');
        Route::post('blog/tag/store', [BlogTagController::class, 'store'])->name('blog.tag.store');
        Route::get('blog/tag/edit/{id}', [BlogTagController::class, 'edit'])->name('blog.tag.edit');
        Route::post('blog/tag/update/{id}', [BlogTagController::class, 'update'])->name('blog.tag.update');
        Route::post('blog/tag/delete', [BlogTagController::class, 'delete'])->name('blog.tag.delete');

        // Blogs;
        Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::post('blog/delete', [BlogController::class, 'delete'])->name('blog.delete');
    });
});
