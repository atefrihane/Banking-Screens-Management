@extends('partials.layout')
@section('pageTitle')
Add media
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showAddMedia') }}
                </div>


               

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" id="app">


          <add-media>  </add-media>


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')

<script src="{{mix('/js/media.js')}}"></script>
@endpush