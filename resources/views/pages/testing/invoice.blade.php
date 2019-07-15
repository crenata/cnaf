<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice</title>

    <link rel="apple-touch-icon" href="{{ asset('public/plugin/mui-trade-template/mmenu/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('public/plugin/mui-trade-template/mmenu/assets/images/favicon.ico') }}">

    <style type="text/css">
        html {
            font-family: 'Open Sans', sans-serif !important;
        }

        .width-50 {
            width: 50% !important;
        }
        .clear {
            margin: 0 !important;
            padding: 0 !important;
        }
        .clear:after {
            clear: both;
        }
        .float-left {
            float: left;
        }

        table, tbody, td {
            margin: 0 !important;
            padding: 0 !important;
        }
        .text-center {
            text-align: center !important;
        }
        .text-right {
            text-align: right;
        }
        .text-left {
            text-align: left;
        }
        .p-0 {
            padding: 0 !important;
        }
        .m-0 {
            margin: 0 !important;
        }
        .mt-0 {
            margin-top: 0 !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <img src="{{ asset('public/images/invoice/head.png') }}" alt="" width="100" height="100">
        <div class="info-user" style="margin-top: 1.5rem;">
            <div class="clear">
                <div class="width-50 float-left">
                    <table>
                        <tbody>
                            <td>Nomor Invoice :</td>
                            <td>1234567890</td>
                        </tbody>
                    </table>
                </div>
                <div class="width-50 float-left">
                    <table>
                        <tbody>
                            <td>Atas Nama :</td>
                            <td>Sutrisno</td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clear">
                <div class="width-50 float-left">
                    <table>
                        <tbody>
                            <td valign="top">Tanggal Invoice :</td>
                            <td>11 Juli 2019</td>
                        </tbody>
                    </table>
                </div>
                <div class="width-50 float-left">
                    <table>
                        <tbody>
                            <td valign="top">Alamat :</td>
                            <td>Jl Bebek No.25 RT 30/RW 10, Tanjung Duren Timur, Grogol Petamburan, Jakarta Barat, DKI Jakarta, ID - 11470</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr style="border: 1px dashed #F2F2F2; margin-top: 2rem;">

        <div class="info-item" style="margin-bottom: 10px;">
            <p><b>Rincian Pemesanan</b></p>
            <div class="table-product" style="border: 1px solid #F2F2F2; padding: 4px; border-radius: 4px;">
                <div class="clear text-center table-heading" style="background-color: #F2F2F2; border-radius: 4px;">
                    <div class="float-left" style="width: 40%;">
                        <p>Nama Produk</p>
                    </div>
                    <div class="float-left" style="width: 10%;">
                        <p>Jumlah</p>
                    </div>
                    <div class="float-left" style="width: 25%;">
                        <p>Harga Produk</p>
                    </div>
                    <div class="float-left" style="width: 25%;">
                        <p>Subtotal</p>
                    </div>
                </div>

                @foreach(array(0, 1, 2) as $item)
                    <div class="clear table-content">
                        <div class="float-left" style="width: 40%;">
                            <div class="" style="padding: 10px;">
                                <p class="m-0"><small>Ariston Built-in Microwave HFAJMLJ</small></p>
                                <p class="m-0"><small>#UA389J3RIA7YW8D7H</small></p>
                            </div>
                        </div>
                        <div class="float-left text-right" style="width: 10%;">
                            <div class="" style="padding: 10px;">
                                <p class="m-0"><small>1</small></p>
                            </div>
                        </div>
                        <div class="float-left text-right" style="width: 25%;">
                            <div class="" style="padding: 10px;">
                                <p class="m-0"><small>Rp. 5,000,000,-</small></p>
                            </div>
                        </div>
                        <div class="float-left text-right" style="width: 25%;">
                            <div class="" style="padding: 10px;">
                                <p class="m-0"><small>Rp. 5,000,000,-</small></p>
                            </div>
                        </div>
                    </div>
                    @if(!$loop->last)
                        <hr style="border: 1px dashed #F2F2F2;">
                    @endif
                @endforeach
            </div>

            <div class="clear total-price">
                <div class="float-left" style="width: 40%;">

                </div>
                <div class="float-left text-right" style="width: 10%;">

                </div>
                <div class="float-left text-right" style="width: 25%;">
                    <div class="" style="padding: 10px;">
                        <p class="m-0"><b>Total</b></p>
                    </div>
                </div>
                <div class="float-left text-right" style="width: 25%;">
                    <div class="" style="padding: 10px;">
                        <p class="m-0"><b>Rp. 15,000,000,-</b></p>
                    </div>
                </div>
            </div>

            <hr style="border: 1px dashed #F2F2F2; margin-top: 2.5rem;">

            <p style="margin-top: 2rem;"><b>Tahap Selanjutnya</b></p>
            <p class="m-0">Pemesanan telah dikonfirmasi. Segera hubungi <b>Sutrisno</b> untuk melanjutkan proses pemesanan.</p>
            <p class="m-0">Pembayaran akan dilepaskan setelah <b>Sutrisno</b> memberikan konfirmasi penerimaan.</p>
        </div>

        <div class="footer text-center" style="position: absolute; bottom: 0; background-color: #F2F2F2; padding: 2rem;">
            <img src="{{ asset('public/images/invoice/footer.png') }}" alt="" width="200" class="m-0">
            <p class="m-0 p-0"><small><b>APL Tower Central Park Floor 36th - Suite 3 Jl. Letjen S. Parman Kav.28</b></small></p>
        </div>
    </div>
</body>
</html>