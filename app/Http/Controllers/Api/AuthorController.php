<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    
    public function index() {
        
/*         $authors = Author::with(['stories' => function ($query) {
            $query->where('issue_id', '!=', 1);
        }])->get();

        $authors->filter(function ($author) {
            return !$author->stories->isNotEmpty();
        })->values(); */

        $authors = Author::whereHas('stories', function ($query) {
            $query->where('issue_id', '!=', 1);
        })->get();

        return response()->json([
            'success' => true,
            'results' => $authors
        ]);
    }

    public function show(Author $author) {
               
                
        $author->load(['stories' => function ($query) {
            $query->where('issue_id', '!=', 1)->with(['tags', 'issue']);
        }]);

        if ($author->stories->isEmpty()) {

            return response()->json([
                'success' => false,
                'message' => 'Author not found',
            ], 404);            
        }

        return response()->json([
            'success' => true,
            'results' => $author,
        ]);
    }
}
