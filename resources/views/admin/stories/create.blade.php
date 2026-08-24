@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Short Story</h4>

  <form action="{{ route('admin.stories.store') }}" method="POST">
  @csrf

    <div class="form-group my-3 text-bg-info p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
 
    <div class="form-group my-3 text-bg-info p-2 rounded">
      <label for="content">Content</label>
      <textarea class="form-control" name="content" id="content" rows="10"></textarea>
    </div>

    <div class="form-group my-3 text-bg-info p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="text" class="form-control" name="cover_img" id="cover_img">
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-info" value="Save">
    </div>

  </form>

</div>



@endsection