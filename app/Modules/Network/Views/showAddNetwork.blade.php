@extends('partials.layout')
@section('pageTitle')
Add network
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addNetwork') }}
                </div>

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" >


            @livewire('network.show-add-network')


            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush