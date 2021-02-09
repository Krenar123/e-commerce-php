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
Route::resource('notifications', 'App\Http\Controllers\NotificationController');

Route::get('/product/payment', [App\Http\Controllers\ProductController::class, 'payment'] )->name('products.payment');
Route::post('/product/paymentstore', [App\Http\Controllers\ProductController::class, 'paymentstore'] )->name('products.paymentstore');

Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login']);
Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/client', [App\Http\Controllers\AdminController::class, 'client'])->name('admin.client');
Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/clientedit/{id}', [App\Http\Controllers\AdminController::class, 'clientedit'])->name('admin.clientedit');
Route::get('/admin/marketedit/{id}', [App\Http\Controllers\AdminController::class, 'marketedit'])->name('admin.marketedit');
Route::put('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');

Route::put('/notification/update/{id}', [App\Http\Controllers\NotificationController::class, 'notificationupdate'])->name('notification.update');

Route::get('/terms', [App\Http\Controllers\HomeController::class, 'terms'] )->name('home.terms');
Route::get('/speci-info', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/add-to-cart', [App\Http\Controllers\ProductController::class, 'addtocart']);
Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('products.Cart');;
Route::delete('/deletecart/{id}', [App\Http\Controllers\ProductController::class, 'deletecart'])->name('products.deletecart');
Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
