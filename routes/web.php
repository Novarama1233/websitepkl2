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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/team', [HomeController::class, 'team']);
Route::get('/testimoni', [HomeController::class, 'testimoni']);

// untuk user
Route::get('/user/login', [AuthController::class, 'login'])->name('login');
Route::post('/user/login', [AuthController::class, 'authenticated']);

Route::prefix('/user')->middleware('auth')->group(function(){

Route::get('/logout', [AuthController::class, 'logout']);
});

// untuk admin
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'authenticated']);

Route::prefix('/admin')->middleware('auth')->group(function(){
Route::get('/logout', [AuthController::class, 'logout']);
    
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('sliders', SliderController::class);
Route::resource('services', ServiceController::class);
Route::resource('testimonials', TestimonialController::class);
Route::resource('portfolios', PortfolioController::class);
Route::resource('clients', ClientController::class);
Route::resource('teams', TeamController::class);

Route::get('contact', [ContactController::class, 'index']);
Route::put('contact/{id}', [ContactController::class, 'update']);

Route::get('about', [AboutController::class, 'index']);
Route::put('about/{id}', [AboutController::class, 'update']);

});