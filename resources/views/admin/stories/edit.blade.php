@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Edit the Short Story</h4>

  <form action="{{ route('admin.stories.update', $story) }}" method="POST">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $story->title }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="author_id">Author</label>
      <select class="form-select" aria-label="Default select example" name="author_id" id="author_id">
        @foreach ($authors as $author)
          <option value="{{ $author->id }}" {{ $story->author_id == $author->id ? 'selected' : '' }}>{{ $author->name . ' ' . $author->surname }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="8">{{ $story->content }}</textarea>
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="text" class="form-control" name="cover_img" id="cover_img" value="{{ $story->cover_img }}">
    </div>

    <div class="form-group">
      <input type="submit" class="form-control btn btn-warning" value="Save">
    </div>

  </form>

</div>



@endsection