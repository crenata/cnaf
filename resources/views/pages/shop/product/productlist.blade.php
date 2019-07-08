@extends('template')

@section('title', 'Shop')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/productlist/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/productlist/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/productlist/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/productlist/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/productlist/xl.css') }}" media="screen and (min-width: 1200px)">

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
            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                <h6 class="font-weight-bold">Product Categories</h6>
                <ul class="file-tree ml-0">
                    @foreach($vendors as $vendor)
                        <li class="{{ $currentVendor->id == $vendor->id ? 'open' : '' }}">
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
            <div class="col-12 col-sm-8 col-md-9 col-lg-9 col-xl-9">
                @if(count($items) > 0)
                    <div class="change-view col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-4 col-sm-2 col-md-1 col-lg-1 col-xl-1">
                                <button class="btn btn-dark btn-show-grid3">3</button>
                            </div>
                            <div class="col-4 col-sm-2 col-md-1 col-lg-1 col-xl-1">
                                <button class="btn btn-info btn-show-grid4">4</button>
                            </div>
                            <div class="col-4 col-sm-2 col-md-1 col-lg-1 col-xl-1">
                                <button class="btn btn-primary btn-show-list">List</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row items">
                    @if(count($items) > 0)
                        @foreach($items as $item)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 text-center">
                                @if($item->price_after_discount != null || $item->price_after_discount != 0)
                                    <a href="{{ route('item.detail', ['slug' => $currentVendor->slug, 'slugbrand' => $currentBrand->slug, 'slugitem' => $item->slug]) }}" class="d-block text-decoration-none mt-4 item-content">
                                        <div class="ui black label">-{{ ceil((($item->normal_price - $item->price_after_discount) / $item->normal_price) * 100) }}%</div>
                                        <img src="{{ $item->image1 }}" alt="" class="img-fluid">
                                        <div class="text-left mt-4">
                                            <h6 class="text-black-50">{{ $item->name }}</h6>
                                            <p class="text-black-50 m-0"><del>Rp. {{ number_format($item->normal_price) }}</del></p>
                                            <p class="text-body">Rp. {{ number_format($item->price_after_discount) }}</p>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('item.detail', ['slug' => $currentVendor->slug, 'slugbrand' => $currentBrand->slug, 'slugitem' => $item->slug]) }}" class="d-block text-decoration-none mt-4 item-content">
                                        <img src="{{ $item->image1 }}" alt="" class="img-fluid">
                                        <div class="text-left mt-4">
                                            <h6 class="text-black-50">{{ $item->name }}</h6>
                                            <p class="text-body m-0">Rp. {{ number_format($item->normal_price) }}</p>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 d-flex justify-content-center">
                            <h5 class="font-weight-bold">Now, Products is not available</h5>
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    <div class="">{{ $items->links() }}</div>
                </div>
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

        $('.btn-show-grid3').click(function () {
            $('.items').children().addClass('col-xl-4').removeClass('col-xl-3 col-xl-12');
        });
        $('.btn-show-grid4').click(function () {
            $('.items').children().addClass('col-xl-3').removeClass('col-xl-4 col-xl-12');
        });
        $('.btn-show-list').click(function () {
            $('.items').children().addClass('col-xl-12').removeClass('col-xl-3 col-xl-4');
        });
    </script>
@endsection