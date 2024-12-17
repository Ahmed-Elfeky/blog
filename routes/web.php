<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;



Route::controller(WebsiteController::class)->name('website.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/details/{id}', 'blogDetailes')->name('blog.details');
    //route to show my blog
    Route::get('/blog/MyBlog', 'MyBlog')->name('MyBlog');
});
// contact routes //
Route::get('/contact-create', [ContactController::class, 'create']);
Route::post('/contact-post', [ContactController::class, 'store'])->name('contact.store');
// category routes //
Route::get('/category-create', [CategoryController::class, 'create']);
Route::post('/category-post', [CategoryController::class, 'store'])->name('category.store');
// comment routes
Route::post('/category-post', [CommentController::class, 'store'])->name('comment.store');


// blog routes //
Route::resource('/blogs', BlogController::class);


require __DIR__ . '/auth.php';
