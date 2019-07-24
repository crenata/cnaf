@extends('template')

@section('title', 'Pengajuan')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xl.css') }}" media="screen and (min-width: 1200px)">

    {{ Html::style('public/plugin/dropify-master/dist/css/dropify.min.css') }}

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
        {{ Form::model($leasing, ['route' => ['apply', 2, $code], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'simulasi-form', 'files' => true, 'enctype' => 'multipart/form-data']) }}
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
                <h6 class="font-weight-bold">Unggah Data Diri Anda</h6>
                <p class="mt-3 mb-0">Pilih jenis KTP Anda *</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ktp_type" id="exampleRadios1" value="EKTP" {{ ($leasing->ktp_type == 'EKTP') ? 'checked' : '' }} required>
                    <label class="form-check-label small" for="exampleRadios1">E-KTP</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ktp_type" id="exampleRadios2" value="KTP" {{ ($leasing->ktp_type == 'KTP') ? 'checked' : '' }} required>
                    <label class="form-check-label small" for="exampleRadios2">KTP</label>
                </div>
            </div>

            <div class="upload-ktp mt-3">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            {{ Form::label('ktp_picture', 'Upload Copy KTP *', array('class' => 'col-sm-6 col-form-label')) }}
                            <div class="input-group col-sm-12">
                                <input type="file" name="ktp_picture" class="ktp-picture dropify" data-default-file="{{ $leasing->ktp_picture }}" {{ ($leasing->ktp_picture == null || $leasing->ktp_picture == '') ? 'required' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            {{ Form::label('selfie_picture', 'Upload Foto Diri Anda *', array('class' => 'col-sm-6 col-form-label')) }}
                            <div class="input-group col-sm-12">
                                <input type="file" name="selfie_picture" class="selfie-picture dropify" data-default-file="{{ $leasing->selfie_picture }}" {{ ($leasing->selfie_picture == null || $leasing->selfie_picture == '') ? 'required' : '' }}>
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
    {{ Html::script('public/plugin/dropify-master/dist/js/dropify.min.js') }}

    <script type="text/javascript">
        $('.dropify').dropify();
        // edit_image_preview('.dropify', 'http://localhost/cnaf/public/images/home/logo.png');
        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }

        function edit_image_preview(element, image) {
            var drEvent = $(element).dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = image;
            drEvent.destroy();
            drEvent.init();
            $(element).dropify({
                defaultFile: image
            });
        }
    </script>
@endsection