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
        {{ Form::model($leasing, ['route' => ['apply.success', $code], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'simulasi-form', 'files' => true, 'enctype' => 'multipart/form-data']) }}
        <div class="bg-881a1b p-4 p-sm-4 p-md-4 p-lg-4 p-xl-4 rounded">
            <h4 class="font-weight-bold">Rangkuman Data</h4>
            <div class="row small">
                <div class="col-6"><p class="m-0">Harga Kendaraan</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ number_format($leasing->leasing_value) }},-</p></div>

                <div class="col-6"><p class="m-0">Pinjaman yang di Ajukan</p></div>
                <div class="col-6"><p class="m-0">: Rp. {{ number_format($leasing->total_loan) }},-</p></div>

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
            <h6 class="font-weight-bold">Konfimasikan Data Diri Anda</h6>
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Nama Lengkap *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Full Name', ($leasing->name == null || $leasing->name == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('email', 'Email *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'user@example.com', ($leasing->email == null || $leasing->email == '') ? 'required' : '')) }}
                            @if(session('error_email'))
                                <div class="alert alert-danger error-add-name py-1 px-2 mt-2">{{ session('error_email') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('address', 'Alamat *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('address', null, array('class' => 'form-control', 'id' => 'address', 'placeholder' => 'Alamat', ($leasing->address == null || $leasing->address == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('npwp', 'NPWP *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('npwp', null, array('class' => 'form-control', 'id' => 'npwp', 'placeholder' => 'NPWP Number', ($leasing->npwp == null || $leasing->npwp == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('ktp_ocr_dob', 'Tanggal Lahir *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::date('ktp_ocr_dob', null, array('class' => 'form-control', 'id' => 'ktp_ocr_dob', 'placeholder' => '00/00/0000', ($leasing->ktp_ocr_dob == null || $leasing->ktp_ocr_dob == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('phone', 'Nomor Handphone *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'phone', 'placeholder' => '0000-0000-0000', ($leasing->phone == null || $leasing->phone == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        {{ Form::label('ktp', 'KTP *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            {{ Form::text('ktp', null, array('class' => 'form-control', 'id' => 'ktp', 'placeholder' => 'XXXXXXXXXXXXXX', ($leasing->ktp == null || $leasing->ktp == '') ? 'required' : '')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="upload-file mt-3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="form-group row">
                        {{ Form::label('ktp_picture', 'KTP *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="input-group col-sm-12">
                            <input type="file" name="ktp_picture" class="ktp-picture dropify" data-default-file="{{ $leasing->ktp_picture }}" {{ ($leasing->ktp_picture == null || $leasing->ktp_picture == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="form-group row">
                        {{ Form::label('selfie_picture', 'Foto Diri Anda *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="input-group col-sm-12">
                            <input type="file" name="selfie_picture" class="selfie-picture dropify" data-default-file="{{ $leasing->selfie_picture }}" {{ ($leasing->selfie_picture == null || $leasing->selfie_picture == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="form-group row">
                        {{ Form::label('bpkb_picture', 'Copy STNK / BPKB *', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="input-group col-sm-12">
                            <input type="file" name="bpkb_picture" class="bpkb-picture dropify" data-default-file="{{ $leasing->bpkb_picture }}" {{ ($leasing->bpkb_picture == null || $leasing->bpkb_picture == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>
            </div>

            <p class="mt-3">Foto Kendaraan *</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture1" class="picture1 dropify" data-default-file="{{ $leasing->picture1 }}" {{ ($leasing->picture1 == null || $leasing->picture1 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture2" class="picture2 dropify" data-default-file="{{ $leasing->picture2 }}" {{ ($leasing->picture2 == null || $leasing->picture2 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture3" class="picture3 dropify" data-default-file="{{ $leasing->picture3 }}" {{ ($leasing->picture3 == null || $leasing->picture3 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture4" class="picture4 dropify" data-default-file="{{ $leasing->picture4 }}" {{ ($leasing->picture4 == null || $leasing->picture4 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture5" class="picture5 dropify" data-default-file="{{ $leasing->picture5 }}" {{ ($leasing->picture5 == null || $leasing->picture5 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2">
                    <div class="form-group row">
                        <div class="input-group col-sm-12">
                            <input type="file" name="picture6" class="picture6 dropify" data-default-file="{{ $leasing->picture6 }}" {{ ($leasing->picture6 == null || $leasing->picture6 == '') ? 'required' : '' }}>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="a" id="exampleRadios1" value="data" required>
                        <label class="form-check-label small" for="exampleRadios1">Pernyataan Kebenaran Data *</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="b" id="exampleRadios2" value="sdk" required>
                        <label class="form-check-label small" for="exampleRadios2">Menyetujui Syarat & Ketentuan pengajuan fasilitas pembiayaan (CNAF) *</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix mt-3">
            <a href="{{ route('apply', [3, $code]) }}" class="btn btn-sm bg-881a1b float-left rounded-pill px-3"><i class="fas fa-arrow-left"></i> &nbsp; KEMBALI</a>
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
            let drEvent = $(element).dropify();
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