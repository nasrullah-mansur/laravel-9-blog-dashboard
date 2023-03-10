<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\MenuController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\BlogTagController;
use App\Http\Controllers\Back\AppearanceController;
use App\Http\Controllers\Back\BannerController;
use App\Http\Controllers\Back\BlogCategoryController;
use App\Http\Controllers\Back\ImageGalleryController;
use App\Http\Controllers\Back\VideoGalleryController;

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

        // Appearance;
        Route::get('appearance/edit', [AppearanceController::class, 'edit'])->name('appearance.edit');
        Route::post('appearance/update', [AppearanceController::class, 'update'])->name('appearance.update');

        // Menu;
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::post('/menu/delete', [MenuController::class, 'delete'])->name('menu.delete');

        // Menu Item;
        Route::get('/menu/{slug}', [MenuController::class, 'menuItem'])->name('menuItem.index');
        Route::post('/add/item', [MenuController::class, 'addItem'])->name('menuItem.addItem');
        Route::post('/menu/item/store/{menu_id}', [MenuController::class, 'menuItemStore'])->name('menuItem.store');
        Route::post('/menu/item/update', [MenuController::class, 'menuItemUpdate'])->name('menuItem.update');
        Route::post('/menu/item/delete', [MenuController::class, 'menuItemDelete'])->name('menuItem.delete');

        // Video Gallery Category;
        Route::get('gallery/video/categories', [VideoGalleryController::class, 'index_category'])->name('video_gallery_category.index');
        Route::get('gallery/video/category/create', [VideoGalleryController::class, 'create_category'])->name('video_gallery_category.create');
        Route::post('gallery/video/category/store', [VideoGalleryController::class, 'store_category'])->name('video_gallery_category.store');
        Route::get('gallery/video/category/edit/{id}', [VideoGalleryController::class, 'edit_category'])->name('video_gallery_category.edit');
        Route::post('gallery/video/category/update/{id}', [VideoGalleryController::class, 'update_category'])->name('video_gallery_category.update');
        Route::post('gallery/video/category/delete', [VideoGalleryController::class, 'delete_category'])->name('video_gallery_category.delete');

        // Video Gallery;
        Route::get('gallery/videos', [VideoGalleryController::class, 'index'])->name('video_gallery.index');
        Route::get('gallery/video/create', [VideoGalleryController::class, 'create'])->name('video_gallery.create');
        Route::post('gallery/video/store', [VideoGalleryController::class, 'store'])->name('video_gallery.store');
        Route::get('gallery/video/edit/{id}', [VideoGalleryController::class, 'edit'])->name('video_gallery.edit');
        Route::post('gallery/video/update/{id}', [VideoGalleryController::class, 'update'])->name('video_gallery.update');
        Route::post('gallery/video/delete', [VideoGalleryController::class, 'delete'])->name('video_gallery.delete');

        // Image Gallery Category;
        Route::get('gallery/image/categories', [ImageGalleryController::class, 'index_category'])->name('image_gallery_category.index');
        Route::get('gallery/image/category/create', [ImageGalleryController::class, 'create_category'])->name('image_gallery_category.create');
        Route::post('gallery/image/category/store', [ImageGalleryController::class, 'store_category'])->name('image_gallery_category.store');
        Route::get('gallery/image/category/edit/{id}', [ImageGalleryController::class, 'edit_category'])->name('image_gallery_category.edit');
        Route::post('gallery/image/category/update/{id}', [ImageGalleryController::class, 'update_category'])->name('image_gallery_category.update');
        Route::post('gallery/image/category/delete', [ImageGalleryController::class, 'delete_category'])->name('image_gallery_category.delete');

        // Image Gallery;
        Route::get('gallery/images', [ImageGalleryController::class, 'index'])->name('image_gallery.index');
        Route::get('gallery/image/create', [ImageGalleryController::class, 'create'])->name('image_gallery.create');
        Route::post('gallery/image/store', [ImageGalleryController::class, 'store'])->name('image_gallery.store');
        Route::get('gallery/image/edit/{id}', [ImageGalleryController::class, 'edit'])->name('image_gallery.edit');
        Route::post('gallery/image/update/{id}', [ImageGalleryController::class, 'update'])->name('image_gallery.update');
        Route::post('gallery/image/delete', [ImageGalleryController::class, 'delete'])->name('image_gallery.delete');

        // Banner;
        Route::get('banner', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('banner', [BannerController::class, 'update'])->name('banner.update');
    });
});
