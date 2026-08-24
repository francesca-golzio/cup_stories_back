<?php

namespace App\Http\Controllers\Stories;

use App\Http\Controllers\Controller;
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
        return view('admin.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newPost = new Story();

        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->cover_img = $data['cover_img'];
        $newPost->slug = Str::slug($data['title'], '-');

        //dd($newPost);

        $newPost->save();

        return redirect()->route('admin.stories.show', $newPost->id);
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
        return view('admin.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        $data = $request->all();

        $story->title = $data['title'];
        $story->content = $data['content'];
        $story->cover_img = $data['cover_img'];
        $story->slug = Str::slug($data['title'], '-');

        //dd($story);

        $story->update();

        return redirect()->route('admin.stories.show', $story);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
