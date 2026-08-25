@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Short Story</h4>

  <form action="{{ route('admin.authors.update', $author) }}" method="POST">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $author->name }}">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="surname">Surname</label>
      <input type="text" class="form-control" name="surname" id="surname" value="{{ $author->surname }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="bio">About <small class="text-muted">~ max 450 characters</small></label>
      <textarea type="text" class="form-control" name="bio" id="bio">{{ $author->bio }}</textarea>
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="photo">Photography</label>
      <input type="text" class="form-control my-2" name="photo" id="photo" value="{{ $author->photo }}">
      <img src="{{ $author->photo }}" class="rounded" alt="current author photo" style="width: 100px; height: 100px;">
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-warning" value="Save">
    </div>

  </form>

</div>



@endsection