<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
//Route::get('/', [HikeController::class, 'index'])->name('hike');

Route::resource('hikes', HikeController::class);
Route::resource('admins', AdminController::class);
//Route::resource('users', UserController::class); //TODO when Dorian could think straight for once in his life
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/validate-signin', [AuthController::class, 'validateSignin'])->name('validate_signin');
