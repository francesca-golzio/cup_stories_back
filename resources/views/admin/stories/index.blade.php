@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.stories.create') }}" class="btn btn-success mb-3">Add a Short Story</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col" class="align-middle">title</th>
        <th scope="col" class="col d-none d-lg-table-cell align-middle">author</th>
        <th scope="col" class="text-center align-middle">issue</th>
        <th scope="col" class="col d-none d-md-table-cell align-middle">tags</th>
        <th scope="col" colspan="3" class="align-middle">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stories as $story)
      <tr class="">
        <td scope="row" class="align-middle"><h5>{{ $story->title }}</h5></td>
        <td class="col d-none d-lg-table-cell align-middle">{{ $story->author->name . ' ' . $story->author->surname }}</td>
        <td class="text-center align-middle">{{ $story->issue->pubblication_number !== 0 ? $story->issue->pubblication_number : '' }}</td>
        <td class="col d-none d-md-table-cell align-middle">{{ $story->tags->implode('name', ', ') }}</td>
        <td class="align-middle"><x-show_button :route="route('admin.stories.show', $story)" /></td>
        <td class="align-middle"><x-edit_button :route="route('admin.stories.edit', $story)"/></td>
        <td class="align-middle"><x-delete_button :entity="$story" entityType="story"/></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Modal -->
@foreach ($stories as $story)
<x-delete_button_modal :entity="$story" entityType="story" tableName="stories" />
@endforeach

@endsection