@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  
  <a href="{{ route('admin.issues.create') }}" class="btn btn-outline-success mb-3 ">Add a new Issue</a>

  <table class="table table-striped mx-auto" style="max-width: 1000px;">
    <thead>
      <tr>
        <th scope="col" class="d-none d-md-table-cell align-middle"></th>
        <th scope="col" class="align-middle">title</th>
        <th scope="col" class="d-none d-md-table-cell align-middle">status</th>
        <th scope="col" class="col-1 align-middle">n°</th>
        <th scope="col" colspan="3" class="align-middle">actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($issues as $issue)
        @php
        $issueColor = $issue->color;
        @endphp

      <tr class="">
        <td scope="row" class="d-none d-md-table-cell align-middle">
          @if ($issue->cover_img)
          <img 
            src="{{ $issue->cover_img }}" 
            alt="{{ $issue->title}}" 
            class="rounded" 
            style="width: 150px; aspect-ratio: 2/1; object-fit: cover; background-color: {{ $issueColor }};">
          @endif
        </td>
        <td class="align-middle"><h4>{{ $issue->title }}</h4></td>
        <td class="d-none d-md-table-cell align-middle">{{ $issue->status }}</td>
        <td class="col-1 align-middle">{{ $issue->pubblication_number}}</td>
        <td class="align-middle"><x-show_button :route="route('admin.issues.show', $issue)" /></td>
        <td class="d-none d-lg-table-cell align-middle"><x-edit_button :route="route('admin.issues.edit', $issue)" /></td>
        <td class="d-none d-lg-table-cell align-middle"><x-delete_button :entity="$issue" entityType="issue"/></td>
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