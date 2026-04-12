<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Support\Facades\Route;

// ── Auth (public)
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login',    [AuthController::class, 'login']);
});

// ── Public endpoints
Route::get('categories',          [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);

Route::get('shops',               [ShopController::class, 'index']);
Route::get('shops/{shop}',        [ShopController::class, 'show']);

Route::get('products',            [ProductController::class, 'index']);
Route::get('products/{product}',  [ProductController::class, 'show']);

Route::get('products/{product}/reviews', [ReviewController::class, 'index']);

// ── Authenticated endpoints
Route::middleware('auth:sanctum')->group(function () {

    Route::get('auth/me',     [AuthController::class, 'me']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // Shops
    Route::post('shops',               [ShopController::class, 'store']);
    Route::put('shops/{shop}',         [ShopController::class, 'update']);
    Route::delete('shops/{shop}',      [ShopController::class, 'destroy']);

    // Products
    Route::post('products',            [ProductController::class, 'store']);
    Route::put('products/{product}',   [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);

    // Reviews
    Route::post('products/{product}/reviews',    [ReviewController::class, 'store']);
    Route::delete('reviews/{review}',            [ReviewController::class, 'destroy']);

    // Vendor dashboard
    Route::prefix('vendor')->group(function () {
        Route::get('shops',    [VendorController::class, 'shops']);
        Route::get('products', [VendorController::class, 'products']);
        Route::get('stats',    [VendorController::class, 'stats']);
    });
});
