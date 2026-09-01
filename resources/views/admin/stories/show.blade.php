@extends('layouts.admin')

@section('content')

<nav class="pt-2"><a href="{{ route('admin.stories.index') }}">back to list</a></nav>

<div class="container my-2" style="max-width: 800px">

    <div class="card story_card bg-info py-2 mb-3" ><!-- style="max-width: 800px;" -->
      <div class="row bg-light">
        
        <div class="col-md-9">
          <div class="card-body">
            <h4 class="card-title">{{ $story->title }}</h4>
            <h6 class="card-subtitle text-body-secondary" style="text-align: right;">
              <small class="text-muted">by</small>
              <a href="{{ route('admin.authors.show', $story->author) }}">
                {{ $story->author->name . ' ' . $story->author->surname }}
              </a>
            </h6>
            @if ($story->cover_img)        
            <div class="story_img">
              <img 
                src="{{ $story->cover_img }}" 
                class="img-fluid rounded w-100" 
                alt="{{ $story->title }} cover image"/>
            </div>
            @endif
            <p class="card-text mt-3">{{ $story->content }}</p>            
          </div>
        </div>

        <div class="col-md-3 d-flex flex-column gap-3 my-3 ">

          @if ($story->tags->count() > 0)
          <div>            
            @foreach ($story->tags as $tag)
            <a href="{{ route('admin.tags.show', $tag) }}">
              <small class="border border-secondary rounded px-1 mx-1">
                {{ $tag->label }}
              </small>
            </a>
            @endforeach
          </div>
          @endif
          
          <div>
          @if ($story->issue->pubblication_number === 0)
          {{ $story->issue->status }} unassigned
          @else ($story->issue->pubblication_number !== 0)
          {{ $story->issue->status }} on Issue n° <a href="{{ route('admin.issues.show', $story->issue) }}">{{ $story->issue->pubblication_number }}<br>{{ $story->issue->title }}</a>
          @endif
          </div>
        
          @if ($story->issue->status == 'published')
          <div>
            {{ $story->issue->pubblished_at ? $story->issue->pubblished_at->format('m-Y') : '' }}
          </div>          
          @endif

          <div><a href="{{ route('admin.stories.edit', $story) }}" class="btn btn-warning">edit</a></div>
          <div><x-delete_button :entity="$story" entityType="story"/></div>
          
        </div>

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$story" entityType="story" tableName="stories" />

@endsection