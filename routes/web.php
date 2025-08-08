<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/team', [HomeController::class, 'team']);
Route::get('/testimoni', [HomeController::class, 'testimoni']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboarDcONTROLLER::class, 'index'])->middleware('auth');

Route::resource('sliders', SliderController::class)->middleware('auth');
Route::resource('services', ServiceController::class)->middleware('auth');
Route::resource('testimonials', TestimonialController::class)->middleware('auth');
Route::resource('portfolios', PortfolioController::class)->middleware('auth');
Route::resource('clients', ClientController::class)->middleware('auth');
Route::resource('teams', TeamController::class)->middleware('auth');

Route::get('/about', [AboutController::class, 'index'])->middleware('auth');
Route::post('/about', [AboutController::class, 'update'])->middleware('auth');
