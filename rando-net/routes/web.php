<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;
use App\Http\Middleware\CheckVisitor;
use Illuminate\Support\Facades\Auth;
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



//Route::get('/user', [UserController::class, 'index'])->name('user');
//Route::get('/hikes' , [HikeController::class, 'index'])->name('hike');
//Route::get('/', [HikeController::class, 'index'])->name('hike');

//ADMIN
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/hikes/user_hikes', [HikeController::class, 'userHikes'])->name('hikes.user_hikes');
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('hikes', HikeController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//USER
Route::middleware([CheckUser::class])->group(function () {
    Route::get('/hikes/user_hikes', [HikeController::class, 'userHikes'])->name('hikes.user_hikes');
    Route::resource('hikes', HikeController::class);
    Route::resource('users', UserController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Non connected user
Route::middleware([CheckVisitor::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/validate-signin', [AuthController::class, 'validateSignin'])->name('validate_signin');
});

//All
Route::get('/hikes', [HikeController::class, 'index'])->name('hikes.index');
Route::get('/hikes/{hike}', [HikeController::class, 'show'])->name('hikes.show');
Route::get('/', function () {
    return redirect()
        ->route("hikes.index");
});
//Route::resource('tags', TagController::class);
Route::get('/tags/display', [TagController::class, 'displayHikes'])->name('tags.display');
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');


//Route::get('/show-tag', [TagController::class, 'index']);
//Route::post('/create-tag', [TagController::class, 'store']);
