@extends('partials.layout')
@section('pageTitle')
Plannings
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showPlannings') }}
                </div>

                <div class="col-sm-6 text-md-right">
                    <a href="{{route('showAddPlanning')}}" class="btn btn-primary">Add Planning</a>
                       
                        </div>
               

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid">


            @livewire('planning.show-plannings')


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')

<script src="{{asset('/js/livewire_listeners.js')}}"></script>
@endpush