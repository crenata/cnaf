@extends('template')

@section('title', 'Cart')

@section('stylesheets')
    {{--<link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">--}}
@endsection

@section('content-container')
    <h3 class="my-5">Konfirmasi Pembelanjaan</h3>
    <div class="table-responsive">
        <table class="ui table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Vendor</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    ['id' => 1, 'name' => 'Ariston GESZJKA', 'image' => 'http://localhost/storage/cnaf/items/CNAF-20190621-IMAGE-080505bde5a2021213f6f6220e736c925d0c5868362d2.png', 'vendor' => 'My Kitchen Art', 'price' => 1000000, 'qty' => 12],
                    ['id' => 1, 'name' => 'Ariston CKADNCWA', 'image' => 'http://localhost/storage/cnaf/items/CNAF-20190621-IMAGE-080505bde5a2021213f6f6220e736c925d0c5868362d2.png', 'vendor' => 'My Kitchen Art', 'price' => 1500000, 'qty' => 12],
                ] as $item)
                    <tr>
                        <td style="width: 6rem;"><img src="{{ $item['image'] }}" alt="" class="w-100"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['vendor'] }}</td>
                        <td>Rp. {{ number_format($item['price']) }},-</td>
                        <td><input type="text"></td>
                        <td></td>
                        <td><button class=""><i class="fas fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection