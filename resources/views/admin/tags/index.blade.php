@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.tags.create') }}" class="btn btn-success mb-3">Add a new Tag</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">label</th>
        <th scope="col" colspan="3">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tags as $tag)
      <tr class="">
        <td scope="row">{{ $tag->name }}</td>
        <td scope="row"><small class="border border-secondary rounded px-1">{{ $tag->label }}</small></td>
        <td><a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-info">show</a></td>
        <td><a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-warning">edit</a></td>
        <td><x-delete_button :entity="$tag" entityType="tag"/></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Modal -->
@foreach ($tags as $tag)
<x-delete_button_modal :entity="$tag" entityType="tag" tableName="tags" />
@endforeach

@endsection