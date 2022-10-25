<?php

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

Route::group(["middleware"=>"auth"],function (){

    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,"index"])->middleware("role:admin")->name('dashboard');

    Route::get("/categories",[\App\Http\Controllers\Admin\CategoryController::class,"categories"])->middleware("role:admin")->name("categories");
    Route::post("/create-category",[\App\Http\Controllers\Admin\CategoryController::class,"create"])->middleware("role:admin")->name("category.create");

    Route::get("/meals",[\App\Http\Controllers\Admin\MealController::class,"index"])->name("meals")->middleware("role:admin");

    Route::get("/orders",[\App\Http\Controllers\OrderController::class,"manage"])->name("orders.manage")->middleware("role:admin");

    Route::get("/my-orders",function(){
        return view("my-orders");
    })->middleware("role:delivery-worker");

    Route::post("/remove-notifications/{id}",[\App\Http\Controllers\NotificationController::class,"removeAll"]);

});
require __DIR__.'/auth.php';
