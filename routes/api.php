<?php

use App\Http\Controllers\Api\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::get('stories', [StoryController::class, 'index']);

route::get('stories/{story}', [StoryController::class, 'show']);


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */