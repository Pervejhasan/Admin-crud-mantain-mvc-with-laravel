<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/product/detail',[HomeController::class,'detail'])->name('product.detail');
Route::get('/detail/{id}',[HomeController::class,'detail2'])->name('detail');
Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'] )->name('dashboard');

    Route::get('/product/add',[ProductController::class,'add'] )->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'] )->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'] )->name('product.manage');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'] )->name('edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'] )->name('update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'] )->name('delete');
});
