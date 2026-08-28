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
                  <!-- da ciclare -->                  
                  <li>
                    <a href="#">title</a>
                    &nbsp;&nbsp;
                    <a href="#" class="text-muted">author</a>
                    &nbsp;&nbsp;
                    <a href="#" class="text-muted">issue</a>
                  </li>
                  <!-- da ciclare -->                  
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