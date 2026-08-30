@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.issues.create') }}" class="btn btn-success mb-3">Add a new Issue</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">title</th>
        <th scope="col">status</th>
        <th scope="col">pubblication_number</th>
        <th scope="col" colspan="3">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($issues as $issue)
      <tr class="">
        <td scope="row">
          @if ($issue->cover_img)
          <img 
            src="{{ asset('storage/' . $issue->cover_img) }}" 
            alt="{{ $issue->title}}" 
            class="rounded" 
            style="width: 200px; aspect-ratio: 3/1; object-fit: cover">
          @endif
        </td>
        <td><h4>{{ $issue->title }}</h4></td>
        <td>{{ $issue->status }}</td>
        <td>{{ $issue->pubblication_number}}</td>
        <td><a href="{{ route('admin.issues.show', $issue) }}" class="btn btn-info">show</a></td>
        <td><a href="{{ route('admin.issues.edit', $issue) }}" class="btn btn-warning">edit</a></td>
        <td><x-delete_button :entity="$issue" entityType="issue"/></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Modal -->
@foreach ($issues as $issue)
<x-delete_button_modal :entity="$issue" entityType="issue" tableName="issues" />
@endforeach

@endsection