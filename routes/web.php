<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; // Admin Auth
use App\Http\Controllers\DashboardController; // Admin Dashboard
use App\Http\Controllers\DashboardUserController; // User Dashboard
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegisterController; // User Register
use App\Http\Controllers\AuthUserController; // User Auth
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\User\BookingController as UserBookingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/portfolio', [HomeController::class, 'portfolio']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/team', [HomeController::class, 'team']);
Route::get('/testimoni', [HomeController::class, 'testimoni']);

/*
|--------------------------------------------------------------------------
| User Authentication & Dashboard
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    // Register & Login
    Route::get('/register', [RegisterController::class, 'register'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('user.register.store');

    Route::get('/login', [AuthUserController::class, 'userlogin'])->name('userlogin');
    Route::post('/login', [AuthUserController::class, 'authenticated']);

    // Protected user routes
    Route::middleware('auth:web')->group(function () {
        Route::get('/logout', [AuthUserController::class, 'logout'])->name('user.logout');
        Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');

        // Bookings
        Route::get('/bookings', [UserBookingController::class, 'index'])->name('user.bookings.index');
        Route::get('/bookings/create', [UserBookingController::class, 'create'])->name('user.bookings.create');
        Route::get('/bookings/{booking}/edit', [UserBookingController::class, 'edit'])->name('user.bookings.edit');
        Route::post('/bookings', [UserBookingController::class, 'store'])->name('user.bookings.store');
        Route::put('/bookings/{booking}', [UserBookingController::class, 'update'])->name('user.bookings.update');
        Route::delete('/bookings/{booking}', [UserBookingController::class, 'destroy'])->name('user.bookings.destroy');
        Route::get('/bookings/{booking}', [UserBookingController::class, 'show'])->name('user.bookings.show');

    }); 
});

/*
|--------------------------------------------------------------------------
| Admin Authentication & Dashboard
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticated']);

    // Protected admin routes
    Route::middleware(['auth:admin', 'admin'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Bookings

        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
        Route::post('/bookings/{booking}/confirm', [AdminBookingController::class, 'confirm'])->name('admin.bookings.confirm');
        Route::post('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('admin.bookings.cancel');
        Route::post('/bookings/{booking}/reject', [AdminBookingController::class, 'reject'])->name('admin.bookings.reject');
        Route::post('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancelreject'])->name('admin.bookings.cancelreject');
        Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
        Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');

        // Resource routes
        Route::resource('sliders', SliderController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('portfolios', PortfolioController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('teams', TeamController::class);

        // Contact & About
        Route::get('contact', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::put('contact/{id}', [ContactController::class, 'update'])->name('admin.contact.update');

        Route::get('about', [AboutController::class, 'index'])->name('admin.about.index');
        Route::put('about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    });
});
