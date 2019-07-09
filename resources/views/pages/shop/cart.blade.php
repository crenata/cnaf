@extends('template')

@section('title', 'Cart')

@section('stylesheets')
    {{--<link rel="stylesheet" href="{{ asset('public/css/user/shop/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/shop/xl.css') }}" media="screen and (min-width: 1200px)">--}}

    <script type="text/javascript">
        let item = [];
    </script>
@endsection

@section('content-container')
    <div class="products mt-5">
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
                @foreach([
                    ['id' => 1, 'name' => 'Ariston Built Oven GESZJKA', 'image' => 'http://localhost/storage/cnaf/items/CNAF-20190621-IMAGE-080505bde5a2021213f6f6220e736c925d0c5868362d2.png', 'vendor' => 'My Kitchen Art', 'price' => 25000000, 'qty' => 12],
                    ['id' => 2, 'name' => 'Ariston Built Microwave CKADNCWA', 'image' => 'http://localhost/storage/cnaf/items/CNAF-20190621-IMAGE-b83b7170442aac3708d53f8c89a0d8485d0c55c96b1f3.png', 'vendor' => 'My Kitchen Art', 'price' => 25000000, 'qty' => 14],
                ] as $item)
                    <tr>
                        <td style="width: 6rem;"><img src="{{ $item['image'] }}" alt="" class="w-100"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['vendor'] }}</td>
                        <td>Rp. {{ number_format($item['price']) }},-</td>
                        <td>
                            <button class="min{{ $item['id'] }}">-</button>
                            <input type="number" name="" value="1" class="total-item{{ $item['id'] }}" max="{{ $item['qty'] }}" min="1" disabled>
                            <button class="plus{{ $item['id']}}">+</button>
                            <script type="text/javascript">
                                item[{!! $item['id'] !!}] = {
                                    "id": {!! $item['id'] !!},
                                    "name": "{!! $item['name'] !!}",
                                    "image": "{!! $item['image'] !!}",
                                    "vendor": "{!! $item['vendor'] !!}",
                                    "price": {!! $item['price'] !!},
                                    "qty": {!! $item['qty'] !!}
                                };
                                $(document).ready(function () {
                                    btn_plus({!! $item['id'] !!}, {!! $item['price'] !!}, {!! $item['qty'] !!});
                                    btn_min({!! $item['id'] !!}, {!! $item['price'] !!});
                                    {{--input_total_item_change({!! $item['id'] !!}, {!! $item['price'] !!});--}}
                                    input_total_item_keydown({!! $item['id'] !!}, {!! $item['price'] !!});

                                    let current_item = $('.total-item{!! $item['id'] !!}').val();
                                    let total_price = current_item * {!! $item['price'] !!};
                                    $('.subtotal-harga{{ $item['id'] }}').text('Rp. ' + format_money(total_price) + ',-');
                                });
                            </script>
                        </td>
                        <td><p class="subtotal-harga{{ $item['id'] }}">Rp. {{ number_format($item['price']) }},-</p></td>
                        <td><button class="btn"><i class="fas fa-trash"></i></button></td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="5" class="">Total Pengajuan Belanja :</th>
                    <th><p class="total-all"></p></th>
                    <th></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="credit mt-4">
        <h3 class="">Sisa Kredit Anda</h3>
        <h5 class="font-weight-bold d-inline-block p-2 bg-881a1b">Rp. 100,000,000,000,-</h5>
        <form class="choose mt-3">
            <div class="select-credit">
                <p class="m-0">Apakah Anda ingin mengambil tunai untuk sisa kredit Anda?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
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
                        {{ Form::submit('Kirim', array('class' => 'btn bg-881a1b float-right')) }}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }

        function btn_plus(id, price, qty) {
            $('.plus' + id).click(function() {
                if ($(this).prev().val() < qty) {
                    $(this).prev().val(+$(this).prev().val() + 1);
                    let current_items = $('.total-item' + id).val();
                    let total_prices = current_items * price;
                    $('.subtotal-harga' + id).text('Rp. ' + format_money(total_prices) + ',-');

                    let total = 0;
                    $.each(item, function (index, value) {
                        console.log(value);
                    });
                    // $('.total-all').text('Rp. ' + format_money(total) + ',-');
                }
            });
        }

        function btn_min(id, price) {
            $('.min' + id).click(function() {
                if ($(this).next().val() > 1) {
                    $(this).next().val(+$(this).next().val() - 1);
                    let current_items = $('.total-item' + id).val();
                    let total_prices = current_items * price;
                    $('.subtotal-harga' + id).text('Rp. ' + format_money(total_prices) + ',-');
                }
            });
        }

        function input_total_item_change(id, price) {
            let current_item = $('.total-item' + id).val();
            let total_price = current_item * price;
            $('.subtotal-harga' + id).text('Rp. ' + format_money(total_price) + ',-');
        }

        function input_total_item_keydown(id, price) {
            $('.total-item' + id).keydown(function() {
                let current_item = $(this).val();
                let total_price = current_item * price;
                $('.subtotal-harga' + id).text('Rp. ' + format_money(total_price) + ',-');
            });
        }

        // disable_inspect_element();

        function disable_inspect_element() {
            document.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
            $(document).keydown(function (e) {
                if (event.keyCode == 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
            });
        }
    </script>
@endsection