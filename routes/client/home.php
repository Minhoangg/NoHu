<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\WellcomeController;

Route::get('/', [WellcomeController::class, 'index']);
