<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');


// Admin
Route::get('/admin/products',      [AdminProductController::class, 'index'])->name('admin.products');

// Criar
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.product.store');

// Editar
Route::get('/admin/products/{products}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/products/{products}', [AdminProductController::class, 'update'])->name('admin.product.update');

// Deletar
Route::get('/admin/products/{products}/delete', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');

Route::get('/admin/products/{products}/delete-image', [AdminProductController::class, 'destroyImage'])->name('admin.product.destroyImage');




/*Route::get('/', function () {
    return view('welcome');
});
*/