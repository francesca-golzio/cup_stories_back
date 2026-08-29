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
            <h6 class="card-subtitle text-body-secondary">
              <small class="text-muted">by</small>
              {{ $story->author->name . ' ' . $story->author->surname }}
            </h6>
            <p class="card-text mt-3">{{ $story->content }}</p>
          </div>
        </div>

        <div class="col-md-2 d-flex flex-column gap-3 my-3">

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
          
          @if ($story->issue->pubblication_number === 0)
          {{ $story->issue->status }} unassigned
          @else ($story->issue->pubblication_number !== 0)
          {{ $story->issue->status }} on Issue n° {{ $story->issue->pubblication_number }}<br>{{ $story->issue->title }}
          @endif
        
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