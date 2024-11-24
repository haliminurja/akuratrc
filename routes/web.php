<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MisiController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'auth_login'])->name('auth_login');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::resource('sejarah', SejarahController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);

});
Route::get('/', [LandingController::class, 'index'])->name('index');
