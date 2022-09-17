<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products'], function () {
    Route::get("/", [ProductController::class, "index"]);
    Route::get("/{id}", [ProductController::class, "show"]);
    Route::post("/", [ProductController::class, "store"]);
    Route::post("/update/{id}", [ProductController::class, "update"]);
    Route::get("/delete/{id}", [ProductController::class, "destroy"]);
});

Route::group(["prefix" => "transaction"], function () {
    Route::get("/", [TransactionController::class, "index"]);
    Route::post("/", [TransactionController::class, "store"]);
    Route::get("/{id}", [TransactionController::class, "show"]);
});

Route::group(["prefix" => "warehouse"], function () {
    Route::get("/", [WarehouseController::class, "index"]);
    Route::post("/", [WarehouseController::class, "store"]);
    Route::get("/{id}", [WarehouseController::class, "show"]);
    Route::post("/update/{id}", [WarehouseController::class, "update"]);
    Route::get("/delete/{id}", [WarehouseController::class, "destroy"]);
});

Route::group(['prefix' => 'category'], function () {
    Route::get("/", [CategoryController::class, "index"]);
    Route::get("/{id}", [CategoryController::class, "show"]);
    Route::post("/", [CategoryController::class, "store"]);
    Route::post("/update/{id}", [CategoryController::class, "update"]);
    Route::get("/delete/{id}", [CategoryController::class, "destroy"]);
});

// Route::get('category-tree-view',['uses'=>'CategoryController@manageCategory']);
// Route::post('add-category',['as'=>'add.category','uses'=>'CategoryController@addCategory']);
