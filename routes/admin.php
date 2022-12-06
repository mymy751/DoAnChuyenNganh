<?php

use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('productCreate');
    Route::get('product/update/{id}', [ProductController::class, 'productUpdate'])->name('productUpdate');
    Route::post('product/create', [ProductController::class, 'productCreatePost'])->name('productCreatePost');
    Route::post('product/update/{id}', [ProductController::class, 'productUpdatePost'])->name('productUpdatePost');
    Route::get('product/delete/{id}', [ProductController::class, 'productDelete'])->name('productDelete');

    Route::get('bill', [BillController::class, 'index'])->name('bill');


    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/create', [UserController::class, 'userCreate'])->name('userCreate');
    Route::get('user/update/{id}', [UserController::class, 'userUpdate'])->name('userUpdate');
    Route::post('user/create', [UserController::class, 'userCreatePost'])->name('userCreatePost');
    Route::post('user/update/{id}', [UserController::class, 'userUpdatePost'])->name('userUpdatePost');
    Route::get('user/delete/{id}', [UserController::class, 'userDelete'])->name('userDelete');

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category/create', [CategoryController::class, 'cateCreate'])->name('cateCreate');
    Route::post('category/create', [CategoryController::class, 'cateCreatePost'])->name('cateCreatePost');
    Route::get('category/update/{id}', [CategoryController::class, 'cateUpdate'])->name('cateUpdate');
    Route::post('category/update/{id}', [CategoryController::class, 'cateUpdatePost'])->name('cateUpdatePost');
    Route::get('cate/delete/{id}', [CategoryController::class, 'cateDelete'])->name('cateDelete');

    Route::get('producer', [ProducerController::class, 'index'])->name('producer');
    Route::get('producer/create', [ProducerController::class, 'producerCreate'])->name('producerCreate');
    Route::get('producer/update/{id}', [ProducerController::class, 'producerUpdate'])->name('producerUpdate');
    Route::post('producer/create', [ProducerController::class, 'producerCreatePost'])->name('producerCreatePost');
    Route::post('producer/update/{id}', [ProducerController::class, 'producerUpdatePost'])->name('producerUpdatePost');
    Route::get('producer/delete/{id}', [ProducerController::class, 'producerDelete'])->name('producerDelete');


});


//
