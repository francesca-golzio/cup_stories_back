@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.stories.create') }}" class="btn btn-success mb-3">Add a Short Story</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">title</th>
        <th scope="col">authors</th>
        <th scope="col">issues</th>
        <th scope="col" colspan="3">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stories as $story)
      <tr class="">
        <td scope="row">{{ $story->title }}</td>
        <td>story author</td>
        <td>issue</td>
        <td><a href="{{ route('admin.stories.show', $story) }}" class="btn btn-info">show</a></td>
        <td><a href="{{ route('admin.stories.edit', $story) }}" class="btn btn-warning">edit</a></td>
        <td><x-delete_button :entity="$story" entityType="story"/></td>
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