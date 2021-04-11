@extends('partials.layout')
@section('pageTitle')
Networks
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('home') }}
                </div>

                <div class="col-sm-6 text-md-right">
            
                    <a href="{{route('showAddNetwork')}}" class="btn btn-primary">Add a network</a>
             



                </div>
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" >


            @livewire('network.show-networks')


            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush