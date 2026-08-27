@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Update the current Issue</h4>

  <form action="{{ route('admin.issues.update', $issue) }}" method="POST">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $issue->title }}">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="color">Color</label>
      <input type="color" class="form-control form-control-color" name="color" id="color" value="{{ $issue->color }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="text" class="form-control " name="cover_img" id="cover_img" value="{{ $issue->cover_img }}">
      <img src="{{ $issue->cover_img }}" alt="current cover image" width="80" class="rounded mt-2">
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