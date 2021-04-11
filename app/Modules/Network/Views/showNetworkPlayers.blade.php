@extends('partials.sublayout')
@section('pageTitle')
{{$network->name}} players
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showNetworkPlayers',$network) }}
                </div>


                <div class="col-sm-6 text-md-right">
            
                    <a href="{{route('showAddNetworkPlayer',$network)}}" class="btn btn-primary">Add a player</a>
             



                </div>

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" >


            @livewire('network.show-network-players' , ['network' => $network])


            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush