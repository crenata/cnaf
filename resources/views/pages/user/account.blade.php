@extends('template')

@section('title', 'Account')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">

    <style type="text/css">
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            display: none;
        }

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

@section('content')
    <div class="loading">
        <img src="{{ asset('public/images/loading-ring.gif') }}" alt="" width="100" height="100">
    </div>
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
                            {{--<h5 class="font-weight-bold">Anda belum memiliki pengajuan, klik <a href="{{ route('simulasi') }}" class="">disini</a> untuk melakukan pengajuan.</h5>--}}
                            <h5 class="font-weight-bold">Status Pengajuan Anda</h5>
                            <div class="border rounded p-3">
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <p class="m-0">Fri, 18 July 2019 - 15:05:11</p>
                                        <p class="m-0">Dummy User</p>
                                        <p class="m-0">AUDI 1.8 AT A4 2013</p>
                                        <p class="m-0">Rp. 238,387,000,-</p>
                                    </div>
                                    <div class="col-6 border-left">
                                        <p class="m-0 d-inline-block">Status</p><p class="w-75 m-0 d-inline-block text-right"><i class="fas fa-sync-alt"></i></p>
                                        <p class="m-0">Dalam proses</p>
                                        <p class="m-0">Mohon menunggu, tim kami akan memverifikasi data</p>
                                        <p class="m-0">Anda akan segera dihubungi kembali</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="w-100">
                        <div class="rounded border p-4">
                            <h5 class="font-weight-bold">Status Pesanan Anda</h5>
                            <div class="{{--table-responsive --}}">
                                @foreach($transactions as $transaction)
                                    <table class="ui table table-bordered table-striped table-hover {{ ($loop->first) ? 'mt-3' : 'mt-5' }}" id="datatable">
                                        <tbody>
                                            <tr class="bg-881a1b">
                                                <td colspan="3">
                                                    <div class="row">
                                                        <div class="col-6">Transaksi #UN32NB3RB8</div>
                                                        <div class="col-6 text-right">{{ date('D, j F Y - H:i:s', strtotime($transaction->created_at)) }}</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach($transaction->transaction_vendors as $transaction_vendor)
                                                <tr>
                                                    <td>
                                                        <p class="m-0">Vendor</p>
                                                        <p class="m-0"><small><b>#{{ $transaction_vendor->vendor->name }}</b></small></p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">Status</p>
                                                        <p class="m-0"><small><b>Menunggu Vendor</b></small></p>
                                                    </td>
                                                    <td>
                                                        <p class="m-0">Total Belanja</p>
                                                        <p class="m-0"><small><b>Rp. {{ number_format($transaction_vendor->total) }},-</b></small></p>
                                                    </td>
                                                </tr>
                                                @foreach($transaction_vendor->transaction_vendor_details as $transaction_vendor_detail)
                                                    <tr>
                                                        <td><img src="{{ $transaction_vendor_detail->item->image1 }}" alt="" width="100" class=""></td>
                                                        <td colspan="2" style="vertical-align: middle;">
                                                            <p class="m-0">{{ $transaction_vendor_detail->item->name }}</p>
                                                            <p class="m-0">Rp. {{ number_format($transaction_vendor_detail->price) }},- x {{ $transaction_vendor_detail->qty }} Items</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            <tr class="bg-outline-881a1b">
                                                <td colspan="3">
                                                    <div class="row">
                                                        <div class="col-6">Total</div>
                                                        <div class="col-6 text-right">Rp. {{ number_format($transaction->total) }},-</div>
                                                    </div>
                                                </td>
                                            </tr>
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
                                            {{ Form::label('my-account-email', 'Email Address *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('my-account-email', Auth::user()->email, array('class' => 'form-control', 'id' => 'my-account-email', 'placeholder' => 'Email', 'disabled' => '')) }}
                                                <div class="alert alert-danger d-none error-my-account-email p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('my-account-name', 'Nama Lengkap *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('my-account-name', Auth::user()->name, array('class' => 'form-control', 'id' => 'my-account-name', 'placeholder' => 'Name')) }}
                                                <div class="alert alert-danger d-none error-my-account-name p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('my-account-phone', 'Phone *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('my-account-phone', Auth::user()->phone, array('class' => 'form-control', 'id' => 'my-account-phone', 'required' => '', 'placeholder' => 'XXXX-XXXX-XXXX')) }}
                                                <div class="alert alert-danger d-none error-my-account-phone p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            {{ Form::label('my-account-address', 'Alamat *', array('class' => 'col-sm-6 col-form-label')) }}
                                            <div class="col-sm-12">
                                                {{ Form::text('my-account-address', Auth::user()->address, array('class' => 'form-control', 'id' => 'my-account-address', 'required' => '', 'placeholder' => 'Alamat')) }}
                                                <div class="alert alert-danger d-none error-my-account-address p-2 mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer p-0 mt-3">
                                <button type="button" class="btn bg-881a1b rounded mt-3 my-account-save">Save</button>
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
                                <button type="button" class="btn bg-881a1b rounded mt-3 change-password-save">Save</button>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

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

        $('#form-my-account').keydown(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                update_profile();
            }
        });

        $('#form-change-password').keydown(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                change_password();
            }
        });

        $('.modal-footer').on('click', '.my-account-save', function() {
            update_profile();
        });

        $('.modal-footer').on('click', '.change-password-save', function() {
            change_password();
        });

        function update_profile() {
            let my_account = new FormData();

            let name = $('#my-account-name').val();
            let phone = $('#my-account-phone').val();
            let address = $('#my-account-address').val();

            my_account.append('name', name);
            my_account.append('phone', phone);
            my_account.append('address', address);
            my_account.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: '{!! url("user/" . Auth::user()->id . "/profile") !!}' + '/' + '{!! Auth::user()->id !!}',
                data: my_account,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('.container').css('display', 'none');
                },
                success: function(data) {
                    $('.error-my-account-name').addClass('d-none');
                    $('.error-my-account-phone').addClass('d-none');
                    $('.error-my-account-address').addClass('d-none');

                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');

                    if (data.errors) {
                        toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});

                        if (data.errors.name) {
                            $('.error-my-account-name').removeClass('d-none');
                            $('.error-my-account-name').text(data.errors.name);
                        }
                        if (data.errors.phone) {
                            $('.error-my-account-phone').removeClass('d-none');
                            $('.error-my-account-phone').text(data.errors.phone);
                        }
                        if (data.errors.address) {
                            $('.error-my-account-address').removeClass('d-none');
                            $('.error-my-account-address').text(data.errors.address);
                        }
                    } else {
                        toastr.success('Profile was successfully updated!', 'Success Alert', {timeOut: 5000});

                        if (data.name) {
                            $('.username-nav').text(data.name);
                        }
                    }
                },
                error: function(data) {
                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');
                    toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                }
            });
        }

        function change_password() {
            let change_password = new FormData();

            let old_password = $('#old-password').val();
            let new_password = $('#new-password').val();
            let confirm_password = $('#confirm-password').val();

            change_password.append('old_password', old_password);
            change_password.append('new_password', new_password);
            change_password.append('confirm_password', confirm_password);
            change_password.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: '{!! route('user.change.password') !!}',
                data: change_password,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('.container').css('display', 'none');
                },
                success: function(data) {
                    $('.error-old-password').addClass('d-none');
                    $('.error-new-password').addClass('d-none');
                    $('.error-confirm-password').addClass('d-none');

                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');

                    if (data.errors) {
                        toastr.error('Error!', 'Error Alert', {timeOut: 5000});

                        if (data.errors.old_password) {
                            $('.error-old-password').removeClass('d-none');
                            $('.error-old-password').text(data.errors.old_password);
                        }
                        if (data.errors.new_password) {
                            $('.error-new-password').removeClass('d-none');
                            $('.error-new-password').text(data.errors.new_password);
                        }
                        if (data.errors.confirm_password) {
                            $('.error-confirm-password').removeClass('d-none');
                            $('.error-confirm-password').text(data.errors.confirm_password);
                        }
                    } else {
                        toastr.success('Password was successfully changed!', 'Success Alert', {timeOut: 5000});
                    }
                },
                error: function(data) {
                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');
                    toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                }
            });
        }
    </script>
@endsection