<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\WellcomeController;
use App\Http\Middleware\CheckLoginClient;

    Route::get('/', [WellcomeController::class, 'index'])->name('wellcome');
    Route::get('/home', [WellcomeController::class, 'home'])->name('home');
    Route::get('/list-game/{id}', [WellcomeController::class, 'details'])->name('list-game');
    Route::get('get-score/{id}', [WellcomeController::class, 'getScore'])->name('get-score');
