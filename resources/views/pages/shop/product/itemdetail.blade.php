@extends('template')

@section('title', 'Shop')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/itemdetail/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/itemdetail/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/itemdetail/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/itemdetail/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/itemdetail/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <nav aria-label="breadcrumb" class="mt-4 bg-white">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-decoration-none text-danger">Shop</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.vendor.show', $currentVendor->slug) }}" class="text-decoration-none text-danger">{{ $currentVendor->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products', ['slug' => $currentVendor->slug, 'slugbrand' => $currentBrand->slug]) }}" class="text-decoration-none text-danger">{{ $currentBrand->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $item->name }}</li>
        </ol>
    </nav>

    <div class="info">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                @if($item->price_after_discount != null || $item->price_after_discount != 0)
                    <div class="ui black label">-{{ ceil((($item->normal_price - $item->price_after_discount) / $item->normal_price) * 100) }}%</div>
                @endif
                <img src="{{ $item->image1 }}" alt="" class="w-100 info-image">
                <div class="picts d-flex justify-content-center mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                    <a href="" class="" style="width: 22%;"><img src="{{ $item->image1 }}" alt="" class="w-100 preview-image1" data-image="{{ $item->image1 }}"></a>
                    <a href="" class="ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2" style="width: 22%;"><img src="{{ $item->image2 }}" alt="" class="w-100 preview-image2" data-image="{{ $item->image2 }}"></a>
                    <a href="" class="ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2" style="width: 22%;"><img src="{{ $item->image3 }}" alt="" class="w-100 preview-image3" data-image="{{ $item->image3 }}"></a>
                    <a href="" class="ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2" style="width: 22%;"><img src="{{ $item->image4 }}" alt="" class="w-100 preview-image4" data-image="{{ $item->image4 }}"></a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 mt-4 mt-sm-4 mt-md-0 mt-lg-0 mt-xl-0">
                <h5 class="">{{ $item->name }}</h5>
                <div class="rating">
                    <ul class="list-unstyled d-inline-block">
                        @foreach(array(0, 1, 2, 3, 4) as $rating)
                            <li class="d-inline-block">
                                <i class="fas fa-star"></i>
                            </li>
                        @endforeach
                    </ul>
                    <p class="d-inline-block ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2 text-black-50">1 review</p>
                    <p class="d-inline-block ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2 text-black-50">Write a Review</p>
                </div>
                <div class="qty">
                    @if($item->qty == 1)
                        <p class="m-0">In Stock : {{ $item->qty }} Item</p>
                    @elseif($item->qty == null || $item->qty == 0)
                        <p class="m-0">In Stock : There is no item</p>
                    @else
                        <p class="m-0">In Stock : {{ number_format($item->qty) }} Items</p>
                    @endif
                </div>
                <div class="price">
                    @if($item->price_after_discount != null || $item->price_after_discount != 0)
                        <p class="text-black-50 d-inline-block"><del>Rp. {{ number_format($item->price_after_discount) }},-</del></p>
                        <h5 class="d-inline-block ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2">Rp. {{ number_format($item->normal_price) }},-</h5>
                    @else
                        <h5>Rp. {{ number_format($item->normal_price) }},-</h5>
                    @endif
                </div>
                <div class="add-to-cart mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                    <p class="d-inline-block">Quantity</p>
                    <input type="number" class="d-inline-block ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2 form-control w-25" min="1" max="{{ $item->qty }}">
                    <button class="btn bg-881a1b d-inline-block px-5 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2">Add to Cart</button>
                </div>
                <div class="compare mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                    <a href="#" class="text-decoration-none text-black-50 d-inline-block"><i class="far fa-heart"></i> Add to Wish list</a>
                    <a href="#" class="text-decoration-none text-black-50 d-inline-block ml-5 ml-sm-5 ml-md-5 ml-lg-5 ml-xl-5"><i class="fas fa-sliders-h"></i> Compare This Product</a>
                </div>
                <div class="share mt-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-4">
                    <p class="d-inline-block">Share On :</p>
                    <div class="social-media d-inline-block">
                        <a href="#" class="text-black-50 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2"><i class="fas fa-rss"></i></a>
                        <a href="#" class="text-black-50 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-black-50 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-black-50 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="text-black-50 ml-2 ml-sm-2 ml-md-2 ml-lg-2 ml-xl-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="description border my-5 my-sm-5 my-md-5 my-lg-5 my-xl-5">
            <p class="bg-881a1b text-white font-weight-bold py-2 py-sm-2 py-md-2 py-lg-2 py-xl-2 px-3 px-sm-3 px-md-3 px-lg-3 px-xl-3">Description</p>
            <div class="px-3 px-sm-3 px-md-3 px-lg-3 px-xl-3">
                {!! $item->description !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script('public/plugin/zoom/jquery.zoom.min.js') }}

    <script>
        $('.info-image')
            .wrap('<span style="display:inline-block"></span>')
            .css('display', 'block')
            .parent()
            .zoom();

        $('.preview-image1').click(function (e) {
            e.preventDefault();
            $('.info-image').trigger('zoom.destroy');
            $('.info-image').attr('src', $(this).data('image'));
            $('.info-image')
                .wrap('<span style="display:inline-block"></span>')
                .css('display', 'block')
                .parent()
                .zoom({
                    url: $(this).data('image')
                });
        });
        $('.preview-image2').click(function (e) {
            e.preventDefault();
            $('.info-image').trigger('zoom.destroy');
            $('.info-image').attr('src', $(this).data('image'));
            $('.info-image')
                .wrap('<span style="display:inline-block"></span>')
                .css('display', 'block')
                .parent()
                .zoom({
                    url: $(this).data('image')
                });
        });
        $('.preview-image3').click(function (e) {
            e.preventDefault();
            $('.info-image').trigger('zoom.destroy');
            $('.info-image').attr('src', $(this).data('image'));
            $('.info-image')
                .wrap('<span style="display:inline-block"></span>')
                .css('display', 'block')
                .parent()
                .zoom({
                    url: $(this).data('image')
                });
        });
        $('.preview-image4').click(function (e) {
            e.preventDefault();
            $('.info-image').trigger('zoom.destroy');
            $('.info-image').attr('src', $(this).data('image'));
            $('.info-image')
                .wrap('<span style="display:inline-block"></span>')
                .css('display', 'block')
                .parent()
                .zoom({
                    url: $(this).data('image')
                });
        });
    </script>
@endsection