@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-success mb-3">Add a new Author</a>

  <table class="table table-striped mx-auto" style="max-width: 700px;">
    <thead>
      <tr>
        <th scope="col" class="align-middle"></th>
        <th scope="col" class="align-middle">surname</th>
        <th scope="col" class="align-middle">name</th>
        <th scope="col" colspan="3" class="align-middle">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($authors as $author)
      <tr class="">
        <td scope="row" class="align-middle">
          <img 
            src="{{ $author->photo }}" 
            alt="{{ $author->surname . ' ' . $author->name }}" 
            class="rounded-circle" 
            style="width: 50px;">
        </td>
        <td class="align-middle">{{ $author->surname }}</td>
        <td class="align-middle">{{ $author->name }}</td>
        <td class="align-middle"><x-show_button :route="route('admin.authors.show', $author)" /></td>
        <td class="align-middle"><x-edit_button :route="route('admin.authors.edit', $author)" /></td>
        <td class="align-middle"><x-delete_button :entity="$author" entityType="author"/></td>
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