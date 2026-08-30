@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Short Story</h4>

  <form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" maxlength="100" required aria-required="true">
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="author_id">Author</label>
      <select class="form-select" aria-label="Default select example" name="author_id" id="author_id" required aria-required="true">
        <option value=""></option>
        @foreach ($authors as $author)
        <option value="{{ $author->id }}">{{ $author->name . ' ' . $author->surname }}</option>
        @endforeach
      </select>
    </div>
 
    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="6"  maxlength="450" required aria-required="true"></textarea>
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control" name="cover_img" id="cover_img" maxlength="260">
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <div class="d-flex gap-5">
        <label for="tags">Tags</label>
        @foreach ($tags as $tag)
        <div class="form-check">
          <input 
            class="form-check-input" 
            type="checkbox" 
            name="tags[]"
            value="{{ $tag['id'] }}" 
            id="tag-{{ $tag['slug'] }}">
          <label class="form-check-label" for="tag-{{ $tag['slug'] }}">
            {{ $tag['name'] }}
          </label>
        </div>
        @endforeach
      </div>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-success" value="Save">
    </div>

  </form>

</div>



@endsection