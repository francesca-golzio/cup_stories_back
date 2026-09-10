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
        Route::patch('issues/{issue}/status', [IssueController::class, 'updateStatus'])->name('issues.updateStatus');

        /* Tags */
        Route::resource('tags', TagController::class);

    });


require __DIR__.'/auth.php';
