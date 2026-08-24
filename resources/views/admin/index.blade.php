@extends('layouts.admin') 

@section('content')

<h4 class="p-4">
  Welcome <b>{{ $user->name }}</b> ! 
</h4>

<div class="container d-flex flex-wrap gap-5">

  <div class="card bg-secondary-subtle p-2" style="width: 200px; aspect-ratio: 3/2;">
    <div class="h3 text-center">Short Stories</div>
    <div class="card-body bg-light rounded d-flex justify-content-between">
      <a href="{{ route('admin.stories.index') }}" class="btn btn-info m-1">lista</a>
      <a href="{{ route('admin.stories.create') }}" class="btn btn-success m-1">nuovo</a>
    </div>
  </div>

  <div class="card bg-secondary-subtle p-2" style="width: 200px; aspect-ratio: 3/2;">
    <div class="h3 text-center">Issues</div>
    <div class="card-body bg-light rounded d-flex justify-content-between">
      <a href="#" class="btn btn-info m-1">lista</a>
      <a href="#" class="btn btn-success m-1">nuovo</a>
    </div>
  </div>

  <div class="card bg-secondary-subtle p-2" style="width: 200px; aspect-ratio: 3/2;">
    <div class="h3 text-center">Authors</div>
    <div class="card-body bg-light rounded d-flex justify-content-between">
      <a href="#" class="btn btn-info m-1">lista</a>
      <a href="#" class="btn btn-success m-1">nuovo</a>
    </div>
  </div>

  <div class="card bg-secondary-subtle p-2" style="width: 200px; aspect-ratio: 3/2;">
    <div class="h3 text-center">Tags</div>
    <div class="card-body bg-light rounded d-flex justify-content-between">
      <a href="#" class="btn btn-info m-1">lista</a>
      <a href="#" class="btn btn-success m-1">nuovo</a>
    </div>
  </div>

</div>


    




@endsection