<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RolesController;
use Illuminate\Support\Facades\Route;


// Route::group([
//     'middleware' => ['auth', 'verified'],
//     'prefix' => 'dashboard',
//     'as' => 'dashboard.',
// ], function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('/categories', CategoryController::class);

// });

Route::middleware(['auth', 'verified','auth.type:admin,super-admin'])->prefix('dashboard')->as('dashboard.')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories/trash',[CategoryController::class,'trash'])->name('categories.trash');
    Route::put('/categories/{id}/restore',[CategoryController::class,'restore'])->name('categories.restore');
    Route::delete('/categories/{id}/forceDelete',[CategoryController::class,'forceDelete'])->name('categories.forceDelete');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::get('profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('profile',[ProfileController::class,'update'])->name('profile.update'); // استخدمت باتش بدل بت عشان مش هبعت اي دي
    Route::resource('roles', RolesController::class);
});
