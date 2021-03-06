<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SobatCNAF - Home</title>

    {{--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen480px.css') }}" media="screen and (min-width: 1px) and (max-width: 480px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen576px.css') }}" media="screen and (min-width: 481px) and (max-width: 576px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen768px.css') }}" media="screen and (min-width: 577px) and (max-width: 768px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen992px.css') }}" media="screen and (min-width: 769px) and (max-width: 992px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200px.css') }}" media="screen and (min-width: 993px) and (max-width: 1200px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200pxup.css') }}" media="screen and (min-width: 1201px)">

    {{ Html::style('public/plugin/bootstrap-4.3.1/dist/css/bootstrap.css') }}
    {{ Html::style('public/plugin/fontawesome-free-5.9.0-web/css/all.css') }}

    {{ Html::script('public/js/jquery-3.4.0.min.js') }}
    {{ Html::script('public/js/popper.min.js') }}

    <style>
        html {
            font-family: 'Open Sans', sans-serif !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0" style="background-color: white;">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('public/images/home/logo.png') }}" width="220" class="" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mr-auto"></ul>
                <ul class="navbar-nav">
                    {{--<li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Simulasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Masuk</a>
                    </li>
                    <li class="nav-item btn btn-danger ml-2">
                        <a class="nav-link px-2 py-0 text-white" href="#">Daftar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="banner d-flex" id="banner">
        <div class="container align-self-center">
            <div class="banner-content">
                <h1 class="text-white">Kebutuhan apapun, Leasing dibuat jadi mudah</h1>
            </div>
        </div>
    </div>

    <div class="simulasi py-4">
        <div class="container">
            <div class="simulasi-content rounded">
                <h3>Kredit Multi Guna CIMB Niaga Auto Finance</h3>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select class="form-control">
                            <option value="">Pabrik Produksi</option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select class="form-control">
                            <option value="">Pilih Modek</option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 mt-3">
                        <select class="form-control">
                            <option value="">Asal Daerah</option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <button class="btn reset mt-3 px-xl-4 px-lg-4 px-md-3">Reset &emsp; <i class="fas fa-redo-alt"></i></button>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 clearfix">
                        <button class="bg-881a1b btn-simulasi btn mt-3 float-right font-weight-bold px-xl-4 px-lg-4 px-md-3">Simulasikan</button>
                    </div>
                </div>
            </div>
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
                        <a href="#" class="bg-881a1b btn py-xl-3 py-lg-3 py-md-2 px-xl-5 px-lg-5 px-md-4 mt-4 font-weight-bold">Halaman FAQ &emsp; <i class="fas fa-arrow-right"></i></a>
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
                <div class="col-md-4 mt-4">
                    <a href="#" class="text-decoration-none d-block text-body">
                        <div class="card shadow mt-xl-3 mt-lg-2 mt-md-1">
                            <img src="{{ asset('public/images/home/artikel1.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">CNAF RAIH PENGHARGAAN "INDONESIA MULTIFINANCE CONSUMER CHOICE AWARD 2018"</h5>
                                <p class="card-text">PT CIMB Niaga Auto Finance (CNAF) berhasil meraih penghargaan di ajang Warta Ekonomi yaitu "Indonesia Multifinance Consumer Choice...</p>
                                <a href="#" class="btn bg-881a1b py-xl-3 py-lg-2 py-md-1 px-xl-5 px-lg-4 px-md-3 font-weight-bold selengkapnya">Selengkapnya &emsp; <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mt-4">
                    <a href="#" class="text-decoration-none d-block text-body">
                        <div class="card shadow mt-xl-3 mt-lg-2 mt-md-1">
                            <img src="{{ asset('public/images/home/artikel2.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">CIMB NIAGA AUTO FINANCE LUNCURKAN "CNAF VOLUNTEER"</h5>
                                <p class="card-text">"Renovasi Fasilitas Sekolah dan Kelas Literasi Keuangan untuk Anak Sekolah Dasar"...</p>
                                <a href="#" class="btn bg-881a1b py-xl-3 py-lg-2 py-md-1 px-xl-5 px-lg-4 px-md-3 font-weight-bold selengkapnya">Selengkapnya &emsp; <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mt-4">
                    <a href="#" class="text-decoration-none d-block text-body">
                        <div class="card shadow mt-xl-3 mt-lg-2 mt-md-1">
                            <img src="{{ asset('public/images/home/artikel3.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">CIMB NIAGA AUTO FINANCE TANDATANGANI KERJASAMA STRATEGIS DENGAN DUKCAPIL</h5>
                                <p class="card-text">PT CIMB Niaga Auto Finance (CNAF) berhasil meraih penghargaan di ajang Warta Ekonomi yaitu "Indonesia Multifinance Consumer Choice...</p>
                                <a href="#" class="btn bg-881a1b py-xl-3 py-lg-2 py-md-1 px-xl-5 px-lg-4 px-md-3 font-weight-bold selengkapnya">Selengkapnya &emsp; <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
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

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-7 col-7">
                    <h6 class="text-white font-weight-bold">sobat CNAF</h6>
                    <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3 row">
                        <div class="col-2 col-md-2">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-10 col-md-10 p-0">
                            <small class="">APL TOWER Central Park Floor 36th-Suite 3 <br> JL. Letjen S. Parman Kav.28 <br> Jakarta Barat - 11470</small>
                        </div>

                        <div class="col-2 col-md-2">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-10 col-md-10 p-0">
                            <small>info@sobatcnaf.com</small>
                        </div>

                        <div class="col-2 col-md-2">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="col-10 col-md-10 p-0">
                            <small>+6221 298 60770</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-5 col-5">
                    <h6 class="text-white font-weight-bold pull-right">Leasing</h6>
                    <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                        <p><a href="#" class="text-white"><small>Panduan Leasing</small></a></p>
                        <p><a href="#" class="text-white"><small>Simulasi Leasing</small></a></p>
                        <p><a href="#" class="text-white"><small>FAQ</small></a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-7 col-7">
                    <h6 class="text-white font-weight-bold">Lebih Banyak</h6>
                    <div class="info text-white mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                        <p><a href="#" class="text-white"><small>Tentang Kami</small></a></p>
                        <p><a href="#" class="text-white"><small>Artikel</small></a></p>
                        <p><a href="#" class="text-white"><small>Kegiatan</small></a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-2 col-sm-5 col-5">
                    <h6 class="text-white font-weight-bold">Hubungi Kami</h6>
                    <div class="info mt-xl-5 mt-lg-5 mt-md-4 mt-sm-3">
                        <a href="#"><img src="{{ asset('public/images/home/twitter.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/images/home/google.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/images/home/facebook.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('public/images/home/youtube.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container clearfix py-xl-2 py-lg-2 py-md-2 py-sm-0 py-0">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-12 d-flex justify-content-lg-start justify-content-md-start justify-content-sm-center justify-content-center">
                    <p class="text-white"><small>&copy;Sobat CNAF 2019 Rights Reserved</small></p>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-12 d-flex justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                    <div class="text-center">
                        <p class="float-lg-left float-md-left float-sm-left float-none"><a href="#" class="text-white"><small><b>Terms and Conditions</b></small></a></p>
                        <p class="float-lg-left float-md-left float-sm-left float-none ml-md-4 ml-sm-4 ml-0"><a href="#" class="text-white"><small><b>Complaints</b></small></a></p>
                        <p class="float-lg-left float-md-left float-sm-left float-none ml-md-4 ml-sm-4 ml-0"><a href="#" class="text-white"><small><b>Privacy Policy</b></small></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{ Html::script('public/plugin/bootstrap-4.3.1/dist/js/bootstrap.js') }}
{{ Html::script('public/plugin/fontawesome-free-5.9.0-web/js/all.js') }}
</body>
</html>