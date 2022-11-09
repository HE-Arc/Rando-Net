<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\UserController;
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

//Route::get('/user', [UserController::class, 'index'])->name('user');
//Route::get('/hikes' , [HikeController::class, 'index'])->name('hike');
Route::get('/', [HikeController::class, 'index'])->name('hike');

Route::resource('hike', HikeController::class);
Route::resource('admin', AdminController::class);
Route::resource('user', UserController::class);
