<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignCategoryController;


Auth::routes();


Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('category/add',[CategoryController::class,'create']);
    Route::get('category/view',[CategoryController::class,'index']);
    Route::post('category/add',[CategoryController::class,'store']);
    Route::get('category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('category/edit/{id}',[CategoryController::class,'edit']);
    Route::put('category/update/{id}',[CategoryController::class,'update']);


    Route::get('Designcategory/add',[DesignCategoryController::class,'create']);
    Route::get('Designcategory/view',[DesignCategoryController::class,'index']);
    Route::post('Designcategory/add',[DesignCategoryController::class,'store']);
    Route::get('Designcategory/delete/{id}',[DesignCategoryController::class,'delete']);
    Route::get('Designcategory/edit/{id}',[DesignCategoryController::class,'edit']);
    Route::put('Designcategory/update/{id}',[DesignCategoryController::class,'update']);


    Route::controller(ProductController::class)->group(function(){
        Route::get('product/view','index');
        Route::get('product/add','create');
        Route::post('product/add','store');
        Route::get('product/delete/{id}','delete');
        Route::get('product/edit/{id}','edit');
        Route::put('product/update/{id}','update');
        Route::get('product/product-image/delete/{id}','destroy');

    });

    Route::controller(DesignController::class)->group(function(){
        Route::get('Designs/view','index');
        Route::get('Designs/add','create');
        Route::post('Designs/add','store');
        Route::get('Designs/delete/{id}','delete');
        Route::get('Designs/edit/{id}','edit');
        Route::put('Designs/update/{id}','update');
        Route::get('Designs/designimages/delete/{id}','destroy');

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


