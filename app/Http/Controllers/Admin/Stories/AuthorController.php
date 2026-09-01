<?php

namespace App\Http\Controllers\Admin\Stories;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newAuthor = new Author();
        $newAuthor->name = $data['name'];
        $newAuthor->surname = $data['surname'];
        $newAuthor->bio = $data['bio'];
        $newAuthor->slug = Str::slug($data['name'] . ' ' . $data['surname'], '-');

        if (array_key_exists('photo', $data)) {
            $img_url = Storage::putFile('authors', $data['photo']);
            $newAuthor->photo =  "http://localhost:8000/storage/" . $img_url;
        }

        //dd($newAuthor);

        $newAuthor->save();

        return redirect()->route('admin.authors.show', $newAuthor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->all();

        $author->name = $data['name'];
        $author->surname = $data['surname'];
        $author->bio = $data['bio'];
        $author->slug = Str::slug($data['name'] . ' ' . $data['surname'], '-');

        if (array_key_exists('photo', $data)) {

            if ($author->photo) {
                Storage::delete($author->photo);
            }
            $img_url = Storage::putFile('authors', $data['photo']);
            $author->photo = "http://localhost:8000/storage/" . $img_url;
        }

        //dd($author);

        $author->update();

        return redirect()->route('admin.authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if($author->photo) {
            Storage::delete($author->photo);
        }
        
        $author->delete();

        return redirect()->route('admin.authors.index');
    }
}
