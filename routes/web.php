<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
