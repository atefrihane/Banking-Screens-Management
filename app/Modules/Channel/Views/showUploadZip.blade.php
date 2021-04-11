@extends('partials.sublayout')
@section('pageTitle')
Upload zip
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showUploadChannelZip',$channel) }}
                </div>


               

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" id="app">


          <upload-zip :channel="{{$channel}}">  </upload-zip>


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')

<script src="{{mix('/js/file.js')}}"></script>
@endpush