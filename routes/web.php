<?php

use App\Http\Controllers\Admin\GaleriFotoController;
use App\Http\Controllers\Admin\GaleriVideoController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JenisJabatanController;
use App\Http\Controllers\Admin\JenisLayananController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\MisiController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\StrukturController;
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
    Route::resource('mitra', MitraController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('jenis_jabatan', JenisJabatanController::class);
    Route::resource('jenis_layanan', JenisLayananController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('galeri_foto', GaleriFotoController::class);
    Route::resource('galeri_video', GaleriVideoController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('header', HeaderController::class);

});
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('file/{folder}/{data}', [LandingController::class, 'file'])->where('data', '.*');
