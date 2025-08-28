<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/team', [HomeController::class, 'team']);
Route::get('/testimoni', [HomeController::class, 'testimoni']);

// untuk user
Route::get('/user/register', [RegisterController::class, 'register'])->name('register');
Route::post('/user/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/user/login', [AuthUserController::class, 'userlogin'])->name('userlogin');
Route::post('/user/login', [AuthUserController::class, 'authenticated']);


Route::prefix('/user')->middleware('auth:web')->group(function () {

Route::get('/logout', [AuthUserController::class, 'logout']);
Route::get('/dashboard', [DashboardUserController::class, 'index']);

});


// untuk admin
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'authenticated']);

Route::prefix('/admin')->middleware('auth:admin')->name('admin.')->group(function () {
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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