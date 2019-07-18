@extends('template')

@section('title', 'Cart')

@php
    $total_price = 0;
@endphp

@section('stylesheets')
    {{--<link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">--}}

    <style type="text/css">
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            display: none;
        }
    </style>

    <script type="text/javascript">
        let total_price = [], cart_id_saved = [], final_result_total = 0, exec_item_id = [], exec_item_qty = [], exec_index = [];
    </script>
@endsection

@section('content')
    <div class="loading">
        <img src="{{ asset('public/images/loading-ring.gif') }}" alt="" width="100" height="100">
    </div>
@endsection

@section('content-container')
    <div class="message-replace mt-5">
        <div class="products">
            <h3 class="">Konfirmasi Pembelanjaan</h3>
            <div class="table-responsive mt-3">
                <table class="ui table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="25%">Product</th>
                        <th width="15%">Vendor</th>
                        <th width="15%">Harga Satuan</th>
                        <th width="15%">Qty</th>
                        <th width="15%">Total Harga</th>
                        <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $index => $cart)
                        <script type="text/javascript">
                            cart_id_saved.push({!! $cart->id !!});
                            exec_item_id.push({!! $cart->item->id !!});
                            exec_item_qty.push({!! $cart->qty !!});
                            exec_index.push({!! $index !!});
                        </script>
                        <tr id="cart-id-{{ $cart->id }}">
                            <td style="width: 6rem;"><img src="{{ $cart->item->image1 }}" alt="" class="w-100"></td>
                            <td>{{ $cart->item->name }}</td>
                            <td>{{ $cart->item->vendor->name }}</td>
                            @if($cart->item->price_after_discount != null || $cart->item->price_after_discount != 0)
                                @php
                                    $total_price += ($cart->item->price_after_discount * $cart->qty);
                                @endphp
                                <td>Rp. {{ number_format($cart->item->price_after_discount) }},-</td>
                            @else
                                @php
                                    $total_price += ($cart->item->normal_price * $cart->qty);
                                @endphp
                                <td>Rp. {{ number_format($cart->item->normal_price) }},-</td>
                            @endif
                            <td>
                                <button class="min{{ $cart->id }}">-</button>
                                <input type="number" name="" value="{{ $cart->qty }}" class="total-item{{ $cart->id }}" max="{{ $cart->item->qty }}" min="1">
                                <button class="plus{{ $cart->id}}">+</button>
                                @if($cart->item->price_after_discount != null || $cart->item->price_after_discount != 0)
                                    <script type="text/javascript">
                                        total_price[{!! $cart->id !!}] = ({!! $cart->item->price_after_discount !!} * {!! $cart->qty !!});
                                        $(document).ready(function () {
                                            btn_plus({!! $cart->id !!}, {!! $cart->item->price_after_discount !!}, {!! $cart->item->qty !!}, {!! $cart->item->id !!}, {!! $index !!});
                                            btn_min({!! $cart->id !!}, {!! $cart->item->price_after_discount !!}, {!! $cart->item->id !!}, {!! $index !!});
                                            input_total_item_keyup({!! $cart->id !!}, {!! $cart->item->price_after_discount !!}, {!! $cart->item->qty !!}, {!! $cart->item->id !!}, {!! $index !!});
                                        });
                                    </script>
                                @else
                                    <script type="text/javascript">
                                        total_price[{!! $cart->id !!}] = ({!! $cart->item->normal_price !!} * {!! $cart->qty !!});
                                        $(document).ready(function () {
                                            btn_plus({!! $cart->id !!}, {!! $cart->item->normal_price !!}, {!! $cart->item->qty !!}, {!! $cart->item->id !!}, {!! $index !!});
                                            btn_min({!! $cart->id !!}, {!! $cart->item->normal_price !!}, {!! $cart->item->id !!}, {!! $index !!});
                                            input_total_item_keyup({!! $cart->id !!}, {!! $cart->item->normal_price !!}, {!! $cart->item->qty !!}, {!! $cart->item->id !!}, {!! $index !!});
                                        });
                                    </script>
                                @endif
                            </td>
                            @if($cart->item->price_after_discount != null || $cart->item->price_after_discount != 0)
                                <td><p class="subtotal-harga{{ $cart->id }}">Rp. {{ number_format($cart->item->price_after_discount * $cart->qty) }},-</p></td>
                            @else
                                <td><p class="subtotal-harga{{ $cart->id }}">Rp. {{ number_format($cart->item->normal_price * $cart->qty) }},-</p></td>
                            @endif
                            <td>
                                <a href="javascript:void(0)" data-id="{{ $cart->id }}" data-price="@if($cart->item->price_after_discount != null || $cart->item->price_after_discount != 0){{ $cart->item->price_after_discount }}@else{{ $cart->item->normal_price }}@endif" data-itemid="{{ $cart->item->id }}" data-index="{{ $index }}" class="btn btn-icon btn-pure btn-default on-default remove-row delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="5" class="">Total Pengajuan Belanja :</th>
                        <th><p class="total-all m-0">Rp. {{ number_format($total_price) }},-</p></th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="credit mt-4">
            {{--<h3 class="">Sisa Kredit Anda</h3>
            @if(Auth::user()->credit == null || Auth::user()->credit == '')
                <h5 class="font-weight-bold d-inline-block p-2 bg-881a1b">Rp. 0,-</h5>
            @else
                <h5 class="font-weight-bold d-inline-block p-2 bg-881a1b">Rp. {{ number_format(Auth::user()->credit) }},-</h5>
            @endif--}}
            <form class="choose mt-3">
                <div class="select-credit">
                    <p class="m-0">Apakah Anda ingin mengambil tunai untuk sisa kredit Anda?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked required="">
                        <label class="form-check-label" for="exampleRadios1">
                            Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" required="">
                        <label class="form-check-label" for="exampleRadios2">
                            Tidak
                        </label>
                    </div>
                </div>

                <div class="select-tenor mt-4">
                    <h3 class="">Pilih Tenor</h3>
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect02">
                                    <option value="12" selected>12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                    <option value="48">48</option>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Bulan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-sm-8 col-md-9 col-lg-9 col-xl-10"></div>
                    </div>
                </div>

                <div class="estimate my-4">
                    <h3 class="">Estimasi Baru setelah pembelanjaan</h3>
                    <div class="bg-881a1b p-4 p-sm-4 p-md-4 p-lg-4 p-xl-4 mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3 rounded">
                        <h4 class="font-weight-bold">Hasil</h4>
                        <div class="row small">
                            <div class="col-6"><p class="m-0">Harga Kendaraan</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-nilai-kendaraan"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Pinjaman yang di Ajukan</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-ajukan-pinjaman"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Bunga</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0" id="result-bunga"></p></div>

                            <div class="col-6"><p class="m-0">Tenor</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0" id="result-tenor"></p></div>
                        </div>

                        <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                            <div class="col-6"><p class="m-0">Potongan Asuransi</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-potongan-asuransi"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Potongan Admin</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-potongan-admin"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Potongan Provisi</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-potongan-provisi"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Potongan Polis</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-potongan-polis"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="mb-0 mt-1">Total Potongan</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block mb-0 mt-1">Rp. &nbsp;</p><p class="d-inline-block mb-0 mt-1" id="result-total-potongan"></p><p class="d-inline-block mb-0 mt-1">,-</p></div>
                        </div>

                        <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                            <div class="col-6"><p class="m-0">Disbursement</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-disbursement"></p><p class="d-inline-block m-0">,-</p></div>
                        </div>

                        <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                            <div class="col-6"><p class="m-0">Total PH</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-total-ph"></p><p class="d-inline-block m-0">,-</p></div>

                            <div class="col-6"><p class="m-0">Cicilan per Bulan</p></div>
                            <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0" id="result-cicilan-perbulan"></p><p class="d-inline-block m-0">,-</p></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6 align-self-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Saya telah menyetujui Syarat & Ketentuan *
                                </label>
                            </div>
                        </div>
                        <div class="col-6 align-self-center clearfix">
                            {{--                        {{ Form::submit('Kirim', array('class' => 'btn bg-881a1b float-right')) }}--}}
                            <button class="btn bg-881a1b float-right exec-cart">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('.delete').click(function() {
            let id = $(this).data('id');
            let price = $(this).data('price');
            let item_id = $(this).data('itemid');
            let index = $(this).data('index');
            $.ajax({
                type: 'DELETE',
                url: '{!! url("cart") !!}' + '/' + id,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('.container').css('display', 'none');
                },
                success: function(data) {
                    $('.loading').css('display', 'none');
                    // $('.container').css('display', 'block');
                    $('#cart-id-' + id).remove();
                    exec_item_id.splice(index, 1);
                    exec_item_qty.splice(index, 1);
                    exec_index.splice(index, 1);
                    // count_price(id, price, item_id, index);
                    toastr.success('Successfully remove Item from Cart!', 'Success Alert', {timeOut: 5000});
                    location.reload(); /* Change this to recount data */
                },
                error: function(data) {
                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');
                    toastr.error('Failed remove Item from Cart!', 'Error Alert', {timeOut: 5000});
                }
            });
        });

        $('.exec-cart').click(function (e) {
            e.preventDefault();

            let items_id = JSON.stringify(exec_item_id);
            let qty = JSON.stringify(exec_item_qty);

            let data_string = "items_id=" + items_id + "&qty=" + qty;

            $.ajax({
                type: 'POST',
                url: '{!! url("transaction") !!}',
                data: data_string,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('.container').css('display', 'none');
                },
                success: function(data) {
                    if (data.errors) {
                        $('.loading').css('display', 'none');
                        $('.container').css('display', 'block');
                        toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                    } else {
                        toastr.success('Successfully Checkout!', 'Success Alert', {timeOut: 5000});
                        // location.reload();
                        console.log(data);
                        $('.message-replace').html(data.html);
                        $('.credit').text('Credit Rp. ' + format_money(data.credit) + ',-');
                        $('.loading').css('display', 'none');
                        $('.container').css('display', 'block');
                    }
                },
                error: function(xhr, status, error) {
                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');
                    toastr.error(error, 'Error Alert', {timeOut: 5000});
                }
            });
        });

        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }

        function btn_plus(id, price, qty, item_id, index) {
            $('.plus' + id).click(function() {
                if ($(this).prev().val() < qty) {
                    $(this).prev().val(+$(this).prev().val() + 1);
                    count_price(id, price, item_id, index);
                }
            });
        }

        function btn_min(id, price, item_id, index) {
            $('.min' + id).click(function() {
                if ($(this).next().val() > 1) {
                    $(this).next().val(+$(this).next().val() - 1);
                    count_price(id, price, item_id, index);
                }
            });
        }

        function input_total_item_keyup(id, price, qty, item_id, index) {
            $('.total-item' + id).bind('keyup mouseup', function() {
                let current_item = $(this).val();
                if (current_item <= qty) {
                    count_price(id, price, item_id, index);
                } else {
                    $(this).val(qty);
                    count_price(id, price, item_id, index);
                }
            });
        }

        function count_price(id, price, item_id, index) {
            let current_items = $('.total-item' + id).val();
            exec_item_qty[index] = current_items;
            let current_prices = current_items * price;
            $('.subtotal-harga' + id).text('Rp. ' + format_money(current_prices) + ',-');
            total_price[id] = current_prices;
            $.each(cart_id_saved, function (index, value) {
                final_result_total += total_price[value];
            });
            $('.total-all').text('Rp. ' + format_money(final_result_total) + ',-');
            final_result_total = 0;
            update_qty(id, item_id, current_items);
        }

        function update_qty(cart_id, item_id, qty) {
            let update_qty = new FormData();

            update_qty.append('id', cart_id);
            update_qty.append('item_id', item_id);
            update_qty.append('qty', qty);
            update_qty.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: '{!! url("cart") !!}' + '/' + cart_id,
                data: update_qty,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {
                        // toastr.error('Something went wrong!', 'Error Alert', {timeOut: 5000});
                    } else {
                        // toastr.success('Qty has been updated!', 'Success Alert', {timeOut: 5000});
                    }
                },
                error: function(data) {
                    // toastr.error('Error when updated Qty!', 'Error Alert', {timeOut: 5000});
                }
            });
        }
    </script>
@endsection