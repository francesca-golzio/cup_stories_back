@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.authors.create') }}" class="btn btn-success mb-3">Add a new Author</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">surname</th>
        <th scope="col">name</th>
        <th scope="col" colspan="3">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($authors as $author)
      <tr class="">
        <td scope="row"><img src="{{ $author->photo }}" alt="{{ $author->surname . ' ' . $author->name }}" class="rounded-circle" style="width: 50px;"></td>
        <td>{{ $author->surname }}</td>
        <td>{{ $author->name }}</td>
        <td><a href="{{ route('admin.authors.show', $author) }}" class="btn btn-info">show</a></td>
        <td><a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-warning">edit</a></td>
        <td><x-delete_button :entity="$author" entityType="author"/></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Modal -->
@foreach ($authors as $author)
<x-delete_button_modal :entity="$author" entityType="author" tableName="stories" />
@endforeach

@endsection