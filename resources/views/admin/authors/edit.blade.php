@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Update the Author</h4>

  <form action="{{ route('admin.authors.update', $author) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $author->name }}" maxlength="50" required aria-required="true">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="surname">Surname</label>
      <input type="text" class="form-control" name="surname" id="surname" value="{{ $author->surname }}" maxlength="50" required aria-required="true">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="bio">About <small class="text-muted">~ max 450 characters</small></label>
      <textarea type="text" class="form-control" name="bio" id="bio" maxlength="450">{{ $author->bio }}</textarea>
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="photo">Photography</label>
      <input type="file" class="form-control my-2" name="photo" id="photo" value="{{ $author->photo }}" maxlength="260">
      @if ($author->photo)
      <div class="img_tumb">
      <img src="{{ asset('storage/' . $author->photo) }}" class="img-fluid rounded mt-2" alt="current author photo" title="current author photo" style="width: 100px; height: 100px;">
      @endif
      </div>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-warning" value="Save">
    </div>

  </form>

</div>



@endsection