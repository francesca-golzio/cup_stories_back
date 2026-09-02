<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(Request $request) {
        
       $query = Story::with('author', 'issue', 'tags')
            ->where('issue_id', '!=', 1)
            ->whereHas('issue', function ($q) {
                $q->where('status', 'published');
            });

        if ($request->boolean('paginate', true)) {   /* ?paginate=true or nothing */
            $perPage = $request->integer('perPage', 6);
            $stories = $query->paginate($perPage);
        } else {
            $stories = $query->get();                /* ?paginate=false */
        }
            
        return response()->json(
            [
                'success' => true,
                'results' => $stories,
            ]
        );
    }
                    
    public function show(Story $story) {
                        
        if ($story->issue_id != 1 && $story->issue->status == 'published') {
            $story->load('author', 'issue', 'tags');
            $res = [
                'success' => true,
                'data' => $story,
            ];

        } else {
            $res = [
                'success' => false,
                'message' => 'Story not found',
            ];
        }
            
        return response()->json($res);
    }
}
