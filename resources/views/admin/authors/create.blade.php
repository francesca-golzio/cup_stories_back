@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Author</h4>

  <form action="{{ route('admin.authors.store') }}" method="POST">
  @csrf

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    
    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="surname">Surname</label>
      <input type="text" class="form-control" name="surname" id="surname">
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="bio">About <small class="text-muted">~ max 450 characters</small></label>
      <textarea type="text" class="form-control" name="bio" id="bio"></textarea>
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="photo">Photography</label>
      <input type="text" class="form-control" name="photo" id="photo">
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-success" value="Save">
    </div>

  </form>

</div>



@endsection