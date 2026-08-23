@extends('layouts.admin')

@section('content')

<div class="table-responsive my-4">
  <table class="table table-primary table-striped">
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
        <td><button class="btn btn-primary">show</button></td>
        <td><button class="btn btn-primary">edit</button></td>
        <td><button class="btn btn-danger">delete</button></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>



@endsection