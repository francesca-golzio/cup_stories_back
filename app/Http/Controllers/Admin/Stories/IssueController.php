<?php

namespace App\Http\Controllers\Admin\Stories;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        
        return view('admin.issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.issues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newIssue = new Issue();

        $newIssue->title = $data['title'];
        $newIssue->status = 'draft';
        $newIssue->color = $data['color'];
        $newIssue->cover_img = $data['cover_img'];
        $newIssue->slug = Str::slug($data['title'], '-');

        //dd($newIssue);

        $newIssue->save();

        return redirect()->route('admin.issues.show', $newIssue);
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        $stories = Story::where('issue_id', $issue->id)->get();

        return view('admin.issues.show', compact('issue', 'stories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $unassignedStories = Story::where('issue_id', 1)->get();
        $myStories = Story::where('issue_id', $issue->id)->get();
        $availableStories = [];

        $availableStories = $myStories->merge($unassignedStories);
        //dd($availableStories);
        
        return view('admin.issues.edit', compact('issue', 'availableStories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $data = $request->all();

        $issue->title = $data['title'];
        $issue->color = $data['color'];
        $issue->cover_img = $data['cover_img'];
        $issue->slug = Str::slug($data['title'], '-');
        
        /* set $issue->status */
        if ($data['set_status'] == 'save_draft') {
            $issue->status = 'draft';
            
            } else if ($data['set_status'] == 'unpublish') {
                $issue->status = 'draft';

                /* set $issue->published_at */
                $issue->published_at = null;
                
                } else {
                    $issue->status = 'published';
                    
            /* set $issue->published_at */
            if (!$issue->published_at) {
                $issue->published_at = now();
            }

            /* set $issue->pubblication_number */
            if (!$issue->pubblication_number) {

                $lastIssue = Issue::orderBy('pubblication_number', 'desc')->first();

                $issue->pubblication_number = $lastIssue->pubblication_number + 1;
            }
        }

        //dd($issue);

        $issue->update();

        $issue->syncStories($data['updatedStories']);

        return redirect()->route('admin.issues.show', $issue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect()->route('admin.issues.index');
    }
}
