<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\system\userController;

Route::prefix('/user')->group(function(){
    Route::get('/getAll', [userController::class, 'getAll'])->name('users');
});
