<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\subcategoryController;
use App\Http\Controllers\frontend\frontendController;
use App\Models\subcategory;

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
Route::get('/', [frontendController::class, 'index'])->name('frontend.home');
   

Auth::routes();

Route::get('/deshboard', [backendController::class, 'index'])->name('backend.home');

/*Category Route*/


Route::prefix('/category')->name('category.')->group(function () {
   
    //Category Route//

Route::get('/add', [CategoryController::class, 'addcategory'])->name('add');
Route::post('/store', [CategoryController::class, 'storecategory'])->name('store');
Route::get('/edite/{category:slug}', [CategoryController::class, 'editcategory'])->name('edit');
Route::put('/update/{category:slug}', [CategoryController::class, 'updatecategory'])->name('update');
Route::delete('/delete/{category:slug}', [CategoryController::class, 'deletecategory'])->name('delete');

    //subCategory Route//

Route::prefix('/subcategory')->name('sub.')->group(function () {

    Route::get('/add',[subcategoryController::class,'add_sub_category'])->name('add');
    Route::post('/store',[subcategoryController::class,'store_sub_category'])->name('store');
    Route::get('/edit/{categories:slug}',[subcategoryController::class,'edit_sub_category'])->name('edit');
    Route::put('/update/{categories:slug}', [subcategoryController::class, 'update_sub_category'])->name('update');
    Route::delete('/delete/{categories:slug}',[subcategoryController::class,'delete_sub_category'])->name('delete');


});


});



Route::prefix('/post')->name('post.')->group(function(){

        Route::get('/add',[PostController::class,'addpost'])->name('add');
});


