@extends('layouts.admin')

@section('content')

<nav class="pt-2"><a href="{{ route('admin.authors.index') }}">back to list</a></nav>

<div class="container my-2" style="max-width: 800px">

    <div class="card author_card my-3 bg-info p-2 rounded" >
      <div class="row bg-light p-3">

        @if ($author->photo)
        <div class="col-md-3 author_photo">
          <img src="{{ $author->photo }}" class="img-fluid rounded-circle w-100 pb-3" alt="{{ $author->name . ' ' . $author->surname }}"/>
        </div>
        @endif

        <div class="col">
          <h2 class="card-title">{{ $author->name . ' ' . $author->surname }}</h2>
          <div>
            <h5 class="card-subtitle text-body-secondary my-3">Short Stories:</h5>      
            <ul>
              @foreach ($author->stories as $story)                   
                <li>
                  <div>
                    <a href="{{ route('admin.stories.show', $story) }}">
                      {{ $story->title }}
                    </a>
                    &nbsp;
                    <a href="{{ route('admin.issues.show', $story->issue_id) }}">
                      <small class="text-muted">
                        [&nbsp; issue {{ $story->issue->pubblication_number }}&nbsp;]
                      </small>
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>            
          </div>          
        </div>
        
        <div class="col-md-1 d-flex flex-column gap-3 m-3">
          <div><a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-warning">edit</a></div>
          <div><x-delete_button :entity="$author" entityType="author"/></div>
        </div>
        
        <div class="card-footer rounded">
          <h5 class="card-subtitle text-body-secondary">About</h5>
          <p class="card-text">{{ $author->bio }}</p>
        </div>
        

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$author" entityType="author" tableName="authors" />

@endsection