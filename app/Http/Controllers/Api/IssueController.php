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
}
