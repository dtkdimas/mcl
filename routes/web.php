<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::resource('/', WelcomeController::class);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/year',[YearController::class, 'index']);
    Route::resource('/year', YearController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/component', ComponentController::class);
    Route::get('/get-categories', [ComponentController::class, 'getCategories'])->name('get.categories');
});