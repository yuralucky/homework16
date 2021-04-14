<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', [AdvertisementController::class, 'index'])->name('advertisements.index');

Route::middleware('guest')->group(function () {
    Route::post('auth/login', [AuthController::class, 'handlelogin'])->name('auth.handlelogin');
});

Route::middleware('auth')->group(function () {
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
    Route::get('/edit', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::post('/edit', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::post('/update/{id}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::get('/delete/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
});

Route::get('/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');

