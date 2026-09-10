@extends('layouts.admin') 

@section('content')
<div class="container dashboard_container">

  <h4 class="p-4">
    Welcome <b>{{ $user->name }}</b> ! 
  </h4>

  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 panel_container">

      <div class="dot col bg-secondary-subtle p-2">
        <x-go_to_list_button :route="route('admin.stories.index')"/>
        <h3>Short Stories</h3>
        <x-add_instance_button :route="route('admin.stories.create')"/>
      </div>

      <div class="dot col bg-secondary-subtle p-2">
        <x-go_to_list_button :route="route('admin.issues.index')"/>
        <h3>Issues</h3>
        <x-add_instance_button :route="route('admin.issues.create')"/>
      </div>

      <div class="dot col bg-secondary-subtle p-2">
        <x-go_to_list_button :route="route('admin.authors.index')"/>
        <h3>Authors</h3>
        <x-add_instance_button :route="route('admin.authors.create')"/>
      </div>

      <div class="dot col bg-secondary-subtle p-2">
        <x-go_to_list_button :route="route('admin.tags.index')"/>
        <h3>Tags</h3>
        <x-add_instance_button :route="route('admin.tags.create')" class="round_and_bigger"/>
      </div>

      <div class="dot col bg-secondary-subtle p-2">
        <a href="{{ env('APP_FRONTEND_URL') }}" 
          class="btn btn-primary visit_site_button round_and_bigger" 
          title="visit public site" 
          aria-label="visit public site">
          <i class="bi bi-link-45deg"></i>
        </a>
        <h3>Front-end</h3>
        <div class="text-center visit_site_button_label">visit the site</div>
      </div>

    </div>
  </div>

</div>
@endsection