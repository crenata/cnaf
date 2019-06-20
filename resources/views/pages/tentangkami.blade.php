@extends('template')

@section('title', 'Tentang Kami')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <div class="banner d-flex">
        <div class="banner-content align-self-center col-10 col-sm-10 col-md-9 col-lg-8 col-xl-7 pl-lg-5 pl-xl-5">
            <h2 class="font-weight-bold text-white">Tentang Kami</h2>
            <p class="text-white"><b>CIMB Niaga Auto Finance</b> senantiasa berusaha melakukan yang terbaik untuk meningkatkan kenyamanan Nasabah dan memastikan bahwa keluhan Anda diselesaikan dengan cepat dan efisien.</p>
            <a href="#" class="btn rounded-pill bg-881a1b font-weight-bold">Cari tau lebih lanjut</a>
        </div>
    </div>

    <div class="story text-justify mt-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-5">
        <h4 class="text-danger font-weight-bold">SEJARAH KAMI</h4>
        <div class="info clearfix">
            <img src="{{ asset('public/images/tentangkami/cimb.jpg') }}" alt="" class="float-none float-sm-right float-md-right float-lg-right float-xl-right pl-0 pl-sm-4 pl-md-4 pl-lg-4 pl-xl-4">
            <p class="mt-3 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0">PT CIMB Niaga Auto Finance ("CNAF" atau "Perusahaan") didirikan pada 10 Desember 1981 dengan nama PT Saseka Gelora Leasing. Pada Juli 1993, Perusahaan kemudian berganti nama menjadi PT Saseka Gelora Finance dengan fokus bisnis adalah sewa guna usaha.</p>
            <p>Pada tahun 1996, PT Bank CIMB Niaga Tbk (dahulu PT Bank Niaga Tbk) menjadi pemegang saham mayoritas Perusahaan dengan 79.65% kepemilikan saham dan pada tahun 2007 PT Bank CIMB Niaga Tbk (“CIMB Niaga”) kembali menambah porsi kepemilikannya menjadi 95,91%. Pada Oktober 2009, seiring dengan rencana PT Bank CIMB Niaga Tbk untuk lebih serius menggarap bisnis bisnis pembiayaan, Perusahaan melakukan transformasi dengan melakukan perubahan pada fokus bisnis dari sewa guna usaha menjadi pembiayaan konsumen, khususnya kendaraan bermotor. Pada Agustus 2010, Perusahaan berganti nama menjadi PT CIMB Niaga Auto Finance. Perubahan nama ini juga disertai dengan perubahan logo Perusahaan.</p>
            <p>Pada tengah tahun 2015, CIMB Niaga selaku pemegang saham mayoritas dari CNAF dan PT Kencana Internusa Artha Finance (“KITAF”) telah memutuskan untuk melakukan penggabungan kedua bisnis kendaraan bermotor dengan segmen usaha yang sama tersebut, dimana CNAF bertindak sebagai perusahaan penerima penggabungan. Rencana tersebut mendapat persetujuan dari Otoritas Jasa Keuangan (OJK) pada 19 November 2015, kemudian disusul oleh persetujuan pemegang saham lewat Rapat Umum Pemegang Saham (RUPS) Luar Biasa pada 23 Desember 2015 dan dari Kementrian Hukum dan Hak Asasi Manusia pada 23 Desember 2015. Penggabungan antara CNAF dan KITAF berlaku efektif per 1 Januari 2016.</p>
        </div>
    </div>
@endsection