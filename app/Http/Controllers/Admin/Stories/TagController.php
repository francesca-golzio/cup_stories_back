<?php

namespace App\Http\Controllers\Admin\Stories;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stories = Story::all();

        return view('admin.tags.create', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);

        $newTag = new Tag();

        $newTag->name = $data['name'];
        $newTag->label = $data['label'] ? Str::slug($data['label'], '_') : Str::slug($data['name'], '_');
        $newTag->description = $data['description'] ?? '- missing -';
        $newTag->slug = Str::slug($data['name']);

        //dd($newTag);

        $newTag->save();

        if ($request->has('stories')) {
            $newTag->stories()->attach($data['stories']);
        }

        return redirect()->route('admin.tags.show', $newTag);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $stories = Story::all();

        return view('admin.tags.edit', compact('tag', 'stories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();

        $tag->name = $data['name'];
        $tag->label = $data['label'] ?? $data['name'];
        $tag->description = $data['description'] ?? '- missing -';

        $tag->update();

        if ($request->has('stories')) {
            $tag->stories()->sync($data['stories']);
        } else {
            $tag->stories()->detach();
        }

        return redirect()->route('admin.tags.show', $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->stories()->detach();
        
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
