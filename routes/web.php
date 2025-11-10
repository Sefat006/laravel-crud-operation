<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
    syntax:
    Route::get/post/put('RouteName',[ControllerName::class,'CLASS_NAME_FROM_CONTROLLER'])->name('ROUTE_NAME');
    * but in route name, for store, update, destroy,,, it will use (TABLE_NAME.CLASS_NAME);
*/

// product route
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');

// civil product route
Route::get('projects',[ProjectController::class,'index'])->name('projects.index');
Route::get('projects/create',[ProjectController::class,'create'])->name('projects.create');
Route::post('projects',[ProjectController::class,'store'])->name('projects.store');
Route::get('projects/table',[ProjectController::class,'showAll'])->name('projects.showAll');
Route::get('projects/{project}/edit',[ProjectController::class,'edit'])->name('projects.edit');
Route::put('projects/{product}',[ProjectController::class,'update'])->name('projects.update');
