<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', IndexController::class);


Route::get('/catalog/index', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/category/{slug}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/catalog/product/{slug}', [CatalogController::class, 'product'])->name('catalog.product');
Route::get('/catalog/search', [CatalogController::class, 'search'])->name('catalog.search');

Route::post('/favorite/add/{id}', [FavoriteController::class, 'add'])->name('favorite.add');
Route::post('/favorite/delete/{id}', [FavoriteController::class, 'delete'])->name('favorite.delete');

Route::post('/review/add/{id}', [ReviewController::class, 'add'])->name('review.add');
