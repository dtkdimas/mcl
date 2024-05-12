<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminAccountController;
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
    Route::get('/', [WelcomeController::class, 'index']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/component/{year}/{category}/{id}/{component}', [WelcomeController::class, 'show'])->name('view.component');
    
    //reset password
    Route::get('/forgot-password',[PasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password',[PasswordController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}',[PasswordController::class, 'resetPasswordIndex'])->name('password.reset');
    Route::post('/reset-password',[PasswordController::class, 'resetPassword'])->name('password.update');
});

Route::group(['middleware' => 'admin'], function () {
    // Admin Dashboard
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //year
    Route::get('/admin/year', [YearController::class, 'adminIndex'])->name('admin.year.index');
    Route::post('/admin/year', [YearController::class, 'store'])->name('admin.year.store');
    Route::put('/admin/year/{id}', [YearController::class, 'update'])->name('admin.year.update');
    Route::delete('/admin/year/{id}', [YearController::class, 'destroy'])->name('admin.year.destroy');
    //category
    Route::get('/admin/category', [CategoryController::class, 'adminIndex'])->name('admin.category.index');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    //component
    Route::get('admin/component', [ComponentController::class, 'adminIndex'])->name('admin.component');
    Route::get('admin/component/create', [ComponentController::class, 'adminCreate'])->name('admin.component.create');
    Route::post('admin/component', [ComponentController::class, 'adminStore'])->name('admin.component.store');
    Route::get('admin/component/{id}/edit', [ComponentController::class, 'adminEdit'])->name('admin.component.edit');
    Route::put('admin/component/{id}', [ComponentController::class, 'adminUpdate'])->name('admin.component.update');
    Route::delete('admin/component/{id}', [ComponentController::class, 'destroy'])->name('admin.component.destroy');
    Route::get('admin/getCategory/{id}', [ComponentController::class, 'category'])->name('admin.category');
    //password
    Route::get('admin/changePassword',[ProfileController::class, 'adminIndex']);
    Route::post('admin/changePassword', [ProfileController::class, 'updatePassword'])->name('admin.settings.password');
    //logout
    Route::delete('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware' => 'super-admin'], function () {
    // Super Admin Dashboard
    Route::get('super-admin/dashboard', [SuperAdminController::class, 'index'])->name('super-admin.dashboard');
    //year
    Route::get('/super-admin/year', [YearController::class, 'superAdminIndex'])->name('super-admin.year.index');
    Route::post('/super-admin/year', [YearController::class, 'store'])->name('super-admin.year.store');
    Route::put('/super-admin/year/{id}', [YearController::class, 'update'])->name('super-admin.year.update');
    Route::delete('/super-admin/year/{id}', [YearController::class, 'destroy'])->name('super-admin.year.destroy');
    //category
    Route::get('/super-admin/category', [CategoryController::class, 'superAdminIndex'])->name('super-admin.category.index');
    Route::post('/super-admin/category', [CategoryController::class, 'store'])->name('super-admin.category.store');
    Route::get('/super-admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('super-admin.category.edit');
    Route::put('/super-admin/category/{id}', [CategoryController::class, 'update'])->name('super-admin.category.update');
    Route::delete('/super-admin/category/{id}', [CategoryController::class, 'destroy'])->name('super-admin.category.destroy');
    //component
    Route::get('super-admin/component', [ComponentController::class, 'superAdminIndex'])->name('super-admin.component');
    Route::get('super-admin/component/create', [ComponentController::class, 'superAdminCreate'])->name('super-admin.component.create');
    Route::post('super-admin/component', [ComponentController::class, 'superAdminStore'])->name('super-admin.component.store');
    Route::get('super-admin/component/{id}/edit', [ComponentController::class, 'superAdminEdit'])->name('super-admin.component.edit');
    Route::put('super-admin/component/{id}', [ComponentController::class, 'superAdminUpdate'])->name('super-admin.component.update');
    Route::delete('super-admin/component/{id}', [ComponentController::class, 'destroy'])->name('super-admin.component.destroy');
    Route::get('super-admin/getCategory/{id}', [ComponentController::class, 'category'])->name('super-admin.category');
    //adminAccount
    Route::get('super-admin/adminAccount', [AdminAccountController::class, 'index'])->name('super-admin.adminAccount');
    Route::post('super-admin/adminAccount', [AdminAccountController::class, 'store'])->name('super-admin.adminAccount.store');
    Route::put('super-admin/adminAccount/{id}', [AdminAccountController::class, 'update'])->name('super-admin.adminAccount.update');
    Route::delete('super-admin/adminAccount/{id}', [AdminAccountController::class, 'delete'])->name('super-admin.adminAccount.delete');
    //password
    Route::get('super-admin/changePassword',[ProfileController::class, 'superAdminIndex']);
    Route::post('super-admin/changePassword', [ProfileController::class, 'updatePassword'])->name('super-admin.settings.password');
    //logout
    Route::delete('super-admin/logout', [AuthController::class, 'logout'])->name('super-admin.logout');
});