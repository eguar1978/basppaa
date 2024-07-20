<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FlavorController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::post('/roles/assign', [RoleController::class, 'assignRole'])->name('roles.assign');
    Route::post('/roles/revoke', [RoleController::class, 'revokeRole'])->name('roles.revoke');
    Route::post('/roles/give-permission', [RoleController::class, 'givePermission'])->name('roles.give-permission');
    Route::post('/roles/revoke-permission', [RoleController::class, 'revokePermission'])->name('roles.revoke-permission');

    Route::middleware(['can:view stock'])->group(function () {
        Route::get('/flavors', [FlavorController::class, 'index'])->name('flavors.index');
        Route::get('/flavors/history', [FlavorController::class, 'history'])->name('flavors.history');
        Route::get('/flavors/{flavor}/edit', [FlavorController::class, 'edit'])->name('flavors.edit');
        Route::put('/flavors/{flavor}', [FlavorController::class, 'update'])->name('flavors.update');
    });

    Route::middleware(['can:add flavor'])->group(function () {
        Route::get('/flavors/create', [FlavorController::class, 'create'])->name('flavors.create');
        Route::post('/flavors', [FlavorController::class, 'store'])->name('flavors.store');
    });

    Route::middleware(['can:add stock'])->group(function () {
        Route::get('/flavors/{flavor}/add-stock', [FlavorController::class, 'addStockForm'])->name('flavors.addStockForm');
        Route::post('/flavors/{flavor}/add-stock', [FlavorController::class, 'addStock'])->name('flavors.addStock');
    });

    Route::middleware(['can:remove stock'])->group(function () {
        Route::get('/flavors/{flavor}/remove-stock', [FlavorController::class, 'removeStockForm'])->name('flavors.removeStockForm');
        Route::post('/flavors/{flavor}/remove-stock', [FlavorController::class, 'removeStock'])->name('flavors.removeStock');
    });
});

require __DIR__.'/auth.php';
