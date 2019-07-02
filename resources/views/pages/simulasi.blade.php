@extends('template')

@section('title', 'Simulasi')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/simulasi/xl.css') }}" media="screen and (min-width: 1200px)">
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
                                    <option value="">Pilih Wilayah Dulu</option>
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
                                        <option value="">Pilih Wilayah Dulu</option>
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
                                @foreach(array('12', '24', '36', '48') as $tenor)
                                    <option value="{{ $tenor }}">{{ $tenor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('asuransi_id', 'Pilih Asuransi', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="asuransi_id" id="simulasi-asuransi" class="form-control" required="">
                                @foreach(array('All Risk', 'Kombinasi') as $asuransi)
                                    <option value="{{ $asuransi }}">{{ $asuransi }}</option>
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
                                <input type="text" name="nilai_kendaraan" class="form-control" id="simulasi-nilai-kendaraan" disabled value="100,000,000">
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
                                <input type="text" name="maximum_pembiayaan" class="form-control" id="simulasi-minimum" disabled value="75,000,000">
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
                                <input type="text" name="ajukan_pinjaman" class="form-control" id="simulasi-nilai-kendaraan" value="75,000,000">
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
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">100,000,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Pinjaman yang di Ajukan</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">75,000,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Bunga</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">10.75%</p></div>

                <div class="col-6"><p class="m-0">Tenor</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">12</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Potongan Asuransi</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">7,800,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Potongan Admin</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">2,450,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Potongan Provisi</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">3,168,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Potongan Polis</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">50,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="mb-0 mt-1">Total Potongan</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block mb-0 mt-1">Rp. &nbsp;</p><p class="d-inline-block mb-0 mt-1">13,468,000</p><p class="d-inline-block mb-0 mt-1">,-</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Disbursement</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">239,000,000</p><p class="d-inline-block m-0">,-</p></div>
            </div>

            <div class="row small mt-3 mt-sm-3 mt-md-3 mt-lg-3 mt-xl-3">
                <div class="col-6"><p class="m-0">Total PH</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">100,000,000</p><p class="d-inline-block m-0">,-</p></div>

                <div class="col-6"><p class="m-0">Cicilan per Bulan</p></div>
                <div class="col-6"><p class="semicolon-result d-inline-block m-0">: &nbsp;</p><p class="d-inline-block m-0">Rp. &nbsp;</p><p class="d-inline-block m-0">23,000,000</p><p class="d-inline-block m-0">,-</p></div>
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

                        $('#simulasi-type').replaceWith(
                            "<select name='type_id' id='simulasi-type' class='form-control' required=''>" +
                                "<option value=''>Pilih Merk Dulu</option>" +
                            "</select>"
                        );

                        $('#simulasi-model').replaceWith(
                            "<select name='model_id' id='simulasi-model' class='form-control' required=''>" +
                                "<option value=''>Pilih Type Dulu</option>" +
                            "</select>"
                        );

                        $('#simulasi-year').replaceWith(
                            "<select name='year_id' id='simulasi-year' class='form-control' required=''>" +
                                "<option value=''>Pilih Model Dulu</option>" +
                            "</select>"
                        );

                        simulasi_brand_changed();
                    }
                },
                error: function(data) {
                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });
        });

        simulasi_brand_changed();
        simulasi_type_changed();
        simulasi_model_changed();

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

                            $('#simulasi-model').replaceWith(
                                "<select name='model_id' id='simulasi-model' class='form-control' required=''>" +
                                    "<option value=''>Pilih Type Dulu</option>" +
                                "</select>"
                            );

                            $('#simulasi-year').replaceWith(
                                "<select name='year_id' id='simulasi-year' class='form-control' required=''>" +
                                    "<option value=''>Pilih Model Dulu</option>" +
                                "</select>"
                            );

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

                            $('#simulasi-year').replaceWith(
                                "<select name='year_id' id='simulasi-year' class='form-control' required=''>" +
                                    "<option value=''>Pilih Model Dulu</option>" +
                                "</select>"
                            );

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
                                $('#simulasi-year').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            });
                            $('#simulasi-year').append("</select>");
                        }
                    },
                    error: function(data) {
                        toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                    }
                });
            });
        }
    </script>
@endsection