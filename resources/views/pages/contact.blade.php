@extends('template')

@section('title', 'Home')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/contact/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/contact/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/contact/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/contact/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/contact/xl.css') }}" media="screen and (min-width: 1200px)">

    {{ Html::style('public/plugin/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}
    {{ Html::style('public/plugin/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}
@endsection

@section('content')
    <div class="banner">

    </div>

    <div class="contact">
        <div class="container">
            <div class="row no-gutters shadow">
                <div class="col-6">
                    {{ Form::open(array('route' => 'home', 'class' => 'contact-content rounded-left')) }}
                        <h5>Formulir Kontak</h5>
                        <div class="mt-3">
                            {{ Form::text('name', null, array('class' => 'form-control mt-2', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Name')) }}
                            {{ Form::email('email', null, array('class' => 'form-control mt-2', 'id' => 'add-email', 'required' => '', 'placeholder' => 'Email')) }}
                            {{ Form::text('phone', null, array('class' => 'form-control mt-2', 'id' => 'add-phone', 'placeholder' => 'Nomor Telepon (Opsional)')) }}
                            {{ Form::textarea('message', null, array('class' => 'form-control mt-2', 'id' => 'add-message', 'required' => '', 'placeholder' => 'Message', 'rows' => '5')) }}
                            <div class="text-center mt-3">
                                {{ Form::submit('Kirim', array('class' => 'btn bg-881a1b')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col-6">
                    <div id="map" class="h-100 rounded-right"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="image-bottom p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4" style="background-color: #F2F2F2; margin-top: 10rem;">
        <div class="container">
            <img src="{{ asset('public/images/home/logo.png') }}" width="320" class="" alt="">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // This example displays a map with the language and region set
        // to Japan. These settings are specified in the HTML script element
        // when loading the Google Maps JavaScript API.
        // Setting the language shows the map in the language of your choice.
        // Setting the region biases the geocoding results to that region.
        function initMap() {
            let apl = {lat: -6.1763, lng: 106.791803};
            let map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: apl
            });
            let marker = new google.maps.Marker({
                position: apl,
                map: map
            })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer>
    </script>
@endsection