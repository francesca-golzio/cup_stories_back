<?php

namespace App\Http\Controllers\Admin\Stories;

use App\Http\Controllers\Controller;
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
        return view('admin.tags.create');
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
        $newTag->label = $data['label'] ?? $data['name'];
        $newTag->description = $data['description'] ?? '- missing -';

        //dd($newTag);

        $newTag->save();

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
        return view('admin.tags.edit', compact('tag'));
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

        $tag->save();

        return redirect()->route('admin.tags.show', $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
