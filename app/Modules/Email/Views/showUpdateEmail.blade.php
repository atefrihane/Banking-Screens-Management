@extends('partials.layout')
@section('pageTitle')
Add Email
@endsection
@section('content')
<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('updateEmail' , $email) }}
                </div>


            </div>
        </div>
    </div>



    <section class="content mt-5">
        <div class="container-fluid">
            
            @livewire('email.show-update-email' , ['email' => $email])
        </div>
    </section>

</div>

@endsection

@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

@endpush
