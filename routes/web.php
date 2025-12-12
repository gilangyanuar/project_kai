<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// DASHBOARD
Route::get('/dashboard', function () {
    if (!session()->has('logged_in')) {
        return redirect()->route('login.form');
    }
    return view('dashboard.index');
})->name('dashboard');

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// USER EDIT & UPDATE
Route::get('/dashboard/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/dashboard/user/update/{id}', [UserController::class, 'update'])->name('user.update');
