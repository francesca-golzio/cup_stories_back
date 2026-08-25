@extends('layouts.admin')

@section('content')

<div class="container my-4">

    <div class="card author_card my-3 bg-info p-2 rounded" >
      <div class="row bg-light p-3">

        <div class="col-md-4">
          <img src="{{$author->photo}}" class="img-fluid rounded-circle w-100" alt="{{ $author->name . ' ' . $author->surname }}"/>
        </div>

        <div class="col-md-6">

          <h2 class="card-title">{{ $author->name . ' ' . $author->surname }}</h2>

          <div class="rounded bg-info-subtle">
            <div class="card-body rounded">
              <h5 class="card-subtitle text-body-secondary mb-3">Short Stories:</h5>          
              <table class="table table-info table-striped">
                <thead class="d-none">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- da ciclare -->
                  <tr class="">
                    <td scope="row"><h5>titolo racconto</h5></td>
                    <td>issue</td>
                  </tr>
                  <!-- da ciclare -->
                </tbody>
              </table>
              <div class="card-footer rounded mt-3">
                <h5 class="card-subtitle text-body-secondary">About</h5>
                <p class="card-text">{{ $author->bio }}</p>
              </div>

            </div>
          </div>
          
        </div>
        
        <div class="col-md-2 d-flex flex-column gap-3 my-3">
          <div><a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-warning">edit</a></div>
          <div><x-delete_button :entity="$author" entityType="author"/></div>
        </div>
        

      </div>
    </div>
    
</div>

<!-- Modal -->
<x-delete_button_modal :entity="$author" entityType="author" tableName="authors" />

@endsection