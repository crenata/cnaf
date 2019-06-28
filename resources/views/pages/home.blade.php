@extends('template')

@section('title', 'Home')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen480px.css') }}" media="screen and (min-width: 1px) and (max-width: 480px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen576px.css') }}" media="screen and (min-width: 481px) and (max-width: 576px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen768px.css') }}" media="screen and (min-width: 577px) and (max-width: 768px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen992px.css') }}" media="screen and (min-width: 769px) and (max-width: 992px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200px.css') }}" media="screen and (min-width: 993px) and (max-width: 1200px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200pxup.css') }}" media="screen and (min-width: 1201px)">

    {{ Html::style('public/plugin/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}
    {{ Html::style('public/plugin/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}
@endsection

@section('content')
    <div class="banner d-flex" id="banner">
        <div class="container align-self-center">
            <div class="banner-content">
                <h1 class="text-white">Kebutuhan apapun, Leasing dibuat jadi mudah</h1>
            </div>
        </div>
    </div>

    <div class="simulasi py-4">
        <div class="container">
            <form class="simulasi-content rounded">
                <h3>Kredit Multi Guna CIMB Niaga Auto Finance</h3>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select name="car_region_id" id="simulasi-car-region" class="form-control" required="">
                            <option value="">Asal Daerah</option>
                            @foreach($carRegions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select name="car_brand_id" id="simulasi-car-brand" class="form-control" required="">
                            <option value="">Pilih Wilayah Dulu</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select name="car_type_id" id="simulasi-car-type" class="form-control" required="">
                            <option value="">Pilih Merk Dulu</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <button class="btn reset mt-3 px-xl-4 px-lg-4 px-md-3" type="reset">Reset &emsp; <i class="fas fa-redo-alt"></i></button>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 clearfix">
                        <button class="bg-881a1b btn-simulasi btn mt-3 float-right font-weight-bold px-xl-4 px-lg-4 px-md-3">Simulasikan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="lima-item">
        <div class="container">
            <div class="clearfix">
                <div class="item float-left d-flex justify-content-center">
                    <div class="item-image-content text-center">
                        <img src="{{ asset('public/images/home/logo1.jpg') }}" alt="">
                    </div>
                    <h5 class="font-weight-bold mt-5 text-center">Persyaratan Mudah</h5>
                    <p class="text-center mt-3">Solusi pembiayaan dengan jaminan BPKB kendaraan bermotor roda empat dengan ringan, cepat, dan aman.</p>
                </div>

                <div class="item float-left d-flex justify-content-center">
                    <div class="item-image-content text-center">
                        <img src="{{ asset('public/images/home/logo2.jpg') }}" alt="">
                    </div>
                    <h5 class="font-weight-bold mt-5 text-center">Proses Cepat</h5>
                    <p class="text-center mt-3">Garansi <b>"1 jam kepastian"</b> kredit nasabah perorangan secara prinsip saat pengajuan kredit multiguna maupun KPM.</p>
                </div>

                <div class="item float-left d-flex justify-content-center">
                    <div class="item-image-content text-center">
                        <img src="{{ asset('public/images/home/logo3.jpg') }}" alt="">
                    </div>
                    <h5 class="font-weight-bold mt-5 text-center">Aman</h5>
                    <p class="text-center mt-3">Pelayanan yang diberikan kepada pelanggan berada di bawah pengawasan Otoritas Jasa Keuangan.</p>
                </div>

                <div class="item float-left d-flex justify-content-center">
                    <div class="item-image-content text-center">
                        <img src="{{ asset('public/images/home/logo4.jpg') }}" alt="">
                    </div>
                    <h5 class="font-weight-bold mt-5 text-center">Bunga Bersaing</h5>
                    <p class="text-center mt-3">Suku bunga sangat bersaing dengan pembayaran sudah terjalin dengan bank CIMB.</p>
                </div>

                <div class="item float-left d-flex justify-content-center">
                    <div class="item-image-content text-center">
                        <img src="{{ asset('public/images/home/logo5.jpg') }}" alt="">
                    </div>
                    <h5 class="font-weight-bold mt-5 text-center">Limit Hingga 80%</h5>
                    <p class="text-center mt-3">Limit kredit hingga 80% dari nilai jaminan dan jangka waktu cicilan yang fleksibel dari 1-4 tahun.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider mb-5">
        <div class="container">
            <div class="text-center">
                <h4 class="font-weight-bold text-danger">Dapatkan Penawaran Menarik dari Merchant Kerjasama Kami!</h4>
                <div class="loop owl-carousel owl-theme mt-4">
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190621-IMAGE-2a2c573c88ad8af06d2080c21fb282155d0c4095a7848.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190621-IMAGE-596c89b759a0d5f7607bcb5cc92d3e655d0c407e3587c.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190624-IMAGE-7c25e09888e0f1069a1dafcae2eaca985d1088adf14f8.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190621-IMAGE-2a2c573c88ad8af06d2080c21fb282155d0c4095a7848.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190621-IMAGE-596c89b759a0d5f7607bcb5cc92d3e655d0c407e3587c.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190624-IMAGE-7c25e09888e0f1069a1dafcae2eaca985d1088adf14f8.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="http://localhost/storage/cnaf/vendors/CNAF-20190624-IMAGE-7c25e09888e0f1069a1dafcae2eaca985d1088adf14f8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner2 d-flex">
        <div class="container align-self-center">
            <div class="banner2-content text-center">
                <h1 class="text-white font-weight-bold">Leasing mobil bersama sobat CNAF</h1>
                <h2 class="text-white mt-5">Kesempatan tidak datang dua kali</h2>
                <p class="text-white mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur cumque distinctio eaque eos et explicabo fugiat laudantium minus modi molestias.</p>
                <a href="#" class="bg-881a1b btn py-xl-3 py-lg-3 py-md-2 px-xl-5 px-lg-5 px-md-4 mt-xl-5 mt-lg-4 mt-md-3 font-weight-bold">Pelajari Lebih Lanjut &emsp; <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="proses-leasing">
        <div class="container">
            <div class="text-center">
                <h1 class="font-weight-bold">Proses Leasing di sobat CNAF</h1>
                <p class="mt-xl-5 mt-lg-4 mt-md-3">Masih baru dalam leasing? Jangan khawatir, kami bisa menjelaskannya dengan mudah</p>
            </div>
            <div class="row mt-xl-5 mt-lg-4 mt-md-3">
                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/proses1.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 1</h6>
                            <h4 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Simulasi</h4>
                        </div>
                        <p class="text-justify mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae cum deleniti, dolores eveniet, ipsam laborum mollitia necessitatibus nemo nesciunt, odit officia officiis quidem saepe velit veniam voluptatum. Dicta, tenetur!</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/proses2.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 2</h6>
                            <h4 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Pengajuan Kredit</h4>
                        </div>
                        <p class="text-justify mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae cum deleniti, dolores eveniet, ipsam laborum mollitia necessitatibus nemo nesciunt, odit officia officiis quidem saepe velit veniam voluptatum. Dicta, tenetur!</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/proses3.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 3</h6>
                            <h4 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Kunjungan oleh CNAF</h4>
                        </div>
                        <p class="text-justify mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae cum deleniti, dolores eveniet, ipsam laborum mollitia necessitatibus nemo nesciunt, odit officia officiis quidem saepe velit veniam voluptatum. Dicta, tenetur!</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/proses4.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 4</h6>
                            <h4 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Uang Cair</h4>
                        </div>
                        <p class="text-justify mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae cum deleniti, dolores eveniet, ipsam laborum mollitia necessitatibus nemo nesciunt, odit officia officiis quidem saepe velit veniam voluptatum. Dicta, tenetur!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner3 d-flex">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div class="text-center p-0 m-0">
                        <h6 class="text-white">Masih ada pertanyaan?</h6>
                        <a href="{{ route('faq') }}" class="bg-881a1b btn py-xl-3 py-lg-3 py-md-2 px-xl-5 px-lg-5 px-md-4 mt-4 font-weight-bold">Halaman FAQ &emsp; <i class="fas fa-arrow-right"></i></a>
                        <p class="text-white mt-4 mb-0">atau <a href="#" class="text-white font-weight-bold"><ins>kontak kami</ins></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="article">
        <div class="container">
            <div class="text-center">
                <h1 class="font-weight-bold">Artikel</h1>
            </div>
            <div class="row">
                @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                        <div class="col-md-4 mt-4">
                            <a href="#" class="text-decoration-none d-block text-body">
                                <div class="card shadow mt-xl-3 mt-lg-2 mt-md-1">
                                    <img src="{{ $blog->image }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->name }}</h5>
                                        <div class="card-text">{!! $blog->body !!}</div>
                                        <a href="#" class="btn bg-881a1b py-xl-3 py-lg-2 py-md-1 px-xl-5 px-lg-4 px-md-3 font-weight-bold selengkapnya">Selengkapnya &emsp; <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
{{--                @else--}}
                @endif
            </div>
            <div class="text-center my-5">
                <a href="#" class="btn btn-lg bg-outline-881a1b py-xl-2 py-lg-1 py-md-1 py-sm-1 py-2 px-xl-4 px-lg-3 px-md-2 px-sm-2 px-2">Lihat Semua</a>
            </div>
        </div>
    </div>

    <div class="banner4 d-flex">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 align-self-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('public/images/home/app.png') }}" alt="" class="hp">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12 align-self-center">
                    <div class="text-white mb-md-3 mb-2">
                        <h6 class="font-weight-bold">DOWNLOAD APLIKASI KAMI</h6>
                        <h2 class="mt-3">Permudah hidupmu, sekarang.</h2>
                        <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur cumque distinctio eaque eos et explicabo fugiat laudantium minus modi molestias.</p>
                        <img src="{{ asset('public/images/home/google-play-badge.png') }}" alt="" class="mt-xl-4 mt-lg-4 mt-md-4 mt-sm-3 mt-3 p-0 google-play">
                    </div>
                    <a href="#" class="text-white">PUNYA PERTANYAAN? HUBUNGI KAMI &emsp; <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="image-bottom my-xl-5 my-lg-5 my-md-4 my-sm-4 my-4">
        <div class="container">
            <img src="{{ asset('public/images/home/logo.png') }}" width="320" class="" alt="">
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script('public/plugin/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}

    <script type="text/javascript">
        $('.loop').owlCarousel({
            center: true,
            items: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });

        /* Region Selected */
        $('#simulasi-car-region').change(function() {
            $.ajax({
                type: 'GET',
                url: 'simulasi/carbrand/' + $(this).val(),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#simulasi-car-brand').replaceWith(
                            "<select name='car_brand_id' id='simulasi-car-brand' class='form-control' required=''>" +
                                "<option value=''>Merk Mobil</option>"
                        );
                        $.each(data, function(index, value) {
                            console.log(value);
                            $('#simulasi-car-brand').append(
                                "<option value='" + value.id + "'>" + value.name + "</option>"
                            );
                        });
                        $('#simulasi-car-brand').append("</select>");

                        $('#simulasi-car-brand').change(function() {
                            $.ajax({
                                type: 'GET',
                                url: 'simulasi/cartype/' + $(this).val(),
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    if (data.errors) {

                                    } else {
                                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                                        $('#simulasi-car-type').replaceWith(
                                            "<select name='car_type_id' id='simulasi-car-type' class='form-control' required=''>" +
                                            "<option value=''>Type Mobil</option>"
                                        );
                                        $.each(data, function(index, value) {
                                            console.log(value);
                                            $('#simulasi-car-type').append(
                                                "<option value='" + value.id + "'>" + value.name + "</option>"
                                            );
                                        });
                                        $('#simulasi-car-type').append("</select>");
                                    }
                                },
                                error: function(data) {
                                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                                }
                            });
                        });
                    }
                },
                error: function(data) {
                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });
        });
    </script>
@endsection