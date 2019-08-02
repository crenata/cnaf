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
                <h1 class="text-white">Apapun kebutuhan Anda, <br> CNAF membantu mewujudkannya</h1>
            </div>
        </div>
    </div>

    <div class="simulasi py-4">
        <div class="container">
            {{ Form::open(array('route' => 'simulasi.from.home', 'class' => 'simulasi-content rounded')) }}
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
            {{ Form::close() }}
        </div>
    </div>

    <div class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="item text-center">
                        <div class="item-image-content">
                            <img src="{{ asset('public/images/home/logo1.jpg') }}" alt="" width="100">
                        </div>
                        <h5 class="font-weight-bold mt-5">Persyaratan Mudah</h5>
                        <p class="mt-3">Persyaratan Ringan, Proses Cepat, Suku Bunga Bersaing dan Aman</p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="item text-center">
                        <div class="item-image-content">
                            <img src="{{ asset('public/images/home/logo5.jpg') }}" alt="" width="100">
                        </div>
                        <h5 class="font-weight-bold mt-5">Limit Hingga 80%</h5>
                        <p class="mt-3">Batas pagu kredit hingga 80% dari nilai kendaraan</p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="item text-center">
                        <div class="item-image-content">
                            <img src="{{ asset('public/images/home/time.png') }}" alt="" width="100">
                        </div>
                        <h5 class="font-weight-bold mt-5">Jangka Waktu Fleksible</h5>
                        <p class="mt-3">Jangka waktu pinjaman fleksible hingga 4 tahun</p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                    <div class="item text-center">
                        <div class="item-image-content">
                            <img src="{{ asset('public/images/home/fast-coin.png') }}" alt="" width="100">
                        </div>
                        <h5 class="font-weight-bold mt-5">Proses Cepat</h5>
                        <p class="mt-3">Pencairan Dana Cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider mb-5">
        <div class="container">
            <div class="text-center">
                <h4 class="font-weight-bold text-danger">Wujudkan impian Anda dengan berbagai penawaran spesial dari rekanan kami</h4>
                <div class="loop owl-carousel owl-theme mt-4">
                    @foreach($vendors as $vendor)
                        <div class="item">
                            <a href="{{ route('shop.vendor.show', $vendor->slug) }}" class="">
                                <img src="{{ $vendor->image }}" alt="">
                            </a>
                        </div>
                    @endforeach
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
                <h3 class="font-weight-bold">Langkah mudah memanfaatkan Kredit Multi Guna melalui Sobat CNAF</h3>
            </div>
            <div class="row mt-xl-5 mt-lg-4 mt-md-3">
                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/simulasi.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 1</h6>
                            <h6 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Simulasi</h6>
                        </div>
                        <p class="text-justify mt-4">Untuk mengetahui nilai kendaraan, maksimum pagu kredit, besarnya cicilan dll. Silahkan isi data kendaraan Anda dan sesuaikan kebutuhan finansial Anda pada table simulasi, Silahkan sesuai jangka waktu cicilan dengan kebutuhan dan kemampuan Anda.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/credit.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 2</h6>
                            <h6 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Pengajuan</h6>
                        </div>
                        <p class="text-justify mt-4">Apabila sudah sesuai dengan kebutuhan Anda, silahkan isi formulir pengajuan kredit sesuai petunjuk. Pastikan Anda mengisi data dengan lengkap dan benar. Pastikan juga Anda melampirkan (unggah/upload) dokumentasi yang diminta. Bila sudah, silahkan klik tombol pengajuan kredit. Anda dapat melihat status pengajuan Anda pada website sobatcnaf.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/verify.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 3</h6>
                            <h6 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Persetujuan dan Verifikasi</h6>
                        </div>
                        <p class="text-justify mt-4">CIMB Niaga Auto Finance akan melakukan proses pengajuan kredit Anda sesuai dengan ketentuan. Setelah disetujui, Anda akan dihubungi untuk jadwal kunjungan untuk verifikasi dokumen dan penandatanganan kontrak. Pastikan Anda telah menyiapkan dokumen kendaraan yang disyaratkan serta dokumen pendukung.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 item">
                    <div class="text-center">
                        <img src="{{ asset('public/images/home/money.png') }}" alt="" class="img-fluid">
                        <div class="text-center">
                            <h6 class="font-weight-bold text-danger">Tahap 4</h6>
                            <h6 class="font-weight-bold mt-xl-3 mt-lg-2 mt-md-1">Pencairan Dana</h6>
                        </div>
                        <p class="text-justify mt-4">Setelah kontrak kredit ditandatangani dan dokumen dilengkapi, CIMB Niaga Auto Finance akan segera mencairkan dana Anda. Selamat memenuhi impian / Kebutuhan Anda.</p>
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
                        <p class="text-white mt-4 mb-0">atau <a href="{{ route('contact') }}" class="text-white font-weight-bold"><ins>kontak kami</ins></a></p>
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
                                        <div class="card-text">{{ substr(strip_tags($blog->body), 0, 300) }}{{ strlen(strip_tags($blog->body)) > 300 ? "..." : "" }}</div>
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
                <a href="{{ route('articles') }}" class="btn btn-lg bg-outline-881a1b py-xl-2 py-lg-1 py-md-1 py-sm-1 py-2 px-xl-4 px-lg-3 px-md-2 px-sm-2 px-2">Lihat Semua</a>
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
