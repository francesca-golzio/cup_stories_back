@extends('layouts.admin')

@section('content')

<div class="container my-4">

    <div class="issue_card my-3 bg-info py-2 rounded" >
      
      <div class="d-flex flex-column bg-light w-100">
        
        <div class="">
          <h2 class="p-3">{{ $issue->title }}</h2>
        </div>

      
        <div class="d-flex p-1">      
          
          <div class="col-lg-2 d-none d-lg-block mb-3 mx-3">
            @if ($issue->cover_img)
            <img src="{{asset('storage/' . $issue->cover_img)}}" class="img-fluid rounded" alt="{{ $issue->title}}" style="object-fit: cover;"/>
            @endif
          </div>

          <div class="col">
            <div>
              @if ($issue->pubblication_number !== 0)
                @if ($stories->count() > 0)
                <h5 class="text-body-secondary m-3">This issue contains the following Short Stories:</h5>
                @else
                <h5 class="text-body-secondary m-3">This issue is empty</h5>
                <div class="text-body-secondary m-3">— Edit to add Short Stories —</div>
                @endif          
              @endif          
              <ul>
                {{-- si potrebbe aggiungere un link per vedere la singola storia --}}
                @foreach ($stories as $story)
                <li>
                  <div class="d-flex gap-2">
                    <h5>{{ $story->title }}</h5>
                    <a href="{{ route('admin.stories.show', $story) }}">link</a>
                    <span><sub class="text-muted">by {{ $story->author->name . ' ' . $story->author->surname }}</sub></span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>          
          </div>
          
          <div class="col-3 d-flex flex-column gap-3 mb-3">
            @if ($issue->pubblication_number !== 0)              
            <div class="d-flex flex-column flex-wrap gap-3">
              <div class="text-muted">Cup Stories vol. {{ $issue->pubblication_number }}</div>
              <div>Status: <span class="fw-bold">{{ $issue->status }}</span></div>
              <div class="text-muted">Published at {{ $issue->published_at }}</div>
            </div>
            <div class="d-flex gap-3">
              <button class="btn btn-info {{ $issue->status == 'published' ? 'disabled' : '' }}">Publish</button>
              <button class="btn btn-info {{ $issue->status !== 'published' ? 'disabled' : '' }}">Unpublish</button>
            </div>
            @endif

            <div><a href="{{ route('admin.issues.edit', $issue) }}" class="btn btn-warning">edit</a></div>
            
            @if ($issue->pubblication_number !== 0)              
            <div><x-delete_button :entity="$issue" entityType="issue"/></div>
            @endif
          </div>
            
        </div>     

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$issue" entityType="issue" tableName="issues" />

@endsection