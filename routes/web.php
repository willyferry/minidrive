<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MyFileController;
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

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::post('/file/{id}/confirm-password', [IndexController::class, 'downloadFileConfirmPassword'])->name('file.confirmPassword');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('isAdmin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('files', FileController::class);
    });

    Route::resource('/my-files', MyFileController::class);

    Route::get('/account-setting', [AccountSettingController::class, 'index'])->name('account-setting.index');
    Route::put('/account-setting', [AccountSettingController::class, 'update'])->name('account-setting.update');
});

Auth::routes(['reset' => false]);
