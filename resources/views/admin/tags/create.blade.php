@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Tag</h4>

  <form action="{{ route('admin.tags.store') }}" method="POST">
  @csrf

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    
    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="label">Label <small class="text-muted">~ shorter name</small></label>
      <input type="text" class="form-control" name="label" id="label">
    </div>

    <div class="form-group my-3 text-bg-success p-2 rounded">
      <label for="description">Description <small class="text-muted">~ max 250 characters</small></label>
      <textarea type="text" class="form-control" name="description" id="description"></textarea>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-success" value="Save">
    </div>

  </form>

</div>



@endsection