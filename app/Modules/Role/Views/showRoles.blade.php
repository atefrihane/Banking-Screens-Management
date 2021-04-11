@extends('partials.layout')
@section('pageTitle')
Show roles
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('roles') }}
            </div>

            <div class="col-sm-6 text-md-right">
            <a href="{{route('showAddRole')}}" class="btn btn-primary">Add a role</a>
               
                </div>
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">
      @livewire('role.show-roles')
    
    </div>
  </section>

</div>

@endsection

@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush