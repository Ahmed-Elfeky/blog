<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;



Route::controller(WebsiteController::class)->name('website.')->group(function(){
Route::get('/','index')->name('index');
Route::get('/category','category')->name('category');
Route::get('/contact','contact')->name('contact');
Route::get('/blog','blog')->name('blog');
Route::get('/register','register')->name('register');
// Route::get('/login','Login')->name('login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
