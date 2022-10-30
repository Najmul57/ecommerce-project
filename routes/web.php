<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
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

    // brands
    Route::get('all-brand', [BrandController::class, 'index'])->name('brand');
    Route::post('brand-store', [BrandController::class, 'brandStore'])->name('brand.store');
    Route::get('brand-edit/{brand_id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('brand/update', [BrandController::class, 'brandUpdate'])->name('brand.update');
    Route::get('brand-destroy/{brand_id}', [BrandController::class, 'brandDestroy'])->name('brand.destroy');

    // category
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category-store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('category-edit/{category_id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('category/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('category-destroy/{category_id}', [CategoryController::class, 'categoryDestroy'])->name('category.destroy');

    // sub-category
    Route::get('sub-category', [SubcategoryController::class, 'index'])->name('sub-category');
    Route::post('subcategory/store', [SubcategoryController::class, 'subcategoryStore'])->name('subcategory.store');
    Route::get('subcategory-edit/{subcategory_id}', [SubcategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
    Route::post('subcategory/update', [SubcategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
    Route::get('subcategory-destroy/{subcategory_id}', [SubcategoryController::class, 'subcategoryDestroy'])->name('subcategory.destroy');

    // child-category
    Route::get('childcategory', [ChildcategoryController::class, 'index'])->name('childcategory');
    Route::get('subcategory/ajax/{category_id}', [ChildcategoryController::class, 'getSubCat']);
    Route::post('childcategory/store', [ChildcategoryController::class, 'childcategoryStore'])->name('childcategory.store');
    Route::get('childcategory-edit/{childcategory_id}', [ChildcategoryController::class, 'childcategoryEdit'])->name('childcategory.edit');
    Route::post('childcategory/update', [ChildcategoryController::class, 'childcategoryUpdate'])->name('childcategory.update');
    Route::get('childcategory-destroy/{childcategory_id}', [ChildcategoryController::class, 'childcategoryDestroy'])->name('childcategory.destroy');
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
