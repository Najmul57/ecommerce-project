<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [IndexController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ==============================admin route ================================
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // profile
    Route::get('admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('update/admin/profile', [AdminController::class, 'updateAdminProfile'])->name('update.admin.profile');
    Route::get('admin/image', [AdminController::class, 'adminImageChange'])->name('admin.image');
    Route::post('admin/image/update', [AdminController::class, 'adminImageUpdate'])->name('admin.image.update');
    Route::get('admin/password', [AdminController::class, 'adminPassword'])->name('admin.password');
    Route::post('update/password', [AdminController::class, 'updatePssword'])->name('admin.update.password');
});

// ================================user route==================================
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('update/profile', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::get('user/image', [UserController::class, 'userImage'])->name('user.image');
    Route::post('update/image', [UserController::class, 'updateImage'])->name('update.image');
    Route::get('user/password', [UserController::class, 'userPassword'])->name('user.password');
    Route::post('update/password', [UserController::class, 'updatePssword'])->name('update.password');
});
