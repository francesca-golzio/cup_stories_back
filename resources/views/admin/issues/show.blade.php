@extends('layouts.admin')

@section('content')

<div class="container my-4">

    <div class="issue_card my-3 bg-info py-2 rounded" >
      
      <div class="d-flex flex-column bg-light w-100">
        
        <div class="">
          <h2 class="p-3">{{ $issue->title }}</h2>
        </div>

      
        <div class="d-flex p-1">      
          
          <div class="col-lg-3 d-none d-lg-block mb-3 mx-3">        
            <img src="{{$issue->cover_img}}" class="img-fluid rounded" alt="{{ $issue->title}}" style="aspect-ratio: 1/1; max-width: 300px;"/>
          </div>

          <div class="col">
            <div>
              <h5 class="text-body-secondary m-3">This issue contains the following Short Stories:</h5>          
              <ul>
                <!-- da ciclare -->
                <li scope="row" class=" d-flex gap-3">
                  <h5>story title</h5>
                    <span class="text-muted">author</span>
                  </li>
                  <!-- da ciclare -->
              </ul>
            </div>          
          </div>
          
          <div class="col-3 d-flex flex-column gap-3">
            <div class="text-muted">Cup Stories vol. {{ $issue->pubblication_number }}</div>
            <div>Status: <span class="fw-bold">{{ $issue->status }}</span></div>
            <div class="text-muted">Published at {{ $issue->published_at }}</div>
            <div class="d-flex flex-wrap gap-3">
              <button class="btn btn-info {{ $issue->status == 'published' ? 'disabled' : '' }}">Publish</button>
              <button class="btn btn-info {{ $issue->status !== 'published' ? 'disabled' : '' }}">Unpublish</button></div>
            <div><a href="{{ route('admin.issues.edit', $issue) }}" class="btn btn-warning">edit</a></div>
            <div><x-delete_button :entity="$issue" entityType="issue"/></div>
          </div>
            
        </div>     

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$issue" entityType="issue" tableName="issues" />

@endsection