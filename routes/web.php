<?php

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

// Frontend
Route::domain(env('APP_DOMAIN'))->name('frontend.')->group(function () {
    Route::name('tasks.')->group(function () {
        Route::resource('/', App\Http\Controllers\Frontend\TasksController::class)
            ->only(['index', 'create', 'store']);
    });
});

// Auth
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Backend
Route::domain('admin.' . env('APP_DOMAIN'))->group(function () {
    Route::middleware('auth')->name('admin.')->group(function () {
        Route::resource('/', App\Http\Controllers\Admin\TasksController::class);
    });
});


