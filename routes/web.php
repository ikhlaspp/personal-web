<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () { // Remove or comment out this line
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact page route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Web Projects CRUD
    Route::get('/web-projects', [AdminController::class, 'webProjects'])->name('admin.web-projects');
    Route::get('/web-projects/create', [AdminController::class, 'createWebProject'])->name('admin.web-projects.create');
    Route::post('/web-projects', [AdminController::class, 'storeWebProject'])->name('admin.web-projects.store');
    Route::get('/web-projects/{id}/edit', [AdminController::class, 'editWebProject'])->name('admin.web-projects.edit');
    Route::put('/web-projects/{id}', [AdminController::class, 'updateWebProject'])->name('admin.web-projects.update');
    Route::delete('/web-projects/{id}', [AdminController::class, 'destroyWebProject'])->name('admin.web-projects.destroy');
    // Designs CRUD
    Route::get('/designs', [AdminController::class, 'designs'])->name('admin.designs');
    Route::get('/designs/create', [AdminController::class, 'createDesign'])->name('admin.designs.create');
    Route::post('/designs', [AdminController::class, 'storeDesign'])->name('admin.designs.store');
    Route::get('/designs/{id}/edit', [AdminController::class, 'editDesign'])->name('admin.designs.edit');
    Route::put('/designs/{id}', [AdminController::class, 'updateDesign'])->name('admin.designs.update');
    Route::delete('/designs/{id}', [AdminController::class, 'destroyDesign'])->name('admin.designs.destroy');
    // Videos CRUD
    Route::get('/videos', [AdminController::class, 'videos'])->name('admin.videos');
    Route::get('/videos/create', [AdminController::class, 'createVideo'])->name('admin.videos.create');
    Route::post('/videos', [AdminController::class, 'storeVideo'])->name('admin.videos.store');
    Route::get('/videos/{id}/edit', [AdminController::class, 'editVideo'])->name('admin.videos.edit');
    Route::put('/videos/{id}', [AdminController::class, 'updateVideo'])->name('admin.videos.update');
    Route::delete('/videos/{id}', [AdminController::class, 'destroyVideo'])->name('admin.videos.destroy');
});
