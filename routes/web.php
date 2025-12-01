<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');

Route::get('/login', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    } else {
        return view('pages.auth.login');
    }
})->name('login');

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function() {
});
