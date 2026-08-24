@extends('layouts.admin')

@section('content')

<div class="container my-4">

    <div class="card story_card mb-3" ><!-- style="max-width: 800px;" -->
      <div class="row">

        <div class="col-md-4">
          <img src="{{$story->cover_img}}" class="img-fluid rounded-start w-100" alt="{{ $story->title }}"/>
        </div>

        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title">{{ $story->title }}</h4>
            <h6 class="card-subtitle text-body-secondary">author</h6>
            <p class="card-text">{{ $story->content }}</p>
          </div>
        </div>

        <div class="col-md-2 d-flex flex-column gap-3 my-3">
          <div><a href="#" class="btn btn-primary">edit</a></div>
          <div><a href="#" class="btn btn-danger">delete</a></div>
        </div>

      </div>
    </div>
    
</div>


@endsection