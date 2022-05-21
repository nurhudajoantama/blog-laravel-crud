<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('dashboard.index');
});

Route::prefix('/blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/', [BlogController::class, 'store'])->name('blog.store');
    Route::put('/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');
});
