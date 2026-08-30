@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Update the current Issue</h4>

  <form action="{{ route('admin.issues.update', $issue) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $issue->title }}">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
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
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="color">Color</label>
      <input type="color" class="form-control form-control-color" name="color" id="color" value="{{ $issue->color }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control " name="cover_img" id="cover_img" value="{{ $issue->cover_img }}">
      @if ($issue->cover_img)
      <div class="img_tumb">
        <img 
        src="{{ asset('storage/' . $issue->cover_img) }}" 
        class="img-fluid rounded mt-2 w-25" 
        alt='tumbnail of the current "{{ $issue->title }}" cover image'">
      </div>
      @endif
    </div>

    <div class="d-flex align-items-center gap-3">
      <div>
        @if ($issue->status == 'draft')
        <div class="form-group my-3">
          <button type="submit" class="form-control btn btn-warning" name="set_status" value="save_draft">Save as draft</button>
        </div>
        @endif
        @if ($issue->status == 'published')
        <div class="form-group my-3">
          <button type="submit" class="form-control btn btn-warning" name="set_status" value="unpublish">Unpublish and Save as draft</button>
        </div>
        @endif
      </div>

      <span>or</span>

      {{-- TODO: 📌 gestire i link (e i rendering condizionali) per i bottoni publish e unpublish. forse si potrebbe usare una modale che contiene (nascosto) il form per confermare la pubblicazione? 🤔 però i bottoni sono nella show, non nella edit... --}}
      {{-- TODO: 📌 ?? usare una modale per confermare la pubblicazione --}}
      <div class="form-group my-3">
        <button type="submit" class="form-control btn btn-warning" name="set_status" value="publish">Publish the updated Issue</button>
      </div> 

    </div>    
  </form>   
  
</div>


@endsection