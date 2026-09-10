@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Tag</h4>

  <form action="{{ route('admin.tags.store') }}" method="POST" class="row border-success form_custom">
  @csrf

    <div class="form-group p-2 rounded w-50">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" maxlength="30" required aria-required="true">
    </div>
    
    <div class="form-group p-2 rounded w-50">
      <label for="label">Label <small class="text-muted">~ shorter name</small></label>
      <input type="text" class="form-control" name="label" id="label" maxlength="30">
    </div>

    <div class="form-group p-2 rounded">
      <label for="description">Description <small class="text-muted">~ max 250 characters</small></label>
      <textarea type="text" class="form-control" name="description" id="description" maxlength="250"></textarea>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-outline-success" value="Save">
    </div>

  </form>

</div>



@endsection