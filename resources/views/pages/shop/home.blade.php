@extends('template')

@section('title', 'Shop')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <h3 class="my-3">Paket Terbaik Hanya Untuk SobatCNAF</h3>
    <div class="vendors mb-4">
        @foreach($vendors as $index => $vendor)
            <a href="{{ route('shop.vendor.show', $vendor->slug) }}" class="d-block text-decoration-none mt-4">
                <h6 class="bg-881a1b p-3 m-0">{{ $index + 1 }}.&nbsp; {{ $vendor->name }}</h6>
                <img src="{{ $vendor->image }}" alt="" class="w-100">
            </a>
        @endforeach
    </div>
@endsection