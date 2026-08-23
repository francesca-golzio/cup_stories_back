@extends('layouts.admin') 

@section('content')

<h4 class="p-4">
  Welcome <b>{{ $user->name }}</b> ! 
</h4>

<div class="container d-flex flex-wrap gap-5">
  <div class="card" style="width: 200px; aspect-ratio: 3/2;">
    <div class="card-body">
      <div class="h3">Short Stories</div>
      <div>
        <a href="#">lista</a>
      </div>
      <div>
        <a href="#">nuovo</a>
      </div>
      </div>
    </div>
  <div class="card" style="width: 200px; aspect-ratio: 3/2;">
    <div class="card-body">
      <div class="h3">Issues</div>
      <div>
        <a href="#">lista</a>
      </div>
      <div>
        <a href="#">nuovo</a>
      </div>
      </div>
    </div>
  <div class="card" style="width: 200px; aspect-ratio: 3/2;">
    <div class="card-body">
      <div class="h3">Authors</div>
      <div>
        <a href="#">lista</a>
      </div>
      <div>
        <a href="#">nuovo</a>
      </div>
      </div>
    </div>
  <div class="card" style="width: 200px; aspect-ratio: 3/2;">
    <div class="card-body">
      <div class="h3">Tags</div>
      <div>
        <a href="#">lista</a>
      </div>
      <div>
        <a href="#">nuovo</a>
      </div>
      </div>
    </div>
</div>


    




@endsection