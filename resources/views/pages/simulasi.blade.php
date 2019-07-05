@extends('template')

@section('title', 'Simulasi')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xl.css') }}" media="screen and (min-width: 1200px)">

    <script type="text/javascript">
        let dropdown_region_selected, dropdown_brand_selected, dropdown_type_selected, dropdown_model_selected, dropdown_tahun_selected,
            dropdown_tenor_selected, dropdown_assurance_selected, total_year, current_tenor, current_bunga, total_sisa_assurance = 0, get_car_price_from_input,
            ajukan_pinjaman, potongan_assurance, potongan_provisi, total_potongan, disbursement, total_ph, cicilan_perbulan, default_ajukan_pinjaman = 25000000,
            assurance_rate = [], assurance_final_price = [], car_price = [], max_pembiayaan = [], bunga = [], tenor = [], potongan_admin = [],
            provisi_percentage = [], potongan_polis = [];
    </script>
@endsection

@section('content-container')
    <h3 class="font-weight-bold mt-4 mt-sm-4 mt-md-4 mt-lg-4 mt-xl-4">Simulasi Kredit</h3>
    <div class="simulasi border rounded p-4 p-sm-4 p-md-4 p-lg-4 p-xl-4 my-4">
        <form class="form-horizontal" id="simulasi-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('wilayah_id', 'Wilayah', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="wilayah_id" id="simulasi-region" class="form-control" required="">
                                <option value="">-- Select Region --</option>
                                @if($currentRegion == null || $currentRegion == 0)
                                    @foreach($carRegions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        <script type="text/javascript">
                                            potongan_admin['{!! $region->id !!}'] = '{!! $region->admin_fee !!}';
                                            provisi_percentage['{!! $region->id !!}'] = '{!! $region->provisi_percentage !!}';
                                            potongan_polis['{!! $region->id !!}'] = '{!! $region->polis_fee !!}';
                                        </script>
                                    @endforeach
                                @else
                                    @foreach($carRegions as $region)
                                        @if($region->id == $currentRegion)
                                            <option value="{{ $region->id }}" selected="">{{ $region->name }}</option>
                                        @else
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('merk_id', 'Merk Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="merk_id" id="simulasi-brand" class="form-control" required="">
                                @if($currentRegion == null || $currentRegion == 0)
                                    <option value="">Pilih Region Dulu</option>
                                @else
                                    @if($carBrands != null || $carBrands != 0)
                                        @if($currentBrand != null || $currentBrand != 0)
                                            <option value="">-- Select Merk --</option>
                                            @foreach($carBrands as $brand)
                                                @if($brand->id == $currentBrand)
                                                    <option value="{{ $brand->id }}" selected="">{{ $brand->name }}</option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">-- Select Merk --</option>
                                            @foreach($carBrands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    @else
                                        <option value="">Pilih Region Dulu</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('type_id', 'Type Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="type_id" id="simulasi-type" class="form-control" required="">
                                @if($currentBrand == null || $currentBrand == 0)
                                    <option value="">Pilih Merk Dulu</option>
                                @else
                                    @if($carTypes != null || $carTypes != 0)
                                        @if($currentType != null || $currentType != 0)
                                            <option value="">-- Select Type --</option>
                                            @foreach($carTypes as $type)
                                                @if($type->id == $currentType)
                                                    <option value="{{ $type->id }}" selected="">{{ $type->name }}</option>
                                                @else
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">-- Select Type --</option>
                                            @foreach($carTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        @endif
                                    @else
                                        <option value="">Pilih Merk Dulu</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('model_id', 'Model Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="model_id" id="simulasi-model" class="form-control" required="">
                                @if($currentType == null || $currentType == 0)
                                    <option value="">Pilih Type Dulu</option>
                                @else
                                    @if($carModels != null || $carModels != 0)
                                        <option value="">-- Select Model --</option>
                                        @foreach($carModels as $model)
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Pilih Type Dulu</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('year_id', 'Tahun Pembuatan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="year_id" id="simulasi-year" class="form-control" required="">
                                <option value="">Pilih Model Dulu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('tenor_id', 'Pilih Tenor', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="tenor_id" id="simulasi-tenor" class="form-control" required="">
                                <option value="">Pilih Region Dulu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('asuransi_id', 'Pilih Asuransi', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="asuransi_id" id="simulasi-assurance-type" class="form-control" required="">
                                <option value="">-- Select Assurance --</option>
                                @foreach($assuranceTypes as $assurancetype)
                                    <option value="{{ $assurancetype->id }}">{{ $assurancetype->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"></div>

                <div class="col-md-12">
                    <div class="form-group row">
                        {{ Form::label('nilai_kendaraan', 'Nilai Kendaraan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-881a1b text-white">Rp.</span>
                                </div>
                                <input type="text" name="nilai_kendaraan" class="form-control" id="simulasi-nilai-kendaraan" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-881a1b text-white">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('minimum_pembiayaan', 'Minimum Pembiayaan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-881a1b text-white">Rp.</span>
                                </div>
                                <input type="text" name="minimum_pembiayaan" class="form-control" id="simulasi-minimum" disabled value="25,000,000">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-881a1b text-white">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('maximum_pembiayaan', 'Maximum Pembiayaan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-881a1b text-white">Rp.</span>
                                </div>
                                <input type="text" name="maximum_pembiayaan" class="form-control" id="simulasi-maximum" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-881a1b text-white">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('ajukan_pinjaman', 'Pinjaman yang di Ajukan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-881a1b text-white">Rp.</span>
                                </div>
                                <input type="text" name="ajukan_pinjaman" class="form-control" id="simulasi-ajukan-pinjaman">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-881a1b text-white">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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

        <div class="mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-4">
            <h6 class="font-weight-bold">Hal yang mungkin perlu anda ketahui</h6>
            <p class="m-0"><a href="{{ route('faq') }}" class="text-body small"><ins>Baca FAQ (Pertanyaan umum)</ins></a></p>
            <p class="m-0"><a href="{{ route('terms.and.condition') }}" class="text-body small"><ins>Baca Syarat dan Ketentuan</ins></a></p>
        </div>

        <div class="text-center mt-3">
            <a href="#" class="btn btn-sm bg-881a1b rounded-pill px-3">AJUKAN SEKARANG &nbsp; <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#simulasi-region').change(function() {
            dropdown_region_selected = $(this).val();

            if (dropdown_region_selected > 0) {
                $.ajax({
                    type: 'GET',
                    url: '{!! url("simulasi/carbrand") !!}' + '/' + $(this).val(),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {

                        } else {
                            $('#simulasi-brand').replaceWith(
                                "<select name='merk_id' id='simulasi-brand' class='form-control' required=''>" +
                                    "<option value=''>-- Select Merk --</option>"
                            );
                            $.each(data, function(index, value) {
                                console.log(value);
                                $('#simulasi-brand').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            });
                            $('#simulasi-brand').append("</select>");

                            reset_dropdown(false, true, true, true);
                            simulasi_brand_changed();
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: '{!! url("simulasi/flatrate") !!}' + '/' + $(this).val(),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {

                        } else {
                            $('#simulasi-tenor').replaceWith(
                                "<select name='tenor_id' id='simulasi-tenor' class='form-control' required=''>" +
                                "<option value=''>-- Select Tenor --</option>"
                            );
                            $.each(data, function(index, value) {
                                console.log(value);
                                tenor[value.id] = value.tenor;
                                bunga[value.id] = value.rate;

                                $('#simulasi-tenor').append(
                                    "<option value='" + value.id + "'>" + value.tenor + "</option>"
                                );
                            });
                            $('#simulasi-tenor').append("</select>");

                            simulasi_tenor_changed();
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });

                $('#result-potongan-admin').text(format_money(parseFloat(potongan_admin[$(this).val()])));
                $('#result-potongan-polis').text(format_money(parseFloat(potongan_polis[$(this).val()])));

                reset_result(true, true, true, true, true, false, true, false);
            } else {
                reset_result();
                reset_dropdown(true, true, true, true, true);
            }
        });

        simulasi_brand_changed();
        simulasi_type_changed();
        simulasi_model_changed();
        simulasi_year_changed();
        simulasi_tenor_changed();
        simulasi_assurance_type_changed();

        function simulasi_brand_changed() {
            $('#simulasi-brand').change(function() {
                $.ajax({
                    type: 'GET',
                    url: '{!! url("simulasi/cartype") !!}' + '/' + $(this).val(),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {

                        } else {
                            $('#simulasi-type').replaceWith(
                                "<select name='type_id' id='simulasi-type' class='form-control' required=''>" +
                                "<option value=''>-- Select Type --</option>"
                            );
                            $.each(data, function(index, value) {
                                console.log(value);
                                $('#simulasi-type').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            });
                            $('#simulasi-type').append("</select>");

                            ajukan_pinjaman = 0;
                            total_ph = 0;
                            potongan_provisi = 0;
                            assurance_final_price = [];
                            reset_result(true, true, false, false, false, false, true, false);
                            reset_dropdown(false, false, true, true);
                            simulasi_type_changed();
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });
            });
        }

        function simulasi_type_changed() {
            $('#simulasi-type').change(function() {
                $.ajax({
                    type: 'GET',
                    url: '{!! url("simulasi/carmodel") !!}' + '/' + $(this).val(),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {

                        } else {
                            $('#simulasi-model').replaceWith(
                                "<select name='model_id' id='simulasi-model' class='form-control' required=''>" +
                                    "<option value=''>-- Select Model --</option>"
                            );
                            $.each(data, function(index, value) {
                                console.log(value);
                                $('#simulasi-model').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            });
                            $('#simulasi-model').append("</select>");

                            reset_dropdown(false, false, false, true);
                            simulasi_model_changed();
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });
            });
        }

        function simulasi_model_changed() {
            $('#simulasi-model').change(function() {
                $.ajax({
                    type: 'GET',
                    url: '{!! url("simulasi/caryear") !!}' + '/' + $(this).val(),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {

                        } else {
                            $('#simulasi-year').replaceWith(
                                "<select name='year_id' id='simulasi-year' class='form-control' required=''>" +
                                    "<option value=''>-- Select Year --</option>"
                            );
                            $.each(data, function(index, value) {
                                console.log(value);
                                car_price[value.id] = value.price;
                                max_pembiayaan[value.id] = value.price * 80 / 100;

                                $('#simulasi-year').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            });
                            $('#simulasi-year').append("</select>");

                            simulasi_year_changed();
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });
            });
        }

        function simulasi_year_changed() {
            $('#simulasi-year').change(function() {
                $('#simulasi-nilai-kendaraan').val(format_money(parseFloat(car_price[$(this).val()])));
                $('#result-nilai-kendaraan').text(format_money(parseFloat(car_price[$(this).val()])));

                $('#simulasi-maximum').val(format_money(parseFloat(max_pembiayaan[$(this).val()])));
                $('#simulasi-ajukan-pinjaman').val(format_money(parseFloat(max_pembiayaan[$(this).val()])));
                $('#result-ajukan-pinjaman').text(format_money(parseFloat(max_pembiayaan[$(this).val()])));

                ajukan_pinjaman = $('#simulasi-ajukan-pinjaman').val().replace(/,/g, '');

                refresh_data(dropdown_tenor_selected);
            });
        }

        function simulasi_tenor_changed() {
            $('#simulasi-tenor').change(function() {
                dropdown_tenor_selected = $(this).val();

                if (dropdown_tenor_selected > 0) {
                    total_year = tenor[$(this).val()] / 12;
                    current_tenor = tenor[$(this).val()];
                    current_bunga = bunga[$(this).val()];

                    $('#result-tenor').text(format_money(parseFloat(tenor[$(this).val()])));
                    $('#result-bunga').text(format_money(parseFloat(bunga[$(this).val()])) + '%');
                } else {
                    $('#result-tenor').text('');
                    $('#result-bunga').text('');
                }

                refresh_data(total_sisa_assurance);
            });
        }

        function simulasi_assurance_type_changed() {
            $('#simulasi-assurance-type').change(function() {
                dropdown_assurance_selected = $(this).val();

                if (dropdown_region_selected > 0 && dropdown_assurance_selected > 0) {
                    $.ajax({
                        type: 'GET',
                        url: '{!! url("simulasi/assurancerate") !!}' + '/' + dropdown_region_selected + '/' + dropdown_assurance_selected,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data.errors) {

                            } else {
                                get_car_price_from_input = $('#simulasi-nilai-kendaraan').val().replace(/,/g, '');
                                console.log(get_car_price_from_input);

                                $.each(data, function(index, value) {
                                    console.log(value);

                                    assurance_rate[value.id] = {
                                        'car_region_id': dropdown_region_selected,
                                        'assurance_type_id': value.assurance_type_id,
                                        'category': value.category,
                                        'rate': value.rate,
                                        'rate12': value.rate12,
                                        'rate24': value.rate24,
                                        'rate36': value.rate36,
                                        'rate48': value.rate48,
                                        'rate60': value.rate60
                                    };

                                    if (get_car_price_from_input < assurance_rate[value.id]['category']) {
                                        assurance_final_price[0] = Math.ceil((get_car_price_from_input * assurance_rate[value.id]['rate12'] / 100) / 1000) * 1000;
                                        assurance_final_price[1] = Math.ceil((get_car_price_from_input * assurance_rate[value.id]['rate24'] / 100) / 1000) * 1000;
                                        assurance_final_price[2] = Math.ceil((get_car_price_from_input * assurance_rate[value.id]['rate36'] / 100) / 1000) * 1000;
                                        assurance_final_price[3] = Math.ceil((get_car_price_from_input * assurance_rate[value.id]['rate48'] / 100) / 1000) * 1000;
                                        assurance_final_price[4] = Math.ceil((get_car_price_from_input * assurance_rate[value.id]['rate60'] / 100) / 1000) * 1000;

                                        if (total_year == 1) total_sisa_assurance = 0;
                                        else if (total_year == 2) total_sisa_assurance = assurance_final_price[1] - assurance_final_price[0];
                                        else if (total_year == 3) total_sisa_assurance = assurance_final_price[2] - assurance_final_price[0];
                                        else if (total_year == 4) total_sisa_assurance = assurance_final_price[3] - assurance_final_price[0];
                                        else if (total_year == 5) total_sisa_assurance = assurance_final_price[4] - assurance_final_price[0];
                                    }
                                });

                                if (assurance_final_price[0] > 0) {
                                    $('#result-potongan-asuransi').text(format_money(parseFloat(assurance_final_price[0])));
                                    potongan_assurance = assurance_final_price[0];
                                }

                                console.log(total_sisa_assurance);
                                console.log(provisi_percentage[dropdown_region_selected]);

                                function_total_ph();
                                function_potongan_provisi();
                                function_total_potongan();
                                function_disbursement();
                                function_cicilan_perbulan();
                            }
                        },
                        error: function(data) {
                            toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                        }
                    });
                }
            });
        }

        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }

        $('#simulasi-ajukan-pinjaman').blur(function () {
            ajukan_pinjaman = $(this).val().replace(/,/g, '');
            if (ajukan_pinjaman < 25000000) {
                $(this).val(format_money(parseFloat(default_ajukan_pinjaman)));
                $('#result-ajukan-pinjaman').text($(this).val());
            }
        });

        $('#simulasi-ajukan-pinjaman').keyup(function () {
            ajukan_pinjaman = $(this).val();
            $(this).val(real_time_input_format_money(ajukan_pinjaman));
            $('#result-ajukan-pinjaman').text($(this).val());
        });
        
        function real_time_input_format_money(n) {
            let number_string = n.replace(/,/g, '').toString();
            let sisa = number_string.length % 3;
            let rupiah = number_string.substr(0, sisa);
            let ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? ',' : '';
                rupiah += separator + ribuan.join(',');
            }

            return rupiah;
        }

        function reset_dropdown(brand = false, type = false, model = false, year = false, tenor = false) {
            if (brand) {
                $('#simulasi-brand').replaceWith(
                    "<select name='merk_id' id='simulasi-brand' class='form-control' required=''>" +
                        "<option value=''>Pilih Region Dulu</option>" +
                    "</select>"
                );
            }

            if (type) {
                $('#simulasi-type').replaceWith(
                    "<select name='type_id' id='simulasi-type' class='form-control' required=''>" +
                        "<option value=''>Pilih Merk Dulu</option>" +
                    "</select>"
                );
            }

            if (model) {
                $('#simulasi-model').replaceWith(
                    "<select name='model_id' id='simulasi-model' class='form-control' required=''>" +
                        "<option value=''>Pilih Type Dulu</option>" +
                    "</select>"
                );
            }

            if (year) {
                $('#simulasi-year').replaceWith(
                    "<select name='year_id' id='simulasi-year' class='form-control' required=''>" +
                        "<option value=''>Pilih Model Dulu</option>" +
                    "</select>"
                );
            }

            if (tenor) {
                $('#simulasi-tenor').replaceWith(
                    "<select name='tenor_id' id='simulasi-tenor' class='form-control' required=''>" +
                        "<option value=''>Pilih Region Dulu</option>" +
                    "</select>"
                );
            }
        }

        function reset_result(
            result_nilai_kendaraan = true, result_ajukan_pinjaman = true, result_bunga = true, result_tenor = true, result_potongan_asuransi = true,
            result_potongan_admin = true, result_potongan_provisi = true, result_potongan_polis = true, result_total_potongan = true, result_disbursement = true,
            result_total_ph = true, result_cicilan_perbulan = true, simulasi_nilai_kendaraan = true, simulasi_maximum = true, simulasi_ajukan_pinjaman = true
        ) {
            if (result_nilai_kendaraan) $('#result-nilai-kendaraan').text('');
            if (result_ajukan_pinjaman) $('#result-ajukan-pinjaman').text('');
            if (result_bunga) $('#result-bunga').text('');
            if (result_tenor) $('#result-tenor').text('');
            if (result_potongan_asuransi) $('#result-potongan-asuransi').text('');
            if (result_potongan_admin) $('#result-potongan-admin').text('');
            if (result_potongan_provisi) $('#result-potongan-provisi').text('');
            if (result_potongan_polis) $('#result-potongan-polis').text('');
            if (result_total_potongan) $('#result-total-potongan').text('');
            if (result_disbursement) $('#result-disbursement').text('');
            if (result_total_ph) $('#result-total-ph').text('');
            if (result_cicilan_perbulan) $('#result-cicilan-perbulan').text('');

            if (simulasi_nilai_kendaraan) $('#simulasi-nilai-kendaraan').val('');
            if (simulasi_maximum) $('#simulasi-maximum').val('');
            if (simulasi_ajukan_pinjaman) $('#simulasi-ajukan-pinjaman').val('');
        }

        /* data counter */
        function function_total_ph() {
            if (ajukan_pinjaman > 0) {
                total_ph = parseFloat(ajukan_pinjaman) + parseFloat(total_sisa_assurance);
                $('#result-total-ph').text(format_money(total_ph));
            }
        }
        function function_potongan_provisi() {
            if (total_ph > 0 && dropdown_region_selected > 0) {
                potongan_provisi = Math.ceil(((total_ph * provisi_percentage[dropdown_region_selected]) / 100) / 1000) * 1000;
                console.log(potongan_provisi);
                $('#result-potongan-provisi').text(format_money(parseFloat(potongan_provisi)));
            }
        }
        function function_total_potongan() {
            if (assurance_final_price[0] > 0 && dropdown_region_selected > 0 && potongan_provisi > 0) {
                total_potongan = parseFloat(assurance_final_price[0]) + parseFloat(potongan_admin[dropdown_region_selected]) + parseFloat(potongan_polis[dropdown_region_selected]) + parseFloat(potongan_provisi);
                $('#result-total-potongan').text(format_money(parseFloat(total_potongan)));
            }
        }
        function function_disbursement() {
            if (ajukan_pinjaman > 0 && total_potongan > 0) {
                disbursement = Math.ceil((ajukan_pinjaman - total_potongan) / 1000) * 1000;
                $('#result-disbursement').text(format_money(parseFloat(disbursement)));
            }
        }
        function function_cicilan_perbulan() {
            if (total_ph > 0 && dropdown_tenor_selected > 0 && current_bunga > 0 && total_year > 0) {
                cicilan_perbulan = parseFloat(total_ph) / tenor[dropdown_tenor_selected];
                cicilan_perbulan = cicilan_perbulan + ((cicilan_perbulan * current_bunga * total_year) / 100);
                cicilan_perbulan = Math.ceil(cicilan_perbulan / 1000) * 1000;

                $('#result-cicilan-perbulan').text(format_money(parseFloat(cicilan_perbulan)));
            }
        }

        function refresh_data(statement) {
            if (statement > 0) {
                if (total_year == 1) total_sisa_assurance = 0;
                else if (total_year == 2) total_sisa_assurance = assurance_final_price[1] - assurance_final_price[0];
                else if (total_year == 3) total_sisa_assurance = assurance_final_price[2] - assurance_final_price[0];
                else if (total_year == 4) total_sisa_assurance = assurance_final_price[3] - assurance_final_price[0];
                else if (total_year == 5) total_sisa_assurance = assurance_final_price[4] - assurance_final_price[0];

                total_ph = parseFloat(ajukan_pinjaman) + parseFloat(total_sisa_assurance);

                $('#result-total-ph').text(format_money(total_ph));

                function_total_ph();
                function_potongan_provisi();
                function_total_potongan();
                function_disbursement();
                function_cicilan_perbulan();

                if (potongan_assurance > 0) $('#result-potongan-asuransi').text(format_money(parseFloat(potongan_assurance)));
                console.log(potongan_assurance);
            }
        }
    </script>
@endsection