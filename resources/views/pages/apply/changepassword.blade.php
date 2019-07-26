@extends('template')

@section('title', 'Change Password')

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
    </style>
@endsection

@section('content')
    <div class="loading">
        <img src="{{ asset('public/images/loading-ring.gif') }}" alt="" width="100" height="100">
    </div>
@endsection

@section('content-container')
    <div class="row my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="rounded border p-4">
                <h5 class="font-weight-bold text-center">Ganti Password</h5>
                <form class="mt-3" id="form-change-password">
                    <div class="row">
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
        </div>
        <div class="col-2"></div>
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

        $('#form-change-password').keydown(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                change_password();
            }
        });

        $('.modal-footer').on('click', '.change-password-save', function() {
            change_password();
        });

        function change_password() {
            let change_password = new FormData();

            let new_password = $('#new-password').val();
            let confirm_password = $('#confirm-password').val();

            change_password.append('new_password', new_password);
            change_password.append('confirm_password', confirm_password);
            change_password.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: '{!! route('apply.change', [$user->email, $code]) !!}',
                data: change_password,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('.container').css('display', 'none');
                },
                success: function(data) {
                    $('.error-new-password').addClass('d-none');
                    $('.error-confirm-password').addClass('d-none');

                    $('.loading').css('display', 'none');
                    $('.container').css('display', 'block');

                    if (data.errors) {
                        toastr.error('Error!', 'Error Alert', {timeOut: 5000});

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