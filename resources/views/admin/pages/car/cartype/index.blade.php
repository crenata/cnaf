@extends('admin.template')

@section('title', 'Car Type')

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
            <li class="breadcrumb-item active">Types</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Add -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modal-title">Add Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Type Name')) }}
                                        <div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

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
                                    {{ Form::label('car_brand_id', 'Car Brand', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <select name="car_brand_id" id="add-car-brand" class="form-control" required="">
                                            <option value="">-- Select Region First --</option>
                                            {{--@foreach($carBrands as $carbrand)
                                                <option value="{{ $carbrand->id }}">{{ $carbrand->name }}</option>
                                            @endforeach--}}
                                        </select>
                                        <div class="alert alert-danger hidden error-add-car-brand p-2 mt-2"></div>
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
                                    <td style="width: 100px;">Name</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-name"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;">Region</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-car-region"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;">Brand</td>
                                    <td style="width: 10px;">:</td>
                                    <td class="show-car-brand"></td>
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
                                    {{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Type Name')) }}
                                        <div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

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
                                    {{ Form::label('car_brand_id', 'Car Brand', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        <select name="car_brand_id" id="edit-car-brand" class="form-control">
                                            <option value="" id="carbrand-select">-- Select Region First --</option>
                                            {{--@foreach($carBrands as $carbrand)
                                                <option value="{{ $carbrand->id }}" id="vendor-select">{{ $carbrand->name }}</option>
                                            @endforeach--}}
                                        </select>
                                        <div class="alert alert-danger hidden error-edit-car-brand p-2 mt-2"></div>
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
                    <h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Type?</h5>
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
                    <h3 class="panel-title">Car Type List</h3>
                </header>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <a href="javascript:void(0)" class="btn btn-sm btn-success add-cartype">
                                    <i class="icon md-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(count($carTypes) > 0)
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Region</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cartypes-crud">
                                    @foreach($carTypes as $cartype)
                                        <tr id="cartype-id-{{ $cartype->id }}">
                                            <td>{{ $cartype->name }}</td>
                                            <td>{{ $cartype->car_region->name }}</td>
                                            <td>{{ $cartype->car_brand->name }}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" data-id="{{ $cartype->id }}" data-name="{{ $cartype->name }}" data-carregion="{{ $cartype->car_region->name }}" data-carbrand="{{ $cartype->car_brand->name }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-cartype" data-toggle="tooltip" data-original-title="Show">
                                                    <i class="icon md-wrench" aria-hidden="true"></i> Show
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $cartype->id }}" data-name="{{ $cartype->name }}" data-carregion="{{ $cartype->car_region->id }}" data-carbrand="{{ $cartype->car_brand->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-cartype" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon md-edit" aria-hidden="true"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $cartype->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-cartype" data-toggle="tooltip" data-original-title="Delete">
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
                                        <th>Region</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cartypes-crud">

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
        $(document).on('click', '.add-cartype', function() {
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
        $(document).on('click', '.show-cartype', function() {
            $('.show-name').text($(this).data('name'));
            $('.show-car-region').text($(this).data('carregion'));
            $('.show-car-brand').text($(this).data('carbrand'));
            $('#show-modal').modal('show');
        });

        /* Edit */
        $(document).on('click', '.edit-cartype', function() {
            $('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#edit-car-region').val($(this).data('carregion'));
            // $('#edit-car-brand').val($(this).data('carbrand'));
            $('#edit-modal').modal('show');

            let region_select = $(this).data('carregion');
            let brand_select = $(this).data('carbrand');

            $.ajax({
                type: 'GET',
                url: '{!! url("simulasi/carbrand") !!}' + '/' + region_select,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#edit-car-brand').replaceWith(
                            "<select name='car_brand_id' id='edit-car-brand' class='form-control' required=''>" +
                            "<option value=''>-- Select Brand --</option>");
                        $.each(data, function(index, value) {
                            if (value.id == brand_select) {
                                $('#edit-car-brand').append(
                                    "<option value='" + value.id + "' selected=''>" + value.name + "</option>"
                                );
                            } else {
                                $('#edit-car-brand').append(
                                    "<option value='" + value.id + "'>" + value.name + "</option>"
                                );
                            }
                        });
                        $('#edit-car-brand').append("</select>");
                    }
                },
                error: function(data) {
                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });

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
        $(document).on('click', '.delete-cartype', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'cartype/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Type!', 'Success Alert', {timeOut: 5000});
                    $('#cartype-id-' + id).remove();
                }
            });
        });

        $('#add-car-region').change(function() {
            $.ajax({
                type: 'GET',
                url: '{!! url("simulasi/carbrand") !!}' + '/' + $(this).val(),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#add-car-brand').replaceWith(
                            "<select name='car_brand_id' id='add-car-brand' class='form-control' required=''>" +
                            "<option value=''>-- Select Brand --</option>");
                        $.each(data, function(index, value) {
                            console.log(value);
                            $('#add-car-brand').append(
                                "<option value='" + value.id + "'>" + value.name + "</option>"
                            );
                        });
                        $('#add-car-brand').append("</select>");
                    }
                },
                error: function(data) {
                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });
        });

        $('#edit-car-region').change(function() {
            $.ajax({
                type: 'GET',
                url: '{!! url("simulasi/carbrand") !!}' + '/' + $(this).val(),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#edit-car-brand').replaceWith(
                            "<select name='car_brand_id' id='edit-car-brand' class='form-control' required=''>" +
                            "<option value=''>-- Select Brand --</option>");
                        $.each(data, function(index, value) {
                            console.log(value);
                            $('#edit-car-brand').append(
                                "<option value='" + value.id + "'>" + value.name + "</option>"
                            );
                        });
                        $('#edit-car-brand').append("</select>");
                    }
                },
                error: function(data) {
                    toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });
        });

        function add_submit() {
            var add_form_data = new FormData();

            name = $('#add-name').val();
            car_region_id = $('#add-car-region').val();
            car_brand_id = $('#add-car-brand').val();

            add_form_data.append('name', name);
            add_form_data.append('car_region_id', car_region_id);
            add_form_data.append('car_brand_id', car_brand_id);

            $.ajax({
                type: 'POST',
                url: 'cartype',
                data: add_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-add-name').addClass('hidden');
                    $('.error-add-car-region').addClass('hidden');
                    $('.error-add-car-brand').addClass('hidden');
                    if (data.errors) {
                        setTimeout(function() {
                            $('#add-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully added Brand!', 'Success Alert', {timeOut: 5000});
                        $('#datatable').append(
                            "<tr id='cartype-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" + data.car_region.name + "</td>" +
                                "<td>" + data.car_brand.name + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-carregion='" + data.car_region.name + "' data-carbrand='" + data.car_brand.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-cartype' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-carregion='" + data.car_region.id + "' data-carbrand='" + data.car_brand.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-cartype' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-cartype' data-toggle='tooltip' data-original-title='Delete'>" +
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
            car_region_id = $('#edit-car-region').val();
            car_brand_id = $('#edit-car-brand').val();

            edit_form_data.append('id', id);
            edit_form_data.append('name', name);
            edit_form_data.append('car_region_id', car_region_id);
            edit_form_data.append('car_brand_id', car_brand_id);
            edit_form_data.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: 'cartype/' + id_edit,
                data: edit_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-edit-name').addClass('hidden');
                    $('.error-edit-car-region').addClass('hidden');
                    $('.error-edit-car-brand').addClass('hidden');
                    if (data.errors) {
                        setTimeout(function() {
                            $('#edit-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully updated Brand!', 'Success Alert', {timeOut: 5000});
                        $('#cartype-id-' + data.id).replaceWith(
                            "<tr id='cartype-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" + data.car_region.name + "</td>" +
                                "<td>" + data.car_brand.name + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-carregion='" + data.car_region.name + "' data-carbrand='" + data.car_brand.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-cartype' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-carregion='" + data.car_region.id + "' data-carbrand='" + data.car_brand.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-cartype' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-cartype' data-toggle='tooltip' data-original-title='Delete'>" +
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