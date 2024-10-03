<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');




// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('account', [AccountController::class, 'show'])->name('account.show')->middleware('auth');
// Route::put('account', [AccountController::class, 'update'])->name('account.update')->middleware('auth');




// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::resource('projects', ProjectController::class);
//     Route::resource('blogs', BlogController::class);
//     Route::resource('services', ServiceController::class);
//     Route::resource('partners', PartnerController::class);
//     Route::resource('settings', SettingController::class);
// });



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('account', [AccountController::class, 'show'])->name('account.show')->middleware('auth');
Route::put('account', [AccountController::class, 'update'])->name('account.update')->middleware('auth');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('permission:access_admin_dashboard');
    Route::resource('roles', RoleController::class);    
    Route::resource('users', ManageUsersController::class);    
    Route::resource('projects', ProjectController::class)->middleware('permission:manage_projects');
    Route::resource('blogs', BlogController::class)->middleware('permission:manage_blogs');
    Route::resource('services', ServiceController::class)->middleware('permission:manage_services');
    Route::resource('partners', PartnerController::class)->middleware('permission:manage_partners');
    Route::resource('settings', SettingController::class)->middleware('permission:manage_settings');
});
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::resource('projects', ProjectController::class)->middleware('permission:manage_projects');
    Route::resource('blogs', BlogController::class)->middleware('permission:manage_blogs');
    Route::resource('services', ServiceController::class)->middleware('permission:manage_services');
    Route::resource('partners', PartnerController::class)->middleware('permission:manage_partners');
    Route::resource('settings', SettingController::class)->middleware('permission:manage_settings');
});

