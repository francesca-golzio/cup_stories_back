@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Edit the Short Story</h4>

  <form action="{{ route('admin.stories.update', $story) }}" method="POST" enctype="multipart/form-data" class="row border-warning form_custom">
  @csrf
  @method('PUT')

    <div class="form-group p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $story->title }}" maxlength="100">
    </div>

    <div class="form-group p-2 rounded w-50">
      <label for="author_id">Author</label>
      <select class="form-select" aria-label="Default select example" name="author_id" id="author_id">
        @foreach ($authors as $author)
          <option value="{{ $author->id }}" {{ $story->author_id == $author->id ? 'selected' : '' }}>
            {{ $author->name . ' ' . $author->surname }}
          </option>
        @endforeach
      </select>
    </div>
    
    <div class="form-group p-2 rounded w-50">
      <label for="issue_id">issue</label>
      <select class="form-select" aria-label="Default select example" name="issue_id" id="issue_id">
        @foreach ($issues as $issue)
          <option value="{{ $issue->id }}" {{ $story->issue_id == $issue->id ? 'selected' : '' }}>
            @if ($issue->pubblication_number === 0)
              NA - {{ $issue->title }}
            @elseif (!$issue->pubblication_number)
            [draft] - {{ $issue->title }}
            @else
            {{ $issue->pubblication_number }} - {{ $issue->title }}
            @endif
          </option>
          @endforeach
        </select>
      </div>

    <div class="form-group p-2 rounded">
      <label for="tags">Tags</label>
      <div class="d-flex flex-wrap">
        @foreach ($tags as $tag)
        <div class="form-check mx-2">
          <input 
            class="form-check-input" 
            type="checkbox" 
            name="tags[]"
            value="{{ $tag['id'] }}" 
            id="tag-{{ $tag['slug'] }}"
            {{ $story->tags->contains($tag->id) ? 'checked' : '' }}>
          <label class="form-check-label" for="tag-{{ $tag['slug'] }}">
            {{ $tag['name'] }}
          </label>
        </div>
        @endforeach
      </div>
    </div>

    <div class="form-group p-2 rounded">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="6" maxlength="3000">{{ $story->content }}</textarea>
    </div>

    <div class="form-group p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control" name="cover_img" id="cover_img" value="{{ $story->cover_img }}" maxlength="260">
       @if ($story->cover_img)        
        <div class="img_tumb">
          <img src="{{ $story->cover_img }}" class="img-fluid rounded mt-2 w-25" alt='tumbnail of the current "{{ $story->title }}" cover image'/>
        </div>
        @endif
    </div>

    <div class="form-group pt-3">
      <input type="submit" class="form-control btn btn-outline-warning" value="Save">
    </div>

  </form>

</div>



@endsection