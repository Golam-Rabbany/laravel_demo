<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, RoleController, HomeController,ProductController};
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

//author route
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//role category route
Route::prefix('role')->group(function(){
    Route::get('/',[RoleController::class,'addform']);
    Route::post('/add',[RoleController::class,'storerole']);
});


//category controller route group
Route::prefix('category')->group(function(){
    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[CategoryController::class,'store']);
    Route::get('/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('/trashed',[CategoryController::class,'deleteCategory'])->name('category.trashed');
    Route::get('/restore/{id}',[CategoryController::class,'restoreCategory'])->name('category.restore');
    Route::get('/vanish/{id}',[CategoryController::class,'vanishCategory'])->name('category.vanish');
    Route::get('/edit/{id}',[CategoryController::class,'edit']);
    Route::post('/update',[CategoryController::class,'update'])->name('category.update');
});

//subcategory controller route
Route::get('subcategory/create',[CategoryController::class,'subcategory'])->name('subcategory.create');

//product category route
Route::prefix('product')->group(function(){
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/index',[ProductController::class,'index'])->name('product.index');
    Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/update',[ProductController::class,'update'])->name('product.update');

});