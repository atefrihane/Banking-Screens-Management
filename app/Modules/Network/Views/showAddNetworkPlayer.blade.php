@extends('partials.sublayout')
@section('pageTitle')
Add player
@endsection
@section('content')
<div class="content-wrapper">

 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    {{ Breadcrumbs::render('showAddNetworkPlayer',$network) }}
                </div>


               

          
            </div>
        </div>
    </div>


    <section class="content mt-5">
        <div class="container-fluid" >


            @livewire('network.show-add-network-player' , ['network' => $network])


            
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script src="{{asset('/js/livewire_listeners.js')}}"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCiTrtbBkdCFAE9VH_1UkbagXjARDFDhlw&libraries=places&callback=initAutocomplete" type="text/javascript"></script>




<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
  
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            window.livewire.emit('set:location', {
                latitude : place.geometry['location'].lat() ,
                longitude : place.geometry['location'].lng(),
                name: $("#autocomplete").val()
      
            })
     

         
        });
    }
 </script>
@endpush