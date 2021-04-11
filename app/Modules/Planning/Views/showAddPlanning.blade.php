@extends('partials.layout')
@section('pageTitle')
Add a planning
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addPlanning') }}
                </div>

      

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid">


            @livewire('planning.show-add-planning')


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')

<script src="{{asset('/js/livewire_listeners.js')}}"></script>
@endpush