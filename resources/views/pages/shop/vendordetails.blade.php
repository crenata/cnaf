@extends('template')

@section('title', 'Shop')

{{--@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection--}}

@section('content-container')
    <nav aria-label="breadcrumb" class="mt-4 bg-white">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-decoration-none text-danger">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $vendor->name }}</li>
        </ol>
    </nav>

    <div class="vendor-image text-center mt-4">
        <img src="{{ $vendor->image_logo }}" alt="" class="w-25">
    </div>
    <div class="brands mb-4">
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 text-center">
                    <a href="{{ route('products', ['slug' => $vendor->slug, 'slugbrand' => $brand->slug]) }}" class="d-block text-decoration-none mt-4">
                        <img src="{{ $brand->image }}" alt="" class="img-fluid">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection