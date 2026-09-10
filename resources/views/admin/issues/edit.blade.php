@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Update the current Issue</h4>

  <form action="{{ route('admin.issues.update', $issue) }}" method="POST" enctype="multipart/form-data" class="row border-warning form_custom">
  @csrf
  @method('PUT')

    <div class="form-group p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" maxlength="100" required aria-required="true" value="{{ $issue->title }}">
    </div>
    
    <div class="form-group p-2 rounded">
      <label for="color">Short Stories</label>
      @foreach ($availableStories as $story)
      <div class="form-check">
        <input 
          class="form-check-input" 
          type="checkbox" 
          name="updatedStories[]"
          value="{{ $story['id'] }}" 
          id="story-{{ $story['slug'] }}" 
          {{ $story['issue_id'] == $issue->id ? 'checked' : '' }}>
        <label class="form-check-label" for="story-{{ $story['slug'] }}">
          {{ $story['title'] }}&nbsp;&nbsp;
          <small class="text-muted">[&nbsp;by {{ $story->author->name . ' ' . $story->author->surname }}&nbsp;]</small>
        </label>
      </div>
        @endforeach
    </div>

    <div class="form-group p-2 rounded w-75">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control " name="cover_img" id="cover_img" value="{{ $issue->cover_img }}">
      @if ($issue->cover_img)
      <div class="img_tumb">
        <img 
        src="{{ $issue->cover_img }}" 
        class="img-fluid rounded mt-2 w-25" 
        alt='tumbnail of the current "{{ $issue->title }}" cover image'">
      </div>
      @endif
    </div>
    
    <div class="form-group p-2 px-4 rounded w-25">
      <label for="color">Color</label>
      <input type="color" class="form-control form-control-color" name="color" id="color" value="{{ $issue->color }}">
    </div>

    <div class="d-flex align-items-center gap-3">
      <div>
        @if ($issue->status == 'draft')
        <div class="form-group my-3">
          <button type="submit" class="form-control btn btn-outline-warning" name="set_status" value="save_draft">Save as draft</button>
        </div>
        @endif
        @if ($issue->status == 'published')
        <div class="form-group my-3">
          <button type="submit" class="form-control btn btn-outline-warning" name="set_status" value="unpublish">Unpublish and Save as draft</button>
        </div>
        @endif
      </div>

      <span>or</span>

      <div class="form-group my-3">
        <button type="submit" class="form-control btn btn-outline-warning" name="set_status" value="publish">Publish the updated Issue</button>
      </div> 

    </div>    
  </form>   
  
</div>


@endsection