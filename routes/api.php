<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/register", [\App\Http\Controllers\AuthController::class, 'register']);
Route::post("/logout", [\App\Http\Controllers\AuthController::class, 'logout']);
Route::post("/login", [\App\Http\Controllers\AuthController::class, 'login']);

Route::group(["middleware"=>"auth:sanctum"], function (){
    Route::get("/categories",[\App\Http\Controllers\CategoryController::class,"categories"]);
    Route::get("/meals",[\App\Http\Controllers\MealController::class,"meals"]);

    Route::get("/user-cart/{id}",[\App\Http\Controllers\AuthController::class, "getUserCart"]);
    Route::post("/add-to-cart",[\App\Http\Controllers\AuthController::class, "addToCart"]);
    Route::post("/remove-from-cart/{item_id}",[\App\Http\Controllers\AuthController::class, "removeItem"]);

    Route::get("/my-orders/{id}",[\App\Http\Controllers\AuthController::class, "getMyOrders"]);
    Route::post("/confirm-order",[\App\Http\Controllers\AuthController::class,"confirmOrder"]);

    Route::get("/favorites/{user_id}",[\App\Http\Controllers\FavoriteController::class,"getFavorites"]);
    Route::post("/add-to-favorites",[\App\Http\Controllers\FavoriteController::class, "addToFavorites"]);

    Route::get("/posts",[\App\Http\Controllers\PostController::class, "getPosts"]);
    Route::post("/like-post",[\App\Http\Controllers\PostController::class, "likePost"]);

    Route::get("/notifications/{id}",[\App\Http\Controllers\NotificationController::class,"userNotifications"]);

    Route::get("/restaurants",[\App\Http\Controllers\RestaurantController::class,"getAll"]);


});
