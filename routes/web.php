<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, RoleController, HomeController};
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//role controller route
Route::get('/role',[RoleController::class,'addform']);
Route::post('/role/add',[RoleController::class,'storerole']);


//category controller route
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/store',[CategoryController::class,'store']);

Route::get('category/index',[CategoryController::class,'index'])->name('category.index') ;

Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('category/trashed',[CategoryController::class,'deleteCategory'])->name('category.trashed');

