<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;



Route::controller(WebsiteController::class)->name('website.')->group(function(){
Route::get('/','index')->name('index');
Route::get('/category/{id}','category')->name('category');
Route::get('/contact','contact')->name('contact');
Route::get('/blog','blog')->name('blog');
Route::get('/blog/details/{id}','blogDetailes')->name('blog.details');
//route to show my blog
Route::get('/blog/MyBlog','MyBlog')->name('MyBlog');

});
// contact routes //
Route::get('/contact-create',[ContactController::class, 'create']);
Route::post('/contact-post',[ContactController::class, 'store'])->name('contact.store');
// category routes //
Route::get('/category-create',[CategoryController::class, 'create']);
Route::post('/category-post',[CategoryController::class, 'store'])->name('category.store');

// blog routes //
Route::resource('/blogs',BlogController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
