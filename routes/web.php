<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\frontend\frontendController;

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
