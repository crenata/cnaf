@extends('template')

@section('title', 'Account')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">

    <style type="text/css">
        .naccs .menu div {
            padding: 0.5rem 1rem 0.5rem 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            position: relative;
            transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
        }
        .naccs .menu div.active {
            color: #FBC02D;
            padding: 0.5rem 1rem 0.5rem 1rem;
        }

        .naccs .menu div span.light {
            height: 0.5rem;
            width: 0.5rem;
            position: absolute;
            left: 1rem;
            background-color: white;
            border-radius: 100%;
            transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
        }
        .naccs .menu div.active span.light {
            background-color: #FBC02D;
            top: 0;
            left: 0;
            height: 100%;
            width: 3px;
            border-radius: 0;
        }

        ul.nacc li {
            opacity: 0;
            -webkit-transform: translateX(50px);
            transform: translateX(50px);
            position: absolute;
            z-index: -2;
            transition: 1s all cubic-bezier(0.075, 0.82, 0.165, 1);
        }
        ul.nacc li.active {
            transition-delay: .3s;
            opacity: 1;
            z-index: 2;
            -webkit-transform: translateX(0px);
            transform: translateX(0px);
        }
    </style>
@endsection

@section('content-container')
    <div class="naccs my-5">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <div class="bg-881a1b rounded">
                    <h5 class="p-3">Selamat Datang</h5>
                    <div class="menu">
                        <div class="active d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Status Pengajuan</span>
                        </div>
                        <div class="d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Order Saya</span>
                        </div>
                        <div class="d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Akun Saya</span>
                        </div>
                        <div class="d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Ganti Password</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <ul class="nacc list-unstyled">
                    <li class="active w-100">
                        <div class="rounded p-4">
                            <h5 class="font-weight-bold">Anda belum memiliki pengajuan, klik <a href="{{ route('simulasi') }}" class="">disini</a> untuk melakukan pengajuan.</h5>
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="rounded border p-4">
                            <h5 class="font-weight-bold">Status Pesanan Anda</h5>
                            <div class="{{--table-responsive --}}">
                                @foreach([0, 1, 2] as $a)
                                    <table class="ui table table-bordered table-striped table-hover mt-5" id="datatable">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="row">
                                                        <div class="col-6">Transaksi #UN32NB3RB8</div>
                                                        <div class="col-6 text-right">Kamis, 18 Juli 2019 - 17:32:31</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach([0, 1] as $b)
                                                <tr>
                                                    <td>
                                                        <p class="m-0">Vendor</p>
                                                        <p class="m-0"><small><b>#My Kitchen Art</b></small></p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">Status</p>
                                                        <p class="m-0"><small><b>Menunggu Vendor</b></small></p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">Total Belanja</p>
                                                        <p class="m-0"><small><b>Rp. 100,000,000,-</b></small></p>
                                                    </td>
                                                </tr>
                                                @foreach([0, 1] as $c)
                                                    <tr>
                                                        <td><img src="http://localhost/storage/cnaf/items/CNAF-20190710-IMAGE-c63038d20ab1c88687f09d952935f0015d2569878b555.png" alt="" width="100" class=""></td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <p class="m-0">Ariston Built-In Oven HIHGYUI</p>
                                                            <p class="m-0">Rp. 25,000,000,- x 4 Items</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="rounded border p-4">
                            <h5 class="font-weight-bold">Akun Saya</h5>
                            <form class="mt-3" id="form-my-account">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('email', 'Email Address *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('email', Auth::user()->email, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'disabled' => '')) }}
                                                <div class="alert alert-danger d-none error-email p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('name', 'Nama Lengkap *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('name', Auth::user()->name, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name')) }}
                                                <div class="alert alert-danger d-none error-name p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('phone', 'Phone *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('phone', Auth::user()->phone, array('class' => 'form-control', 'id' => 'phone', 'required' => '', 'placeholder' => 'xxx-xxx-xxx')) }}
                                                <div class="alert alert-danger d-none error-phone p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('address', 'Alamat *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('address', Auth::user()->address, array('class' => 'form-control', 'id' => 'address', 'required' => '', 'placeholder' => 'Alamat')) }}
                                                <div class="alert alert-danger d-none error-address p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer p-0 mt-3">
                                <button type="button" class="btn bg-881a1b rounded mt-3 save">Save</button>
                            </div>
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="rounded border p-4">
                            <h5 class="font-weight-bold">Ganti Password</h5>
                            <form class="mt-3" id="form-change-password">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('old-password', 'Old Password *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::password('old-password', array('class' => 'form-control', 'id' => 'old-password', 'required' => '', 'placeholder' => 'Old Password')) }}
                                                <div class="alert alert-danger d-none error-old-password p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('new-password', 'New Password *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::password('new-password', array('class' => 'form-control', 'id' => 'new-password', 'required' => '', 'placeholder' => 'New Password')) }}
                                                <div class="alert alert-danger d-none error-new-password p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('confirm-password', 'Confirm Password *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::password('confirm-password', array('class' => 'form-control', 'id' => 'confirm-password', 'required' => '', 'placeholder' => 'Confirm Password')) }}
                                                <div class="alert alert-danger d-none error-confirm-password p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer p-0 mt-3">
                                <button type="button" class="btn bg-881a1b rounded mt-3 save">Save</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".naccs .menu div", function() {
            let numberIndex = $(this).index();

            if (!$(this).is("active")) {
                $(".naccs .menu div").removeClass("active");
                $(".naccs ul li").removeClass("active");

                $(this).addClass("active");
                $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

                let listItemHeight = $(".naccs ul").find("li:eq(" + numberIndex + ")").innerHeight();
                $(".naccs ul").height(listItemHeight + "px");
            }
        });

        $('div.active').trigger('click');
    </script>
@endsection