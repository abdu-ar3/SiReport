<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('staff')->name('staff.')->group(function(){
        Route::resource('plan', PlanController::class)->middleware('role:staff');
        Route::get('/pdf', [PlanController::class, 'pdf'])->middleware('role:staff')->name('pdf');
        Route::post('/todos/{todo}/complete', [PlanController::class, 'complete'])->name('todos.complete');
        Route::post('/todos/report', [PlanController::class, 'generateReport'])->name('todos.generateReport');
    });
});

require __DIR__.'/auth.php';
