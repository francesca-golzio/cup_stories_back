@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Issue</h4>

  <form action="{{ route('admin.issues.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    
    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="color">Color</label>
      <input type="color" class="form-control form-control-color" name="color" id="color">
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control" name="cover_img" id="cover_img">
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-success" value="Save">
    </div>

  </form>

</div>



@endsection