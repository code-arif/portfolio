<?php

use App\Http\Controllers\Admin\AuthController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

//=========================================Admin Routes =========================================//
Route::get('/profile/{username}', [AuthController::class, 'show'])->name('show.profile');
Route::post('/profile/update/{username}', [AuthController::class, 'update'])->name('update.profile');

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::get('/services',[HomeController::class,'services'])->name('services');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/single-blog',[HomeController::class,'singleBlog'])->name('single.blog');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');


//admin
Route::get('/dashboard',[DashboardController::class,'dashboard']);
Route::get('/blog-create',[DashboardController::class,'create_blog']);
Route::get('/login',[DashboardController::class,'login']);

//404 page
Route::fallback(function () {
    return Inertia::render('404');
});
