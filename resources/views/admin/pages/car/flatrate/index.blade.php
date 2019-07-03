@extends('admin.template')

@section('title', 'Flat Rate')

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
            <li class="breadcrumb-item active">Flat Rates</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Add -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modal-title">Add Flat Rate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('car_region_id', 'Car Region', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <select name="car_region_id" id="add-car-region" class="form-control" required="">
                                            <option value="">-- Select Region --</option>
                                            @foreach($carRegions as $carregion)
                                                <option value="{{ $carregion->id }}">{{ $carregion->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="alert alert-danger hidden error-add-car-region p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('tenor', 'Tenor', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::number('tenor', null, array('class' => 'form-control', 'id' => 'add-tenor', 'required' => '', 'placeholder' => 'Tenor')) }}
                                        <div class="alert alert-danger hidden error-add-tenor p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('rate', 'Rate', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('rate', null, array('class' => 'form-control', 'id' => 'add-rate', 'required' => '', 'placeholder' => 'Rate')) }}
                                        <div class="alert alert-danger hidden error-add-rate p-2 mt-2"></div>
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
                                    <td style="width: 100px;">Region</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-car-region"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;">Tenor</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-tenor"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;">Rate</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-rate"></td>
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
        <div class="modal-dialog" role="document">
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
                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('car_region_id', 'Car Region', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <select name="car_region_id" id="edit-car-region" class="form-control">
                                            <option value="" id="carregion-select">-- Select Region --</option>
                                            @foreach($carRegions as $carregion)
                                                <option value="{{ $carregion->id }}" id="vendor-select">{{ $carregion->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="alert alert-danger hidden error-edit-car-region p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('tenor', 'Tenor', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::number('tenor', null, array('class' => 'form-control', 'id' => 'edit-tenor', 'placeholder' => 'Tenor')) }}
                                        <div class="alert alert-danger hidden error-edit-tenor p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('rate', 'Rate', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('rate', null, array('class' => 'form-control', 'id' => 'edit-rate', 'placeholder' => 'Rate')) }}
                                        <div class="alert alert-danger hidden error-edit-rate p-2 mt-2"></div>
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
                    <h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Flat Rate?</h5>
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
                    <h3 class="panel-title">Flat Rate List</h3>
                </header>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <a href="javascript:void(0)" class="btn btn-sm btn-success add-flatrate">
                                    <i class="icon md-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(count($flatRates) > 0)
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Region</th>
                                        <th>Tenor</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="flatrates-crud">
                                    @foreach($flatRates as $flatrate)
                                        <tr id="flatrate-id-{{ $flatrate->id }}">
                                            <td>{{ $flatrate->car_region->name }}</td>
                                            <td>{{ $flatrate->tenor }} Bulan</td>
                                            <td>{{ $flatrate->rate }}%</td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" data-id="{{ $flatrate->id }}" data-carregion="{{ $flatrate->car_region->name }}" data-tenor="{{ $flatrate->tenor }}" data-rate="{{ $flatrate->rate }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-flatrate" data-toggle="tooltip" data-original-title="Show">
                                                    <i class="icon md-wrench" aria-hidden="true"></i> Show
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $flatrate->id }}" data-carregion="{{ $flatrate->car_region->id }}" data-tenor="{{ $flatrate->tenor }}" data-rate="{{ $flatrate->rate }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-flatrate" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon md-edit" aria-hidden="true"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $flatrate->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-flatrate" data-toggle="tooltip" data-original-title="Delete">
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
                                        <th>Region</th>
                                        <th>Tenor</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="flatrates-crud">

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
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        /* Add */
        $(document).on('click', '.add-flatrate', function() {
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
        $(document).on('click', '.show-flatrate', function() {
            $('.show-car-region').text($(this).data('carregion'));
            $('.show-tenor').text($(this).data('tenor') + ' Bulan');
            $('.show-rate').text($(this).data('rate') + '%');
            $('#show-modal').modal('show');
        });

        /* Edit */
        $(document).on('click', '.edit-flatrate', function() {
            $('#id-edit').val($(this).data('id'));
            $('#edit-car-region').val($(this).data('carregion'));
            $('#edit-tenor').val($(this).data('tenor'));
            $('#edit-rate').val($(this).data('rate'));
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
        $(document).on('click', '.delete-flatrate', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'flatrate/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Flat Rate!', 'Success Alert', {timeOut: 5000});
                    $('#flatrate-id-' + id).remove();
                }
            });
        });

        function add_submit() {
            var add_form_data = new FormData();

            car_region_id = $('#add-car-region').val();
            tenor = $('#add-tenor').val();
            rate = $('#add-rate').val();

            add_form_data.append('car_region_id', car_region_id);
            add_form_data.append('tenor', tenor);
            add_form_data.append('rate', rate);

            $.ajax({
                type: 'POST',
                url: 'flatrate',
                data: add_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-add-car-region').addClass('hidden');
                    $('.error-add-tenor').addClass('hidden');
                    $('.error-add-rate').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function() {
                            $('#add-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully added Flat Rate!', 'Success Alert', {timeOut: 5000});
                        $('#datatable').append(
                            "<tr id='flatrate-id-" + data.id + "'>" +
                                "<td>" + data.car_region.name + "</td>" +
                                "<td>" + data.tenor + " Bulan" + "</td>" +
                                "<td>" + data.rate + "%" + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-carregion='" + data.car_region.name + "' data-tenor='" + data.tenor + "' data-rate='" + data.rate + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-flatrate' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-carregion='" + data.car_region.id + "' data-tenor='" + data.tenor + "' data-rate='" + data.rate + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-flatrate' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-flatrate' data-toggle='tooltip' data-original-title='Delete'>" +
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
            car_region_id = $('#edit-car-region').val();
            tenor = $('#edit-tenor').val();
            rate = $('#edit-rate').val();

            edit_form_data.append('id', id);
            edit_form_data.append('car_region_id', car_region_id);
            edit_form_data.append('tenor', tenor);
            edit_form_data.append('rate', rate);
            edit_form_data.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: 'flatrate/' + id_edit,
                data: edit_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-edit-car-region').addClass('hidden');
                    $('.error-edit-tenor').addClass('hidden');
                    $('.error-edit-rate').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function() {
                            $('#edit-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully updated Flat Rate!', 'Success Alert', {timeOut: 5000});
                        $('#flatrate-id-' + data.id).replaceWith(
                            "<tr id='flatrate-id-" + data.id + "'>" +
                                "<td>" + data.car_region.name + "</td>" +
                                "<td>" + data.tenor + " Bulan" + "</td>" +
                                "<td>" + data.rate + "%" + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-carregion='" + data.car_region.name + "' data-tenor='" + data.tenor + "' data-rate='" + data.rate + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-flatrate' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-carregion='" + data.car_region.id + "' data-tenor='" + data.tenor + "' data-rate='" + data.rate + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-flatrate' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-flatrate' data-toggle='tooltip' data-original-title='Delete'>" +
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
    </script>
@endsection