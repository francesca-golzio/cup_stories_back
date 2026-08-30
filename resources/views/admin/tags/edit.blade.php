@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Tag</h4>

  <form action="{{ route('admin.tags.update', $tag) }}') }}" method="POST">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" maxlength="30" required aria-required="true" value="{{ $tag->name }}">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="label">Label <small class="text-muted">~ optional shorter name</small></label>
      <input type="text" class="form-control" name="label" id="label" maxlength="30"  value="{{ $tag->label }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="description">Description <small class="text-muted">~ max 250 characters</small></label>
      <textarea type="text" class="form-control" name="description" id="description" maxlength="250">{{ $tag->description }}</textarea>
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="tags">Short Stories</label>
      <div class="container">
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 gx-3">
          @foreach ($stories as $story)
          <div class="form-check flex-wrap">
            <input 
              class="form-check-input" 
              type="checkbox" 
              name="stories[]"
              value="{{ $story['id'] }}" 
              id="story-{{ $story['slug'] }}"
              {{ $tag->stories->contains($story->id) ? 'checked' : '' }}>
            <label class="form-check-label d-block" for="story-{{ $story['slug'] }}">
              {{ Str::limit($story['title'], 30) }}&nbsp;&nbsp;
              <small class="text-muted">[&nbsp;by {{ $story->author->name . ' ' . $story->author->surname }}&nbsp;]</small>
            </label>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-warning" value="Save">
    </div>

  </form>

</div>



@endsection