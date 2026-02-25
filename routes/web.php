<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PdsOcrController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/form', function () {
    return view('add_forms.Form8');
});
Route::get('/pds',          [PdsOcrController::class, 'index'])->name('pds.index');
    Route::post('/pds/extract', [PdsOcrController::class, 'extract'])->name('pds.extract');


// 2. Wrap all protected routes inside the 'auth' middleware group
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    // Add these two lines right here:
    Route::get('/employees/create/{step?}', [EmployeeController::class, 'create'])
        ->name('employees.create.step')
        ->where('step', '[1-8]');
    Route::post('/employees/create/{step}', [EmployeeController::class, 'storeStep'])
        ->name('employees.create.step.post');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';