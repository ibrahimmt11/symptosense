<?php

use App\Http\Controllers\DashboardPController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/diagnosis', [DiagnosisController::class, 'diagnosis']);
Route::get('/dashboardP', [DashboardPController::class, 'dashboardP']);
