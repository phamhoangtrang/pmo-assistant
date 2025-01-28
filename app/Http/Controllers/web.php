<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PmController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //     Route::resource('projects', ProjectController::class);


    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('/tenants', TenantController::class);
    // Route để khôi phục tenant
    Route::post('tenants/{id}/restore', [TenantController::class, 'restore'])->name('tenants.restore');
    Route::resource('/plans', PlanController::class);
});

Route::group(['middleware' => ['auth', 'role:client']], function () {
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['auth', 'role:admin|client|pm']], function () {
    Route::resource('projects', ProjectController::class);
    Route::post('projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::prefix('pm/{project_id}')->group(function () {
        Route::get('/task', [PmController::class, 'listTasks'])->name('pm.task');
        Route::get('/member', [PmController::class, 'listMembers'])->name('pm.member');
        Route::get('/chart', [PmController::class, 'viewChart'])->name('pm.chart');
    });
});

Route::group(['middleware' => ['auth', 'role:pm|staff']], function () {
    Route::prefix('staff/{project_id}')->group(function () {
        Route::get('/task', [StaffController::class, 'listTasks'])->name('staff.task');
        Route::get('/member', [StaffController::class, 'listMembers'])->name('pm.member');
        Route::get('/chart', [StaffController::class, 'viewChart'])->name('pm.chart');
    });
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('tasks', [TaskController::class, 'index']);
});

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is working!";
    } catch (\Exception $e) {
        return "Database connection error: " . $e->getMessage();
    }
});

Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'jp', 'vi'])) {
        session(['lang' => $lang]);
        app()->setLocale($lang);
    }
    return redirect()->back();
});

require __DIR__ . '/auth.php';
