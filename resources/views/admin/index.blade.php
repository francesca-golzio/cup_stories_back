@extends('layouts.app') 

@section('content')
<h3 class="p-4">
  Ciao <b>{{ $user->name }}</b>, sei nella dashboard di amministrazione
</h3>
@endsection