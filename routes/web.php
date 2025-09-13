<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () 
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('movies')->middleware('auth')->group(function () 
{
    Route::get('/', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('/{id}/edit', [MovieController::class, 'edit'])->where('id', '[0-9]+')->name('movies.edit');
    Route::post('/', [MovieController::class, 'store'])->name('movies.store');
    Route::put('/{id}', [MovieController::class, 'update'])->where('id', '[0-9]+')->name('movies.update');
    Route::delete('/{id}', [MovieController::class, 'destroy'])->where('id', '[0-9]+')->name('movies.destroy');
    Route::post('/{id}/rating', [MovieController::class, 'rating'])->where('id', '[0-9]+')->name('movies.rating');
    Route::post('/{id}/comment', [CommentController::class, 'comment'])->where('id', '[0-9]+')->name('movies.comment');
    Route::delete('/{id}/comment/{commentId}', [CommentController::class, 'deleteComment'])->where(['id' => '[0-9]+', 'commentId' => '[0-9]+'])->name('movies.comments.destroy');
});

 Route::prefix('categories')->middleware('auth')->group(function () 
 {
    Route::get('/', [CategoryController::class, 'listCategories'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'createCategory'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/{id}', [CategoryController::class, 'deleteCategory'])->where('id', '[0-9]+')->name('categories.destroy');
});

require __DIR__.'/auth.php';
