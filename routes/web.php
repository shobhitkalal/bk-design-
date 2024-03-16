<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;


Auth::routes();


Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('category/add',[CategoryController::class,'create']);
    Route::get('category/view',[CategoryController::class,'index']);
    Route::post('category/add',[CategoryController::class,'store']);
    Route::get('category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('category/edit/{id}',[CategoryController::class,'edit']);
    Route::put('category/update/{id}',[CategoryController::class,'update']);

    Route::controller(ProductController::class)->group(function(){
        Route::get('product/view','index');
        Route::get('product/add','create');
        Route::post('product/add','store');
        Route::get('product/delete/{id}','delete');
        Route::get('product/edit/{id}','edit');
        Route::put('product/update/{id}','update');
        Route::get('product/product-image/delete/{id}','destroy');

    });
    Route::controller(SliderController::class)->group(function(){
        Route::get('slider/view','index');
        Route::get('slider/add','create');
        Route::post('slider/add','store');
    });
});
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
    Route::get('/collections','collection');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


