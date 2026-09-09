@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.tags.create') }}" class="btn btn-success mb-3">Add a new Tag</a>

  <table class="table table-striped mx-auto" style="max-width: 650px;">
    <thead>
      <tr>
        <th scope="col" class="align-middle">name</th>
        <th scope="col" class="align-middle">label</th>
        <th scope="col" colspan="3" class="align-middle">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tags as $tag)
      <tr class="">
        <td scope="row" class="align-middle">{{ $tag->name }}</td>
        <td class="align-middle"><small class="border border-secondary rounded px-1">{{ $tag->label }}</small></td>
        <td class="align-middle"><x-show_button :route="route('admin.tags.show', $tag)" /></td>
        <td class="align-middle"><x-edit_button :route="route('admin.tags.edit', $tag)" /></td>
        <td class="align-middle"><x-delete_button :entity="$tag" entityType="tag"/></td>
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