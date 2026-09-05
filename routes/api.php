<?php

use App\Http\Controllers\Api\IssueController;
use App\Http\Controllers\Api\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::get('stories', [StoryController::class, 'index']);
route::get('stories/{story:slug}', [StoryController::class, 'show']);

route::get('issues', [IssueController::class, 'index']);
route::get('issues/{issue:pubblication_number}', [IssueController::class, 'show']);


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */