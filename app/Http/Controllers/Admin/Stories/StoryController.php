<?php

namespace App\Http\Controllers\Admin\Stories;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Issue;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::all();

        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $issues = Issue::all();

        return view('admin.stories.create', compact('authors', 'issues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newStory = new Story();

        $newStory->title = $data['title'];
        $newStory->author_id = $data['author_id']; 
        $newStory->content = $data['content'];
        $newStory->cover_img = $data['cover_img'];
        $newStory->slug = Str::slug($data['title'], '-');

        //dd($newStory);

        $newStory->save();

        return redirect()->route('admin.stories.show', $newStory->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return view('admin.stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        $authors = Author::all();
        $issues = Issue::all();

        return view('admin.stories.edit', compact('story', 'authors', 'issues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        $data = $request->all();

        $story->title = $data['title'];
        $story->author_id = $data['author_id']; 
        $story->content = $data['content'];
        $story->cover_img = $data['cover_img'];
        $story->slug = Str::slug($data['title'], '-');
        $story->issue_id = $data['issue_id'];

        //dd($story);

        $story->update();

        return redirect()->route('admin.stories.show', $story);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        $story->delete();

        return redirect()->route('admin.stories.index');
    }
}
