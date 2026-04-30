<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified', \App\Http\Middleware\PreventBackHistory::class])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ✅ Export MUST be before /employees/{id}
    Route::get('/employees/export', [\App\Http\Controllers\EmployeeExportController::class, 'export'])
        ->name('employees.export');
        Route::get('/employees/export/preview', [\App\Http\Controllers\EmployeeExportController::class, 'preview'])
    ->name('employees.export.preview');

    Route::get('/employees/export/download-excel', [\App\Http\Controllers\EmployeeExportController::class, 'downloadExcel'])
    ->name('employees.export.download-excel');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::get('/employees/create/cancel', [EmployeeController::class, 'cancelCreate'])
        ->name('employees.create.cancel');
    Route::get('/employees/create/{step?}', [EmployeeController::class, 'create'])
        ->name('employees.create.step')
        ->where('step', '[1-8]');
    Route::post('/employees/create/{step}', [EmployeeController::class, 'storeStep'])
        ->name('employees.create.step.post');

    Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');
    Route::post('/employees/import/preview', [EmployeeController::class, 'importPreview'])
        ->name('employees.import.preview');

    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{id}/edit/{step?}', [EmployeeController::class, 'editStep'])
        ->name('employees.edit.step')
        ->where('step', '[1-8]');
    Route::post('/employees/{id}/edit/{step}', [EmployeeController::class, 'editStepPost'])
        ->name('employees.edit.step.post');

    Route::patch('employees/{id}/resign', [EmployeeController::class, 'resign'])->name('employees.resign');
    Route::patch('employees/{id}/reinstate', [EmployeeController::class, 'reinstate'])->name('employees.reinstate');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::put('/departments/{department}', [DepartmentController::class, 'update']);
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

}); // ✅ NOW closes here — wraps ALL routes

require __DIR__.'/auth.php';