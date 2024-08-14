<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');





Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['IsAdmin'],
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // ===== Upload Image With FillPond ===== //
    Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload'); // author للكاتب 
    Route::post('/upload/products', [UploadController::class, 'upload_image_products'])->name('upload.products'); // blog للمدونة    
    Route::post('/upload/categories', [UploadController::class, 'upload_image_category'])->name('upload.categories'); // category للتصنيفات
    // ====================================== //

    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
});
