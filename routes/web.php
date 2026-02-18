<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

// 1. Change the root route to redirect to the login page
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/form', function () {
    return view('add_forms.Form3');
});


// 2. Wrap all protected routes inside the 'auth' middleware group
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Route (Only define this ONCE)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // HR System Routes
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes (Login, Register, Logout logic lives here)
require __DIR__.'/auth.php';