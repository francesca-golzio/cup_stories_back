<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    
    public function index()
    {
        $issues = Issue::with('stories')->where('status', 'published')->paginate(3);

        return response()->json([
            'success' => true,
            'results' => $issues,
        ]);
    }
    
    public function show(Issue $issue) {
                       
        if ($issue->pubblication_number != 0 && $issue->status == 'published') {

            $issue->load('stories');

            foreach ($issue->stories as $story) {
                $story->load('author', 'tags');
            }
                
            $res = [
                'success' => true,
                'results' => $issue,
            ];

        } else {
            $res = [
                'success' => false,
                'message' => 'issue not found',
            ];
        }
            
        return response()->json($res);
    }
}