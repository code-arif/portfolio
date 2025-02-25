<?php

use Inertia\Inertia;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\Admin\AboutManageController;
use App\Http\Controllers\Admin\SkillManageController;
use App\Http\Controllers\Admin\ProfileManageController;

//=============================Admin Routes ===========================//
Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login.show');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');

Route::group(['middleware' => TokenVerificationMiddleware::class], function () {
    //logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    //admin dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('show.admin.dashbaord');

    //profile
    Route::group(['prefix' => 'manage/profile'], function () {
        Route::get('/', [ProfileManageController::class, 'show'])->name('show.profile');
        Route::post('/update/{id}', [ProfileManageController::class, 'update'])->name('update.profile');
    });

    //about
    Route::group(['prefix' => 'manage/about'], function () {
        Route::get('/', [AboutManageController::class, 'show'])->name('show.manage.about.page');
    });

    //skill
    Route::group(['prefix' => 'manage/skill'], function () {
        Route::get('/', [SkillManageController::class, 'show'])->name('show.skill.list.page');
        Route::get('/add-edit-skill', [SkillManageController::class, 'showAddEditSkill'])->name('show.add.edit.skill');
        Route::post('/create', [SkillManageController::class, 'create'])->name('create.skill');
        Route::post('/update/{id}', [SkillManageController::class, 'update'])->name('update.skill');
    });
});



//=============================Frontend Routes ===========================//
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about',[AboutController::class,'showAbout'])->name('show.about');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//admin

Route::get('/blog-create', [DashboardController::class, 'create_blog']);

//404 page
Route::fallback(function () {
    return Inertia::render('404');
});
