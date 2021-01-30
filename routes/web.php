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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('orders', 'App\Http\Controllers\OrderController');

Route::post('/add-to-cart', [App\Http\Controllers\ProductController::class, 'addtocart']);
Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('products.Cart');;
Route::delete('/deletecart/{id}', [App\Http\Controllers\ProductController::class, 'deletecart'])->name('products.deletecart');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
