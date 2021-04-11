@extends('partials.layout')
@section('pageTitle')
Show images
@endsection
@section('content')
<div class="content-wrapper">



  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
    
            <div class="col-sm-6">
              {{ Breadcrumbs::render('showImages') }}
            </div>

            <div class="col-sm-6 text-md-right">
            <a href="{{route('showAddMedia')}}" class="btn btn-primary">Add Image</a>
               
                </div>
        </div>
    </div>
</div>



  <section class="content mt-5">
    <div class="container-fluid">
      @livewire('media.show-photos')
    
    </div>
  </section>

</div>

@endsection

@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>

<!-- 3. Instantiate clipboard by passing a HTML element -->
<script>
var clipboard = new Clipboard('.btn');
clipboard.on('success', function(e) {
    console.log(e);
});
clipboard.on('error', function(e) {
    console.log(e);
});
</script>
@endpush