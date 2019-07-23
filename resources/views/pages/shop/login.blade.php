@extends('template')

@section('title', 'Tentang Kami')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">
@endsection

@section('content-container')
    <div class="my-5">
        <div class="row">
            <div class="col-6">
                <div class="rounded shadow p-4">
                    <h5 class="font-weight-bold">Masuk ke SobatCNAF</h5>
                    <p class="text-black-50">Lanjutkan proses belanja Anda dengan login ke SobatCNAF</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('EMail') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 clearfix">
                                <button type="submit" class="btn bg-881a1b px-4 w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <p class="text-black-50 m-0">Belum kenal SobatCNAF?</p>
                                <a href="{{ route('register') }}" class="text-decoration-none" style="color: #881a1b;">Biarkan kami mengenalmu</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6 text-center">
                <h5 class="font-weight-bold">Belanja dengan beragam keuntungan</h5>
                <p class="text-black-50">Cari tahu bagaimana cara mendapatkan beragam keuntungan selama berbelanja di SobatCNAF</p>
                <p><a href="{{ route('how.to.shop') }}" class="btn bg-881a1b">Pelajari Sekarang</a></p>
                <img src="{{ asset('public/images/shop.png') }}" alt="" width="400">
            </div>
        </div>
    </div>
@endsection