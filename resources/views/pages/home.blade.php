@extends('template')

@section('title', 'Home')

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
                @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                        <div class="col-md-4 mt-4">
                            <a href="#" class="text-decoration-none d-block text-body">
                                <div class="card shadow mt-xl-3 mt-lg-2 mt-md-1">
                                    <img src="{{ $blog->image }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->name }}</h5>
                                        <p class="card-text">{!! $blog->body !!}</p>
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