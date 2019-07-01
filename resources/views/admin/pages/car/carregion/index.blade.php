@extends('admin.template')

@section('title', 'Car Region')

@section('stylesheets')
    <style type="text/css">
        .hidden {
            display: none;
        }
    </style>
@endsection

@section('pageheader')
    <div class="page-header">
        <h1 class="page-title">Car</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Regions</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Add -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modal-title">Add Region</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Region Name')) }}
                                        <div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('admin_fee', 'Admin Fee', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Rp.</span>
                                            </div>
                                            {{ Form::number('admin_fee', null, array('class' => 'form-control', 'id' => 'add-admin-fee', 'required' => '', 'placeholder' => 'XXX,XXX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">.00</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-add-admin-fee p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('provisi_percentage', 'Provisi Percentage', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            {{ Form::text('provisi_percentage', null, array('class' => 'form-control', 'id' => 'add-provisi-percentage', 'required' => '', 'placeholder' => 'XX.XX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">%</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-add-provisi-percentage p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('polis_fee', 'Polis Fee', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Rp.</span>
                                            </div>
                                            {{ Form::number('polis_fee', null, array('class' => 'form-control', 'id' => 'add-polis-fee', 'required' => '', 'placeholder' => 'XXX,XXX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">.00</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-add-polis-fee p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Show -->
    <div class="modal fade" id="show-modal" tabindex="-1" role="dialog" aria-labelledby="show-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show-modal-title">Show</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 150px;">Name</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-name"></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Admin Fee</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-admin-fee"></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Provisi Percentage</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-provisi-percentage"></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Polis Fee</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-polis-fee"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-title">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="edit-form">
                        <input type="text" name="" id="id-edit" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'carregion Name')) }}
                                        <div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('admin_fee', 'Admin Fee', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Rp.</span>
                                            </div>
                                            {{ Form::number('admin_fee', null, array('class' => 'form-control', 'id' => 'edit-admin-fee', 'placeholder' => 'XXX,XXX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">.00</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-edit-admin-fee p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('provisi_percentage', 'Provisi Percentage', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            {{ Form::text('provisi_percentage', null, array('class' => 'form-control', 'id' => 'edit-provisi-percentage', 'placeholder' => 'XX.XX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">%</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-edit-provisi-percentage p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ Form::label('polis_fee', 'Polis Fee', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Rp.</span>
                                            </div>
                                            {{ Form::number('polis_fee', null, array('class' => 'form-control', 'id' => 'edit-polis-fee', 'placeholder' => 'XXX,XXX')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info text-white">.00</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hidden error-edit-polis-fee p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit" data-dismiss="modal">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Region?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">Car Region List</h3>
                </header>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <a href="javascript:void(0)" class="btn btn-sm btn-success add-carregion">
                                    <i class="icon md-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(count($carRegions) > 0)
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Admin Fee</th>
                                        <th>Provisi Percentage</th>
                                        <th>Polis Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="carregions-crud">
                                    @foreach($carRegions as $carregion)
                                        <tr id="carregion-id-{{ $carregion->id }}">
                                            <td>{{ $carregion->name }}</td>
                                            <td>Rp. {{ number_format($carregion->admin_fee) }},-</td>
                                            <td>{{ $carregion->provisi_percentage }}%</td>
                                            <td>Rp. {{ number_format($carregion->polis_fee) }},-</td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" data-id="{{ $carregion->id }}" data-name="{{ $carregion->name }}" data-adminfee="{{ $carregion->admin_fee }}" data-provisipercentage="{{ $carregion->provisi_percentage }}" data-polisfee="{{ $carregion->polis_fee }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-carregion" data-toggle="tooltip" data-original-title="Show">
                                                    <i class="icon md-wrench" aria-hidden="true"></i> Show
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $carregion->id }}" data-name="{{ $carregion->name }}" data-adminfee="{{ $carregion->admin_fee }}" data-provisipercentage="{{ $carregion->provisi_percentage }}" data-polisfee="{{ $carregion->polis_fee }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-carregion" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon md-edit" aria-hidden="true"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $carregion->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-carregion" data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="icon md-delete" aria-hidden="true"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    <!-- <h3 class="no-result mt-2">No results found</h3> -->
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Admin Fee</th>
                                        <th>Provisi Percentage</th>
                                        <th>Polis Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="carregions-crud">

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{--    {{ Html::script('public/plugin/cleave/dist/cleave.min.js') }}--}}

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        /* Add */
        $(document).on('click', '.add-carregion', function() {
            $('#add-form').trigger('reset');
            $('#add-modal').modal('show');
        });

        $('#add-form').keydown(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                add_submit();
                $('#add-modal').modal('hide');
            }
        });

        $('.modal-footer').on('click', '.add', function() {
            add_submit();
        });


        /* Show */
        $(document).on('click', '.show-carregion', function() {
            $('.show-name').text($(this).data('name'));
            $('.show-admin-fee').text('Rp. ' + format_money($(this).data('adminfee')) + ',-');
            $('.show-provisi-percentage').text($(this).data('provisipercentage') + '%');
            $('.show-polis-fee').text('Rp. ' + format_money($(this).data('polisfee')) + ',-');
            $('#show-modal').modal('show');
        });

        /* Edit */
        $(document).on('click', '.edit-carregion', function() {
            $('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#edit-admin-fee').val($(this).data('adminfee'));
            $('#edit-provisi-percentage').val($(this).data('provisipercentage'));
            $('#edit-polis-fee').val($(this).data('polisfee'));
            $('#edit-modal').modal('show');

            id_edit = $(this).data('id');
        });

        $('#edit-form').keydown(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                edit_submit();
                $('#edit-modal').modal('hide');
            }
        });

        $('.modal-footer').on('click', '.edit', function() {
            edit_submit();
        });

        /* Delete */
        $(document).on('click', '.delete-carregion', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'carregion/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Region!', 'Success Alert', {timeOut: 5000});
                    $('#carregion-id-' + id).remove();
                }
            });
        });

        function add_submit() {
            var add_form_data = new FormData();

            name = $('#add-name').val();
            admin_fee = $('#add-admin-fee').val();
            provisi_percentage = $('#add-provisi-percentage').val();
            polis_fee = $('#add-polis-fee').val();

            add_form_data.append('name', name);
            add_form_data.append('admin_fee', admin_fee);
            add_form_data.append('provisi_percentage', provisi_percentage);
            add_form_data.append('polis_fee', polis_fee);

            $.ajax({
                type: 'POST',
                url: 'carregion',
                data: add_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-add-name').addClass('hidden');
                    $('.error-add-admin-fee').addClass('hidden');
                    $('.error-add-provisi-percentage').addClass('hidden');
                    $('.error-add-polis-fee').addClass('hidden');
                    if (data.errors) {
                        setTimeout(function() {
                            $('#add-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        /*if (data.errors.name) {
                            toastr.error('Name Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-add-name').removeClass('hidden');
                            $('.error-add-name').text(data.errors.name);
                        }
                        if (data.errors.phone) {
                            toastr.error('Phone Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-add-phone').removeClass('hidden');
                            $('.error-add-phone').text(data.errors.phone);
                        }
                        if (data.errors.image) {
                            toastr.error('Image Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-add-image').removeClass('hidden');
                            $('.error-add-image').text(data.errors.image);
                        }
                        if (data.errors.image_logo) {
                            toastr.error('Image Logo Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-add-image-logo').removeClass('hidden');
                            $('.error-add-image-logo').text(data.errors.image_logo);
                        }*/
                    } else {
                        toastr.success('Successfully added Region!', 'Success Alert', {timeOut: 5000});
                        $('#datatable').append(
                            "<tr id='carregion-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" + data.admin_fee + "</td>" +
                                "<td>" + data.provisi_percentage + "%" + "</td>" +
                                "<td>" + data.polis_fee + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-adminfee='" + data.admin_fee + "' data-provisipercentage='" + data.provisi_percentage + "' data-polisfee='" + data.polis_fee + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-carregion' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-adminfee='" + data.admin_fee + "' data-provisipercentage='" + data.provisi_percentage + "' data-polisfee='" + data.polis_fee + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-carregion' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-carregion' data-toggle='tooltip' data-original-title='Delete'>" +
                                        "<i class='icon md-delete' aria-hidden='true'></i> Delete" +
                                    "</a>" +
                                "</td>" +
                            "</tr>");
                    }
                },
                error: function(data) {
                    toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                }
            });
        }

        function edit_submit() {
            var edit_form_data = new FormData();

            id = $('#id-edit').val();
            name = $('#edit-name').val();
            admin_fee = $('#edit-admin-fee').val();
            provisi_percentage = $('#edit-provisi-percentage').val();
            polis_fee = $('#edit-polis-fee').val();

            edit_form_data.append('id', id);
            edit_form_data.append('name', name);
            edit_form_data.append('admin_fee', admin_fee);
            edit_form_data.append('provisi_percentage', provisi_percentage);
            edit_form_data.append('polis_fee', polis_fee);
            edit_form_data.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: 'carregion/' + id_edit,
                data: edit_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-edit-name').addClass('hidden');
                    $('.error-edit-admin-fee').addClass('hidden');
                    $('.error-edit-provisi-percentage').addClass('hidden');
                    $('.error-edit-polis-fee').addClass('hidden');
                    if (data.errors) {
                        setTimeout(function() {
                            $('#edit-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        /*if (data.errors.name) {
                            toastr.error('Name Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-edit-name').removeClass('hidden');
                            $('.error-edit-name').text(data.errors.name);
                        }
                        if (data.errors.phone) {
                            toastr.error('Phone Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-edit-phone').removeClass('hidden');
                            $('.error-edit-phone').text(data.errors.phone);
                        }
                        if (data.errors.image) {
                            toastr.error('Image Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-edit-image').removeClass('hidden');
                            $('.error-edit-image').text(data.errors.image);
                        }
                        if (data.errors.image_logo) {
                            toastr.error('Image Logo Error!', 'Error Alert', {timeOut: 5000});
                            $('.error-add-image-logo').removeClass('hidden');
                            $('.error-add-image-logo').text(data.errors.image_logo);
                        }*/
                    } else {
                        toastr.success('Successfully updated Region!', 'Success Alert', {timeOut: 5000});
                        $('#carregion-id-' + data.id).replaceWith(
                            "<tr id='carregion-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" + data.admin_fee + "</td>" +
                                "<td>" + data.provisi_percentage + "%" + "</td>" +
                                "<td>" + data.polis_fee + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-adminfee='" + data.admin_fee + "' data-provisipercentage='" + data.provisi_percentage + "' data-polisfee='" + data.polis_fee + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-carregion' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-adminfee='" + data.admin_fee + "' data-provisipercentage='" + data.provisi_percentage + "' data-polisfee='" + data.polis_fee + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-carregion' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-carregion' data-toggle='tooltip' data-original-title='Delete'>" +
                                        "<i class='icon md-delete' aria-hidden='true'></i> Delete" +
                                    "</a>" +
                                "</td>" +
                            "</tr>");
                    }
                },
                error: function(data) {
                    toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                }
            });
        }

        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }
    </script>
@endsection