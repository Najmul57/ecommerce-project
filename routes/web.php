<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
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

    // product
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('store-product', [ProductController::class, 'storeProduct'])->name('store-product');
    Route::get('childcategory/ajax/{subcategory_id}', [ProductController::class, 'getChildCat']);
    Route::get('manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('product.edit/{product_id}', [ProductController::class, 'productEdit'])->name('product.edit');
    Route::post('update/product', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('product.destroy/{product_id}', [ProductController::class, 'productDestroy'])->name('product.destroy');
    Route::get('product/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
    Route::get('product/active/{id}', [ProductController::class, 'productActive'])->name('product.active');

    // slider
    Route::get('slider', [SliderController::class, 'index'])->name('slider');
    Route::post('slider/store', [SliderController::class, 'sliderStore'])->name('slider.store');
    Route::get('slider-edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider-update', [SliderController::class, 'update'])->name('slider.update');
    Route::get('slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::get('slider/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::get('slider/active/{id}', [SliderController::class, 'active'])->name('slider.active');
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



// ================================frontend route==================================
Route::get('language/bangla', [LanguageController::class, 'bangla'])->name('language.bangla');
Route::get('language/english', [LanguageController::class, 'english'])->name('language.english');


Route::get('single/product/{id}', [IndexController::class, 'singleProduct'])->name('single.product');
Route::get('product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);
Route::get('subcategory/product/{id}', [IndexController::class, 'subcategoryProduct'])->name('subcategory.product');

// product view with ajax
Route::get('product/view/modal/{id}', [IndexController::class, 'productView']);

// cart
Route::post('cart/data/store/{id}', [CartController::class, 'addToCart']);

// mini cart
Route::get('/product/mini/cart/', [CartController::class, 'miniCart']);

// cart remove
Route::get('/mini/cart/product-remove/{rowId}', [CartController::class, 'cartRemove']);

// wishlist
Route::post('/add-to-wishlist/{id}', [CartController::class, 'addToWishlist']);
