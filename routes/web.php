<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Stories\AuthorController;
use App\Http\Controllers\Admin\Stories\IssueController;
use App\Http\Controllers\Admin\Stories\StoryController;
use App\Http\Controllers\Admin\Stories\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/error-default', function () {
    return view('error-default');
})->name('error-default');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group( function () {
        
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        
        /* Stories */
        Route::resource('stories', StoryController::class);

        /* Authors */
        Route::resource('authors', AuthorController::class);

        /* Issues */
        Route::resource('issues', IssueController::class);

        /* Tags */
        Route::resource('tags', TagController::class);

    });


require __DIR__.'/auth.php';
