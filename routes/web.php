<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Admin\AuthentificationController;
use App\Http\Controllers\Admin\LivreController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/devenir-partenaire-de-librio', [LandingPageController::class, 'inscription'])->name('landing.inscription');
Route::post('/devenir-partenaire-de-librio-post', [LandingPageController::class, 'new_inscription_form_landing_page'])->name('landing.new_inscription');
Route::get('/condition-utilisation-librio', [LandingPageController::class, 'condition'])->name('landing.condition');
Route::get('/politique-confidentialite-librio', [LandingPageController::class, 'politique'])->name('landing.politique');

// Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentification
    Route::get('login', [AuthentificationController::class, 'loginForm'])->name('login');
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Tableau de bord
    // Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('livres', LivreController::class);
    // });
});