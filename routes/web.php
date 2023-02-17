<?php

use App\Http\Admin;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('welcome');
});
/* 
Route::get('/category', [CategoryController::class, 'categories'])->name('category.index');
Route::get('/category-relation/{category}', [CategoryController::class, 'relationProducts'])->name('category.relation');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->middleware('admin')->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->middleware('admin')->name('product.store'); */

/* Route::get('/product/edit', [ProductController::class, 'edit'])->middleware('admin')->name('product.edit');
Route::post('/product', [ProductController::class, 'update'])->middleware('admin')->name('product.update'); */

/* Route::get('product/{product}/edit', [ProductController::class, 'edit'])->middleware('admin')->name('product.edit');
Route::put('product/{product}', [ProductController::class, 'update'])->middleware('admin')->name('product.update');

Route::get('product/{product}', [ProductController::class, 'destroy'])->middleware('admin')->name('product.destroy');
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard'); 
