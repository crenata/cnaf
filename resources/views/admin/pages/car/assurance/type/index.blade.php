@extends('admin.template')

@section('title', 'Assurance Type')

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
            <li class="breadcrumb-item active">Assurance Types</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Add -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modal-title">Add Assurance Type</h5>
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
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Assurance Type Name')) }}
                                        <div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
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
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Assurance Type Name')) }}
                                        <div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
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
                    <h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Assurance Type?</h5>
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
                    <h3 class="panel-title">Assurance Type List</h3>
                </header>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-15">
                                <a href="javascript:void(0)" class="btn btn-sm btn-success add-assurance">
                                    <i class="icon md-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(count($assuranceTypes) > 0)
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="assurances-crud">
                                    @foreach($assuranceTypes as $assurance)
                                        <tr id="assurance-id-{{ $assurance->id }}">
                                            <td>{{ $assurance->name }}</td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" data-id="{{ $assurance->id }}" data-name="{{ $assurance->name }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-assurance" data-toggle="tooltip" data-original-title="Show">
                                                    <i class="icon md-wrench" aria-hidden="true"></i> Show
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $assurance->id }}" data-name="{{ $assurance->name }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-assurance" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon md-edit" aria-hidden="true"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $assurance->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-assurance" data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="icon md-delete" aria-hidden="true"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="assurances-crud">

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
        $(document).on('click', '.add-assurance', function() {
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
        $(document).on('click', '.show-assurance', function() {
            $('.show-name').text($(this).data('name'));
            $('#show-modal').modal('show');
        });

        /* Edit */
        $(document).on('click', '.edit-assurance', function() {
            $('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
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
        $(document).on('click', '.delete-assurance', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'assurancetype/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Assurance Type!', 'Success Alert', {timeOut: 5000});
                    $('#assurance-id-' + id).remove();
                }
            });
        });

        function add_submit() {
            let add_form_data = new FormData();

            name = $('#add-name').val();

            add_form_data.append('name', name);

            $.ajax({
                type: 'POST',
                url: 'assurancetype',
                data: add_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-add-name').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function() {
                            $('#add-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully added Assurance Type!', 'Success Alert', {timeOut: 5000});
                        $('#datatable').append(
                            "<tr id='assurance-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-assurance' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-assurance' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-assurance' data-toggle='tooltip' data-original-title='Delete'>" +
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

            edit_form_data.append('id', id);
            edit_form_data.append('name', name);
            edit_form_data.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: 'assurancetype/' + id_edit,
                data: edit_form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.error-edit-name').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function() {
                            $('#edit-modal').modal('show');
                            toastr.error('Validation Error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully updated Assurance Type!', 'Success Alert', {timeOut: 5000});
                        $('#assurance-id-' + data.id).replaceWith(
                            "<tr id='assurance-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-assurance' data-toggle='tooltip' data-original-title='Show'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-assurance' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-assurance' data-toggle='tooltip' data-original-title='Delete'>" +
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