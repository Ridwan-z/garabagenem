<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('checkLogin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::post('/user/store', [UserController::class, 'store'])->name('userStore');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

    Route::get('/trash', [TrashController::class, 'index'])->name('trash');
    Route::post('/trash/store', [TrashController::class, 'store'])->name('trashStore');
    Route::post('/trash/update/{id}', [TrashController::class, 'update'])->name('trashUpdate');
    Route::delete('/trash/destroy/{id}', [TrashController::class, 'destroy'])->name('trashDestroy');
});

Route::middleware('isLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
