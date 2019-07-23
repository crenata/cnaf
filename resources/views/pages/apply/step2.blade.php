@extends('template')

@section('title', 'Simulasi')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xl.css') }}" media="screen and (min-width: 1200px)">

    <script type="text/javascript">
        let dropdown_region_selected, dropdown_brand_selected, dropdown_type_selected, dropdown_model_selected, dropdown_year_selected,
            dropdown_tenor_selected, dropdown_assurance_selected, total_year, current_tenor, current_bunga, total_sisa_assurance = 0, get_car_price_from_input,
            ajukan_pinjaman, potongan_assurance, potongan_provisi, total_potongan, disbursement, total_ph, cicilan_perbulan, default_ajukan_pinjaman = 25000000,
            assurance_rate = [], assurance_final_price = [], car_price = [], max_pembiayaan = [], bunga = [], tenor = [], potongan_admin = [],
            provisi_percentage = [], potongan_polis = [];
    </script>
@endsection

@section('content-container')
    <h3 class="font-weight-bold mt-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-4">Aplikasi Kredit</h3>
    <div class="simulasi border rounded p-4 p-sm-4 p-md-4 p-lg-4 p-xl-4 my-4">
        {{ Form::model($leasing, ['route' => ['apply', 3, $code], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'simulasi-form', 'files' => true, 'enctype' => 'multipart/form-data']) }}
        <div class="bg-881a1b p-4 p-sm-4 p-md-4 p-lg-4 p-xl-4 rounded">
            <h4 class="font-weight-bold">Rangkuman Data</h4>
            <div class="row small">
                <div class="col-6"><p class="m-0">Harga Kendaraan</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ number_format($leasing->leasing_value) }},-</p></div>

                <div class="col-6"><p class="m-0">Pinjaman yang di Ajukan</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ $leasing->total_loan }},-</p></div>

                <div class="col-6"><p class="m-0">Bunga</p></div>
                <div class="col-6"><p class="m-0">: {{ $leasing->rate }}%</p></div>

                <div class="col-6"><p class="m-0">Tenor</p></div>
                <div class="col-6"><p class="m-0">: {{ $leasing->tenor }}</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Potongan Asuransi</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>

                <div class="col-6"><p class="m-0">Potongan Admin</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ number_format($leasing->admin_fee) }},-</p></div>

                <div class="col-6"><p class="m-0">Potongan Provisi</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>

                <div class="col-6"><p class="m-0">Potongan Polis</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ number_format($leasing->polis) }},-</p></div>

                <div class="col-6"><p class="mb-0 mt-1">Total Potongan</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Disbursement</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Total PH</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>

                <div class="col-6"><p class="m-0">Cicilan per Bulan</p></div>
                <div class="col-6"><p class="m-0">: Rp. ,-</p></div>
            </div>
        </div>

        <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-4">
            <h6 class="font-weight-bold">Lengkapi Data Diri Anda</h6>
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Nama Lengkap *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Full Name')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('email', 'Email *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'user@example.com')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('address', 'Alamat *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('address', null, array('class' => 'form-control', 'id' => 'address', 'placeholder' => 'Alamat')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('npwp', 'NPWP *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('npwp', null, array('class' => 'form-control', 'id' => 'npwp', 'placeholder' => 'NPWP Number')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('ttl', 'Tanggal Lahir *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::date('ttl', null, array('class' => 'form-control', 'id' => 'ttl', 'placeholder' => '00/00/0000')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('phone', 'Nomor Handphone *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'phone', 'placeholder' => '000-0000-0000')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('ktp', 'KTP *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('ktp', null, array('class' => 'form-control', 'id' => 'ktp', 'placeholder' => 'XXXXXXXXXXXXXX')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix mt-3">
            <button type="reset" class="btn btn-sm bg-881a1b float-left rounded-pill px-3"><i class="fas fa-arrow-left"></i> &nbsp; KEMBALI</button>
            <button type="submit" class="btn btn-sm bg-881a1b float-right rounded-pill px-3">AJUKAN KREDIT &nbsp; <i class="fas fa-arrow-right"></i></button>
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }
    </script>
@endsection