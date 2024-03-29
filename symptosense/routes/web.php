<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'login']);
