<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index() {
        
        $stories = Story::with('author', 'issue', 'tags')->paginate(7);
        // $stories = Story::with('author', 'issue', 'tags')->get();
        
        return response()->json(
            [
                'success' => true,
                'data' => $stories,
            ]
        );
    }

    public function show(Story $story) {
        
        // $story->load(['author', 'issue', 'tags']);
        
        return response()->json(
            [
                'success' => true,
                'data' => $story,
            ]
        );
    }
}
