<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
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
Route::get('categories',            [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);

Route::get('shops',        [ShopController::class, 'index']);
Route::get('shops/{shop}', [ShopController::class, 'show']);

Route::get('products',           [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('products/{product}/reviews', [ReviewController::class, 'index']);

// ── CONNECT — Routes publiques
Route::get('members/map',       [ProfileController::class, 'map']);
Route::get('profile/{userId}',  [ProfileController::class, 'show']);
Route::get('groups',            [GroupController::class,   'index']);
Route::get('groups/{slug}',     [GroupController::class,   'show']);
Route::get('groups/{id}/posts', [GroupController::class,   'posts']);
Route::get('events',            [EventController::class,   'index']);
Route::get('events/{id}',       [EventController::class,   'show']);

// ── Authentifié (rôles désactivés pendant le développement)
Route::middleware('auth:sanctum')->group(function () {

    Route::get('auth/me',      [AuthController::class, 'me']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // Shops
    Route::post('shops',          [ShopController::class, 'store']);
    Route::put('shops/{shop}',    [ShopController::class, 'update']);
    Route::delete('shops/{shop}', [ShopController::class, 'destroy']);

    // Products
    Route::post('products',             [ProductController::class, 'store']);
    Route::put('products/{product}',    [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);

    // Reviews
    Route::post('products/{product}/reviews', [ReviewController::class, 'store']);
    Route::delete('reviews/{review}',         [ReviewController::class, 'destroy']);

    // ── CONNECT — Routes protégées

    // Profil
    Route::put('profile',           [ProfileController::class,      'update']);
    Route::get('members/nearby',    [ProfileController::class,      'nearby']);
    Route::get('members/search',    [ProfileController::class,      'search']);

    // Fil d'actualité & Posts
    Route::get('posts',                [PostController::class, 'index']);
    Route::post('posts',               [PostController::class, 'store']);
    Route::get('posts/{id}',           [PostController::class, 'show']);
    Route::put('posts/{id}',           [PostController::class, 'update']);
    Route::delete('posts/{id}',        [PostController::class, 'destroy']);
    Route::post('posts/{id}/like',     [PostController::class, 'like']);

    // Commentaires
    Route::post('posts/{id}/comment',  [CommentController::class, 'store']);
    Route::delete('comments/{id}',     [CommentController::class, 'destroy']);

    // Groupes
    Route::post('groups',              [GroupController::class, 'store']);
    Route::post('groups/{id}/join',    [GroupController::class, 'join']);
    Route::delete('groups/{id}/leave', [GroupController::class, 'leave']);

    // Follows
    Route::post('follow/{userId}',     [FollowController::class, 'follow']);
    Route::delete('follow/{userId}',   [FollowController::class, 'unfollow']);
    Route::get('followers',            [FollowController::class, 'followers']);
    Route::get('following',            [FollowController::class, 'following']);

    // Notifications
    Route::get('notifications',              [NotificationController::class, 'index']);
    Route::get('notifications/count',        [NotificationController::class, 'unreadCount']);
    Route::put('notifications/read-all',     [NotificationController::class, 'markAllRead']);
    Route::put('notifications/{id}/read',    [NotificationController::class, 'markRead']);

    // Événements
    Route::post('events',              [EventController::class, 'store']);
    Route::post('events/{id}/join',    [EventController::class, 'join']);

    // Vendor dashboard
    Route::prefix('vendor')->group(function () {
        Route::get('shops',    [VendorController::class, 'shops']);
        Route::get('products', [VendorController::class, 'products']);
        Route::get('stats',    [VendorController::class, 'stats']);
    });

    // Admin
    Route::prefix('admin')->group(function () {
        Route::patch('shops/{shop}/verify',  [ShopController::class, 'verify']);
        Route::get('users',                  [AdminController::class, 'users']);
        Route::patch('users/{user}/role',    [AdminController::class, 'assignRole']);
    });
});
