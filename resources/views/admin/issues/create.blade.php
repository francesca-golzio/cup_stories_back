@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Issue</h4>

  <form action="{{ route('admin.issues.store') }}" method="POST" enctype="multipart/form-data" class="row border-success form_custom">
  @csrf

    <div class="form-group p-2 rounded">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" maxlength="100" required aria-required="true">
    </div>

    <div class="form-group p-2 rounded w-75">
      <label for="cover_img">Cover image</label>
      <input type="file" class="form-control" name="cover_img" id="cover_img">
    </div>
    
    <div class="form-group p-2 px-4 rounded w-25">
      <label for="color">Color</label>
      <input type="color" class="form-control form-control-color" name="color" id="color">
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-outline-success" value="Save">
    </div>

  </form>

</div>



@endsection