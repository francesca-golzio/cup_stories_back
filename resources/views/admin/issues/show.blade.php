@extends('layouts.admin')

@section('content')

<nav class="pt-2"><a href="{{ route('admin.issues.index') }}">back to list</a></nav>

  <div class="container my-2" style="max-width: 800px">

    <div class="issue_card my-3 bg-info py-1 rounded text-muted" >
      
      <div class="d-flex flex-wrap bg-dark w-100">
        
          
          <div class="col-12 col-md-9">
            <h2 class="px-3 pt-3">{{ $issue->title }}</h2>
            
            @if ($issue->pubblication_number !== 0)
              @if ($stories->count() > 0)
              <h5 class="text-body-secondary m-3">This issue contains the following Short Stories:</h5>
              @else
              <h5 class="text-body-secondary m-3">This issue is empty</h5>
              <div class="text-body-secondary m-3">— Edit to add Short Stories —</div>
              @endif          
            @endif          
            <ul>
              @foreach ($stories as $story)
              <li>
                <a href="{{ route('admin.stories.show', $story) }}">
                  {{ $story->title }}
                </a>
                &nbsp;
                <a href="{{ route('admin.authors.show', $story->author) }}">
                  <small>
                    [&nbsp;by {{ $story->author->name . ' ' . $story->author->surname }}&nbsp;]
                  </small>
                </a>
              </li>
              @endforeach
            </ul>

            <div class="d-none d-lg-block mb-3 mx-3">
              @if ($issue->cover_img)
               <img 
                src="{{$issue->cover_img}}" 
                class="img-fluid rounded issue_detail_img bg-info" 
                alt="{{ $issue->title}}"/>
              @endif
            </div>
          </div>
          
          <div class="col col-12 col-md-3">     

            @if ($issue->pubblication_number !== 0)              
            <div class="d-flex flex-column flex-wrap gap-2 align-items-start my-3">
              <div class="text-muted">Cup Stories vol. {{ $issue->pubblication_number }}</div>
              <div>Status: <span class="fw-bold">{{ $issue->status }}</span></div>
              <div class="text-muted">Published at {{ $issue->published_at }}</div>
            </div>
            @endif
            
            <div class="d-flex flex-wrap gap-4 align-items-start my-3">
              @if ($issue->pubblication_number !== 0)              
              <form action="{{ route('admin.issues.updateStatus', $issue) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="{{ $issue->status === 'draft' ? 'published' : 'draft' }}">
                <button  
                type="submit" 
                  class="form-control issue_publish_unpublish_btn btn btn-outline-info"
                  title="{{ $issue->status === 'draft' ? 'publish' : 'unpublish' }}"
                  aria-label="{{ $issue->status === 'draft' ? 'publish' : 'unpublish' }}">
                  {!! $issue->status === 'draft' ? 'publish <i class="bi bi-box-arrow-up-right"></i>' : '<i class="bi bi-box-arrow-in-down-left"></i> unpublish' !!}
                </button>
              </form>
              @endif

              <div><x-edit_button :route="route('admin.issues.edit', $issue)"></x-edit_button></div>
              
              @if ($issue->pubblication_number !== 0)              
              <div><x-delete_button :entity="$issue" entityType="issue"/></div>
              @endif
            </div>
            
          </div>

      </div>
    </div>
    

<!-- Modal -->
<x-delete_button_modal :entity="$issue" entityType="issue" tableName="issues" />

@endsection