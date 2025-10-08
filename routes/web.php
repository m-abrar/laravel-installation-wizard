<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController; 

// Optional: You can keep this for default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Installer Routes
Route::prefix('install')->name('install.')->group(function () {
    Route::get('/', [InstallController::class, 'welcome'])->name('welcome');
    Route::get('/requirements', [InstallController::class, 'requirements'])->name('requirements');
    Route::get('/database', [InstallController::class, 'database'])->name('database');
    Route::post('/database', [InstallController::class, 'saveDatabase'])->name('saveDatabase');
    Route::get('/packages/start', [InstallController::class, 'startPackages'])->name('packages.start');
    Route::get('/packages', [InstallController::class, 'installPackages'])->name('packages');

    Route::get('/migration', [InstallController::class, 'migration'])->name('migration');
    Route::get('/admin', [InstallController::class, 'admin'])->name('admin');
    Route::post('/admin', [InstallController::class, 'createAdmin'])->name('createAdmin');
    Route::get('/final', [InstallController::class, 'final'])->name('final');
});
