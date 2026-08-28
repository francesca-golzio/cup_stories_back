@extends('layouts.admin')

@section('content')

<div class="container my-3">
  
  <h4>Add a new Tag</h4>

  <form action="{{ route('admin.tags.update', $tag) }}') }}" method="POST">
  @csrf
  @method('PUT')

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}">
    </div>
    
    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="label">Label <small class="text-muted">~ optional shorter name</small></label>
      <input type="text" class="form-control" name="label" id="label" value="{{ $tag->label }}">
    </div>

    <div class="form-group my-3 text-bg-warning p-2 rounded">
      <label for="description">Description <small class="text-muted">~ max 250 characters</small></label>
      <textarea type="text" class="form-control" name="description" id="description">{{ $tag->description }}</textarea>
    </div>

    <div class="form-group my-3">
      <input type="submit" class="form-control btn btn-warning" value="Save">
    </div>

  </form>

</div>



@endsection