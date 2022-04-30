<?php

use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserLoginController;

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
/*
// Admin 

Route::get('/', [AdminLoginController::class,'index'])->name('login');
Route::post('/',[AdminLoginController::class,'login'])->name('login')->middleware([CheckLogin::class]);

Route::get('/contact',[AdminContactController::class,'index'])->name('contact');
Route::get('/contact-details/{id}',[AdminContactController::class,'details'])->name('contact.details');
Route::get('/orders',[AdminContactController::class,'orders'])->name('orders');
Route::get('/view/{id}',[AdminContactController::class,'view'])->name('view');
Route::get('/delete/{id}', [AdminContactController::class,'delete'])->name('delete');



//category
Route::get('/categories',[CategoryController::class,'index'])->name('category')->middleware('CheckLogin');
Route::get('/create', [CategoryController::class,'create'])->name('create');
Route::post('/store', [CategoryController::class,'store'])->name('store');
Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit');
Route::PUT('/update/{id}', [CategoryController::class,'update'])->name('update');
Route::DELETE('/destroy/{id}', [CategoryController::class,'destroy'])->name('destroy');

//product
Route::get('/products',[ProductController::class,'index'])->name('product');
Route::get('/create-product', [ProductController::class,'create'])->name('create.product');
Route::post('/store-product', [ProductController::class,'store'])->name('store.product');
Route::get('/edit-product/{id}', [ProductController::class,'edit'])->name('edit.product');
Route::PUT('/update-product/{id}', [ProductController::class,'update'])->name('update.product');
Route::get('/destroy-product/{id}', [ProductController::class,'destroy'])->name('destroy.product'); 
*/

//user

Route::get('/',[UserLoginController::class,'index'])->name('view_login');
Route::post('/',[UserLoginController::class,'login'])->name('login');
Route::get('/register',function () {return view('pages.register');})->name('register');
Route::post('/register',[UserLoginController::class,'register'])->name('register');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/details/{id}',[HomeController::class,'details'])->name('details');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.store');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('remove-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('/checkout/{id}', [CartController::class, 'checkout'])->name('checkout');
//Route::get('/orders', [CartController::class, 'sendOrder'])->name('orders');
Route::get('/send/{id}', [CartController::class, 'sendOrder'])->name('send');

Route::get('/see-all/{id}', [HomeController::class, 'seeAll'])->name('all.product');
Route::get('/see-all', [HomeController::class, 'showAll'])->name('all.products');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');










