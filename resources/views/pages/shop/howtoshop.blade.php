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
    <div class="my-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="text-center">
                    <h5 class="font-weight-bold">Belanja dengan beragam keuntungan</h5>
                    <p>Cari tahu bagaimana cara mendapatkan beragam keuntungan selama berbelanja di SobatCNAF</p>
                    <img src="{{ asset('public/images/shop.png') }}" alt="" width="400">
                </div>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="mt-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis itaque laboriosam officia quidem voluptas. Ad alias amet blanditiis consequuntur deserunt dignissimos dolor ducimus earum eius error est exercitationem facilis fugit ipsum itaque iure laboriosam maiores, minus mollitia nam neque numquam odio officia perferendis placeat provident quas qui quibusdam quo repellendus sapiente similique soluta tenetur, unde voluptas voluptatem voluptatum? Minus, mollitia voluptates. Consequatur, delectus fugit iure neque perspiciatis quae tempora. Eum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis itaque laboriosam officia quidem voluptas. Ad alias amet blanditiis consequuntur deserunt dignissimos dolor ducimus earum eius error est exercitationem facilis fugit ipsum itaque iure laboriosam maiores, minus mollitia nam neque numquam odio officia perferendis placeat provident quas qui quibusdam quo repellendus sapiente similique soluta tenetur, unde voluptas voluptatem voluptatum? Minus, mollitia voluptates. Consequatur, delectus fugit iure neque perspiciatis quae tempora. Eum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis itaque laboriosam officia quidem voluptas. Ad alias amet blanditiis consequuntur deserunt dignissimos dolor ducimus earum eius error est exercitationem facilis fugit ipsum itaque iure laboriosam maiores, minus mollitia nam neque numquam odio officia perferendis placeat provident quas qui quibusdam quo repellendus sapiente similique soluta tenetur, unde voluptas voluptatem voluptatum? Minus, mollitia voluptates. Consequatur, delectus fugit iure neque perspiciatis quae tempora. Eum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis itaque laboriosam officia quidem voluptas. Ad alias amet blanditiis consequuntur deserunt dignissimos dolor ducimus earum eius error est exercitationem facilis fugit ipsum itaque iure laboriosam maiores, minus mollitia nam neque numquam odio officia perferendis placeat provident quas qui quibusdam quo repellendus sapiente similique soluta tenetur, unde voluptas voluptatem voluptatum? Minus, mollitia voluptates. Consequatur, delectus fugit iure neque perspiciatis quae tempora. Eum.</p>
        </div>

        <div class="mt-5">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="text-center">
                        <h5 class="font-weight-bold">Segera Gabung di SobatCNAF dan Dapatkan Beragam Keuntungannya</h5>
                        <a href="{{ route('register') }}" class="btn bg-881a1b px-4">Bergabung Sekarang</a>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
@endsection