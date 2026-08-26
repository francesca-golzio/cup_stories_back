<?php

namespace App\Http\Controllers\Stories;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;
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
        return view('admin.issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
