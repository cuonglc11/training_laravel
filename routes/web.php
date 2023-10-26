<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\FrontEnd\HomeController::class ,'index'] );

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::prefix('category')->name('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::post('show', [CategoryController::class, 'show'])->name('show');
        Route::post('update', [CategoryController::class, 'update'])->name('update');
        Route::post('destroy', [CategoryController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('product')->name('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('create', [ProductController::class, 'store'])->name('create');
        Route::post('show', [ProductController::class, 'show'])->name('show');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::post('destroy', [ProductController::class, 'destroy'])->name('destroy');



    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
