<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PmController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    //     Route::resource('projects', ProjectController::class);


    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['auth', 'role:admin|pm']], function () {
    Route::resource('projects', ProjectController::class);
    Route::prefix('pm/{project_id}')->group(function () {
        Route::get('/task', [PmController::class, 'listTasks'])->name('pm.task');
        Route::get('/member', [PmController::class, 'listMembers'])->name('pm.member');
        Route::get('/chart', [PmController::class, 'viewChart'])->name('pm.chart');
    });
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('tasks', [TaskController::class, 'index']);
});

require __DIR__ . '/auth.php';
