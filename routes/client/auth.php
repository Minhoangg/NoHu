<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'loginHandle'])->name('login-submit');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'registerHandle'])->name('register-submit');
Route::get('/logout', function () {
    Auth::logout();
    session()->forget('user');
    return redirect()->route('client.home');
})->name('logout');
