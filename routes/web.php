<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [HomeController::class, 'index']);
        Route::resource('categories', CategoryController::class);
    });
});
