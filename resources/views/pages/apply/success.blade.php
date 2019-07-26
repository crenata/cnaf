@extends('template')

@section('title', 'Success Apply')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <div class="text-center rounded shadow border my-5 p-5" style="background-color: #F2F2F2;">
        <h3 class="font-weight-bold">Pendaftaran Berhasil</h3>
        <p class="mt-4">Email telah dikirimkan ke <b>{{ $user->email }}</b></p>
        <p class="mt-4 mb-0">Mohom konfirmasikan email Anda untuk melengkapi proses pendaftaran dan pengajuan.</p>
        <p class="mt-2">Periksa Juga spam / junk Anda, jika belum menerima email.</p>
    </div>
@endsection