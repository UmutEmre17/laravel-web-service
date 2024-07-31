<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::post('/edit-product/{id}', [ProductController::class, 'updateProduct']);  
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
    Route::post('/create-category', [CategoryController::class, 'addCategory']);  
    Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory']); 
});
Route::get('/get-categories', [CategoryController::class, 'getCategories']);
Route::get('/get-category/{id}', [CategoryController::class, 'getCategory']);
Route::get('/get-products', [ProductController::class, 'getProducts']);
Route::get('/get-product/{id}', [ProductController::class, 'getProduct']);
Route::post('/login', [AuthController::class, 'login']);
