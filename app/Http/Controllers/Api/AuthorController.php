<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Issue;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
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
