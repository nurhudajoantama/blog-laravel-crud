<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::prefix('/blog')->group(function () {
            Route::get('/', [DashboardController::class, 'indexBlog'])->name('dashboard.blog.index');
            Route::get('/create', [DashboardController::class, 'createBlog'])->name('dashboard.blog.create');
            Route::post('/', [DashboardController::class, 'storeBlog'])->name('dashboard.blog.store');
            Route::get('/{blog:slug}/edit', [DashboardController::class, 'editBlog'])->name('dashboard.blog.edit');
            Route::put('/{blog:slug}', [DashboardController::class, 'updateBlog'])->name('dashboard.blog.update');
            Route::delete('/{blog:slug}', [DashboardController::class, 'destroyBlog'])->name('dashboard.blog.destroy');
        });
    });

    // Settings Route
    Route::prefix('/settings')->group(function () {
        // Route::get('/', [DashboardController::class, 'indexSettings'])->name('settings.index');
        Route::get('/user', [SettingController::class, 'userSetting'])->name('settings.user');
        Route::post('/user', [SettingController::class, 'userSettingPost'])->name('settings.user.post');
        Route::get('/user/change-password', [SettingController::class, 'userChangePassword'])->name('settings.user.change-password');
        Route::post('/user/change-password', [SettingController::class, 'userChangePasswordPost'])->name('settings.user.change-password.post');
    });
});

Route::prefix('/user')->group(function () {
    Route::get('/{user:username}', [UserController::class, 'show'])->name('user.show');
});

Route::prefix('/blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    // Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    // Route::get('/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
    // Route::post('/', [BlogController::class, 'store'])->name('blog.store');
    // Route::put('/{slug}', [BlogController::class, 'update'])->name('blog.update');
    // Route::delete('/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');
});
