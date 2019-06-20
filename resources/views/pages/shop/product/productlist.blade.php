@extends('template')

@section('title', 'Shop')

@section('stylesheets')
    {{--<link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">--}}

    {{ Html::style('public/plugin/tree-view-file-explorer/css/file-explore.css') }}
@endsection

@section('content-container')
    <nav aria-label="breadcrumb" class="mt-4 bg-white">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-decoration-none text-danger">Shop</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.vendor.show', $currentVendor->slug) }}" class="text-decoration-none text-danger">{{ $currentVendor->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $currentBrand->name }}</li>
        </ol>
    </nav>

    <div class="brands mb-4">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-3">
{{--                <h5 class="font-weight-bold">Filter</h5>--}}
                <h5 class="font-weight-bold">Product Categories</h5>
                <ul class="file-tree ml-0">
                    @foreach($vendors as $vendor)
                        <li>
                            <a href="#">{{ $vendor->name }}</a>
                            <ul>
                                @foreach($vendor->brands as $brand)
                                    <li><a href="{{ route('products', ['slug' => $vendor->slug, 'slugbrand' => $brand->slug]) }}">{{ $brand->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-9">
                @foreach($items as $item)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 text-center">
                        <a href="{{ route('products', ['slug' => $currentVendor->slug, 'slugbrand' => $currentBrand->slug]) }}" class="d-block text-decoration-none mt-4">
                            <img src="{{ $item->image1 }}" alt="" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script('public/plugin/tree-view-file-explorer/js/file-explore.js') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $(".file-tree").filetree();
        });
    </script>
@endsection