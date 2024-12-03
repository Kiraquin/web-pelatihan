<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;

// Rute utama
Route::get('/', [AuthController::class, 'dashboard'])->name('home');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Rute admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Dashboard Admin
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register']);
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::post('/users/{id}/role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/courses/create', [AdminController::class, 'showCreateCourseForm'])->name('admin.courses.create');
    Route::post('/courses/create', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::delete('/courses/{id}', [AdminController::class, 'deleteCourse'])->name('admin.courses.delete');
    Route::get('/access-course', [AdminController::class, 'showAccessForm'])->name('admin.access.course');
    Route::post('/access-course', [AdminController::class, 'giveAccess'])->name('admin.grant.access');
});

// Kursus (User-facing)
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{id}/purchase', [CourseController::class, 'purchase'])->name('courses.purchase');
Route::post('/admin/give-access', [AdminController::class, 'giveAccess'])->name('admin.give-access');
