<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;




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

// login
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'login'])->name('login');

//category
Route::get('/categories',[CategoryController::class,'index'])->name('category')->middleware('CheckLogin');
Route::get('/create', [CategoryController::class,'create'])->name('create');
Route::post('/store', [CategoryController::class,'store'])->name('store');
Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit');
Route::PUT('/update/{id}', [CategoryController::class,'update'])->name('update');
Route::DELETE('/destroy/{id}', [CategoryController::class,'destroy'])->name('destroy');

//product
Route::get('/products',[ProductController::class,'index'])->name('product');
Route::get('/create-pro', [ProductController::class,'create'])->name('create_pro');
Route::post('/store-pro', [ProductController::class,'store'])->name('store_pro');
Route::get('/edit-pro/{id}', [ProductController::class,'edit'])->name('edit_pro');
Route::PUT('/update-pro/{id}', [ProductController::class,'update'])->name('update_pro');
Route::DELETE('/destroy-pro/{id}', [ProductController::class,'destroy'])->name('destroy_pro'); 













