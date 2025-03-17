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
use App\Http\Controllers\Admin\EducationManageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PortfolioManageController;
use App\Http\Controllers\Admin\SkillManageController;
use App\Http\Controllers\Admin\ProfileManageController;
use App\Http\Controllers\Admin\ServicesManageController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Front\ServiceController;
use PHPUnit\Architecture\Services\ServiceContainer;

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
        Route::get('/', [ProfileManageController::class, 'show'])->name('show.add.edit.profile');
        Route::post('/update/{id?}', [ProfileManageController::class, 'update'])->name('update.profile');
    });

    //about
    Route::group(['prefix' => 'manage/about'], function () {
        Route::get('/', [AboutManageController::class, 'show'])->name('show.add.edit.about');
        Route::post('/update/{id?}', [AboutManageController::class, 'update'])->name('update.about');
    });

    //image
    Route::group(['prefix' => 'image'], function () {
        Route::post('store', [ImageController::class, 'storeImage'])->name('store.image');
    });

    //skill
    Route::group(['prefix' => 'skill'], function () {
        Route::get('/', [SkillManageController::class, 'showSkills'])->name('show.skill.list');
        Route::get('/add-edit', [SkillManageController::class, 'showAddEditSkill'])->name('show.add.edit.skill');
        Route::post('/create', [SkillManageController::class, 'createSkill'])->name('create.skill');
        Route::post('/update/{id}', [SkillManageController::class, 'updateSkill'])->name('update.skill');
    });

    //portfolio
    Route::group(['prefix' => 'portfolio'], function () {
        Route::get('/list', [PortfolioManageController::class, 'showPortfolios'])->name('show.portfolio.list');
        Route::get('/add-edit', [PortfolioManageController::class, 'showAddEditPortfolio'])->name('show.add.edit.portfolio');
        Route::post('/create', [PortfolioManageController::class, 'createPortfolio'])->name('create.portfolio');
        Route::post('/update/{id}', [PortfolioManageController::class, 'updatePortfolio'])->name('update.portfolio');
        Route::delete('/delete/{id}', [PortfolioManageController::class, 'deletePortfolio'])->name('delete.portfoilo');
        Route::post('/change-status/{id}', [PortfolioManageController::class, 'changePortfolioStatus'])->name('change.status.portfolio');
    });

    //social links
    Route::get('/social-links', [SocialLinkController::class,'getSocialLink'])->name('show.social.links');
    Route::post('/update-social-links/{id?}', [SocialLinkController::class,'updateSocialLink'])->name('update.social.links');

    //services
    Route::group(['prefix' => 'services'], function () {
        Route::get('/list', [ServicesManageController::class, 'showServices'])->name('show.service.list');
        Route::get('/add-edit', [ServicesManageController::class, 'showAddEditService'])->name('show.add.edit.service');
        Route::post('/create', [ServicesManageController::class, 'createService'])->name('create.service');
        Route::post('/update/{id}', [ServicesManageController::class, 'updateService'])->name('update.service');
        Route::delete('/delete/{id}', [ServicesManageController::class, 'deleteService'])->name('delete.service');
        Route::post('/change-status/{id}', [ServicesManageController::class, 'changeServiceStatus'])->name('change.status.service');
    });

    //education
    Route::group(['prefix' => 'degree'], function () {
        Route::get('/list', [EducationManageController::class, 'showDegree'])->name('show.degree.list');
        Route::get('/add-edit', [EducationManageController::class, 'showAddEditDegree'])->name('show.add.edit.degree');
        Route::post('/create', [EducationManageController::class, 'createDegree'])->name('create.degree');
        Route::post('/update/{id}', [EducationManageController::class, 'updateDegree'])->name('update.degree');
        Route::delete('/delete/{id}', [EducationManageController::class, 'deleteDegree'])->name('delete.degree');
    });
});



//=============================Frontend Routes ===========================//
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/get-profile', [HomeController::class, 'getProfile']);


Route::get('/about',[AboutController::class,'showAbout'])->name('show.about');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/services', [ServiceController::class, 'services'])->name('services');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//admin

Route::get('/blog-create', [DashboardController::class, 'create_blog']);

//404 page
Route::fallback(function () {
    return Inertia::render('404');
});
