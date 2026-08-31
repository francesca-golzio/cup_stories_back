<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;

use function Laravel\Prompts\error;

class StoryController extends Controller
{
    public function index() {
        
        $stories = Story::with('author', 'issue', 'tags')
            ->where('issue_id', '!=', 1)
            ->whereHas('issue', function ($query) {
                $query->where('status', 'published');
            })
            ->paginate(7);
            // $stories = Story::with('author', 'issue', 'tags')->get();
            
        return response()->json(
            [
                'success' => true,
                'data' => $stories,
            ]
        );
    }
                    
    public function show(Story $story) {
                        
        $storia = [];

        if ($story->issue_id != 1 && $story->issue->status == 'published') {
            $storia = Story::with('author', 'issue', 'tags')
                ->paginate(7);
        }
        
        if (empty($storia)) {
            return response()->json('Story not found');
            
        } else {
            return response()->json(
                [
                    'success' => true,
                    'data' => $storia,
                ]
            );
        }
    }
}
