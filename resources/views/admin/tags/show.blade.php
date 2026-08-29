@extends('layouts.admin')

@section('content')

<div class="container my-4">

    <div class="card tag_card my-3 bg-info p-2 rounded" >
      <div class="row bg-light p-3">

        <div class="col-2 text-center align-self-center text-body-secondary" style="font-size: 5rem;">
          ico {{-- icona del genre --}}
        </div>

        <div class="col">

          <h2 class="card-title">{{ $tag->name}}</h2>

          <div class="card-footer rounded mt-3">
            <p class="card-text">{{ $tag->description }}</p>
          </div>

          <div class="rounded">
            <div class="card-body rounded">
              <h5 class="card-subtitle text-body-secondary my-2">Short Stories:</h5>          
                <ul>
                  @foreach ($tag->stories as $story)
                  <li>

                    <a href="{{ route('admin.stories.show', $story) }}">{{ $story->title }}</a>&nbsp;&nbsp;
                    
                    <span class="text-muted">
                      <small>by</small> 
                      <a href="{{ route('admin.authors.show', $story->author) }}">
                        {{ $story->author->name . ' ' . $story->author->surname }}
                      </a>
                    </span>&nbsp;&nbsp;
                    
                    @if ($story->issue->pubblication_number !== 0)
                    <span class="text-muted" title="{{ $story->issue->title }}">
                      <a href="{{ route('admin.issues.show', $story->issue) }}">
                        (&nbsp;Issue n° {{ $story->issue->pubblication_number }}&nbsp;)
                      </a>
                    </span>
                    @endif

                  </li>
                  @endforeach                  
                </ul>

            </div>
          </div>
          
        </div>
        
        <div class="col-md-1 d-flex flex-column gap-3 my-3">
          <div><a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning">edit</a></div>
          <div><x-delete_button :entity="$tag" entityType="tag"/></div>
        </div>
        

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$tag" entityType="tag" tableName="tags" />

@endsection