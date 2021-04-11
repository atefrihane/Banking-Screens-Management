@extends('partials.layout')
@section('pageTitle')
Emails
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showEmails') }}
                </div>

                <div class="col-sm-6 text-md-right">
                    <a href="{{route('showAddEmail')}}" class="btn btn-primary">Add Email</a>
                       
                        </div>
               

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid">


            @livewire('email.show-emails')


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')

<script src="{{asset('/js/livewire_listeners.js')}}"></script>
@endpush