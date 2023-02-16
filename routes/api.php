<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
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

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::post('/products', 'store');
    Route::get('/products/{product}', 'show');
    Route::put('/products/{product}', 'update');
    Route::delete('/products/{product}', 'destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::get('/categories/{category}', 'show');
    Route::put('/categories/{category}', 'update');
    Route::delete('/categories/{category}', 'destroy');
    Route::get('/categories/showProducts/{category}', 'showProducts');
    Route::get('/categories/showProductsName/{category}', 'showProductsName');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/categories-api-resource', function () {
    return CategoryResource::collection(Category::all());
});

Route::get('/category/{id}', function ($id) {
    return new CategoryResource(Category::findOrFail($id));
});

Route::get('/product/{id}', function ($id) {
    return new ProductResource(Product::findOrFail($id));
});
