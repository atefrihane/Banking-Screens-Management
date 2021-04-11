@extends('partials.layout')
@section('pageTitle')
Update user
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('addUser') }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
       
            @livewire('user.show-update-user', ['user' => $user])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush
