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
                            <select name="wilayah_id" id="simulasi-wilayah" class="form-control" required="">
                                @foreach(array('DKI', 'Jawa', 'Non Jawa') as $wilayah)
                                    <option value="{{ $wilayah }}">{{ $wilayah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('merk_id', 'Merk Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="merk_id" id="simulasi-merk" class="form-control" required="">
                                @foreach(array('Audi', 'BMW', 'Chevrolet') as $merk)
                                    <option value="{{ $merk }}">{{ $merk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('type_id', 'Type Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="type_id" id="simulasi-type" class="form-control" required="">
                                @foreach(array('A4', 'A6', 'A8') as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('model_id', 'Model Mobil', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="model_id" id="simulasi-model" class="form-control" required="">
                                @foreach(array('1.8 AT', '1.2 A/T') as $model)
                                    <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        {{ Form::label('tahun_id', 'Tahun Pembuatan', array('class' => 'col-sm-6 col-form-label')) }}
                        <div class="col-sm-12">
                            <select name="tahun_id" id="simulasi-tahun" class="form-control" required="">
                                @foreach(array('2016', '2017', '2018') as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
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
            <p class="m-0"><a href="#" class="text-body small"><ins>Baca FAQ (Pertanyaan umum)</ins></a></p>
            <p class="m-0"><a href="#" class="text-body small"><ins>Baca Syarat dan Ketentuan</ins></a></p>
        </div>

        <div class="text-center mt-3">
            <a href="#" class="btn btn-sm bg-881a1b rounded-pill px-3">AJUKAN SEKARANG &nbsp; <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
@endsection