@extends('admin.template')

@section('title', 'Blogs')

@section('stylesheets')
    {{ Html::style('public/plugin/mui-trade-template/global/vendor/dropify/dropify.css') }}

    <style type="text/css">
        td a img {
            width: 36px;
            height: 36px;
            border-radius: 100%;
        }
        .show-image {
            width: 50%;
            height: auto;
        }
        .hidden {
            display: none;
        }
    </style>
@endsection

@section('pageheader')
    <div class="page-header">
        <h1 class="page-title">Blogs</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blogs</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Add -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modal-title">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add-form" name="blog-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('name', 'Title', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Title')) }}
                                        <div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group row">
                                    {{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="input-group col-sm-12">
                                        <input type="file" name="image" id="add-image" data-plugin="dropify" data-default-file="" required="">
                                        <div class="alert alert-danger hidden error-add-image p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('body', 'Content', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::textarea('body', null, array('class' => 'form-control', 'id' => 'add-body', 'required' => '', 'placeholder' => 'Your Content here...')) }}
                                        <div class="alert alert-danger hidden error-add-body p-2 mt-2"></div>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show-modal-title">Show</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="show-title font-weight-bold"></h4>
                        <img src="" alt="" class="img-thumbnail img-fluid show-image">
                    </center>
                    <p class="show-body mt-3"></p>
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
                    <form class="form-horizontal" id="edit-form" name="blog-form" enctype="multipart/form-data">
                        <input type="text" name="" id="id-edit" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('name', 'Title', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Title')) }}
                                        <div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group row">
                                    {{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="input-group col-sm-12">
                                        <input type="file" name="image" id="edit-image" data-plugin="dropify" data-default-file="">
                                        <div class="alert alert-danger hidden error-edit-image p-2 mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    {{ Form::label('body', 'Content', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::textarea('body', null, array('class' => 'form-control', 'id' => 'edit-body', 'placeholder' => 'Your Content here...')) }}
                                        <div class="alert alert-danger hidden error-edit-body p-2 mt-2"></div>
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
                    <h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Blog?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <header class="panel-heading">
            <h3 class="panel-title">Post List</h3>
        </header>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-15">
                        <a href="javascript:void(0)" class="btn btn-sm btn-success add-blog">
                            <i class="icon md-plus" aria-hidden="true"></i> Add
                        </a>
                    </div>
                </div>
            </div>

            @if(count($blogs) > 0)
                <div class="table-responsive">
                    <table class="ui table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="blogs-crud">
                            @foreach($blogs as $blog)
                                <tr id="blog-id-{{ $blog->id }}">
                                    <td>{{ $blog->name }}</td>
                                    <td>
                                        <a href="{{ $blog->image }}" data-lightbox="lightbox-image{{ $blog->id }}" data-title="" data-alt="">
                                            <img src="{{ $blog->image }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ substr(strip_tags($blog->body), 0, 100) }}{{ strlen(strip_tags($blog->body)) > 100 ? "..." : "" }}</td>
                                    <td class="actions">
                                        <a href="javascript:void(0)" data-id="{{ $blog->id }}" data-title="{{ $blog->name }}" data-image="{{ $blog->image }}" data-content="{{ $blog->body }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-blog" data-toggle="tooltip" data-original-title="Save">
                                            <i class="icon md-wrench" aria-hidden="true"></i> Show
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $blog->id }}" data-title="{{ $blog->name }}" data-image="{{ $blog->image }}" data-content="{{ $blog->body }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-blog" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="icon md-edit" aria-hidden="true"></i> Edit
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{ $blog->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-blog" data-toggle="tooltip" data-original-title="Remove">
                                            <i class="icon md-delete" aria-hidden="true"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
{{--                <h3 class="no-result mt-2">No results found</h3>--}}
                <div class="table-responsive">
                    <table class="ui table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="blogs-crud">

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script('public/plugin/mui-trade-template/global/vendor/dropify/dropify.min.js') }}
    {{ Html::script('public/plugin/mui-trade-template/global/js/Plugin/dropify.js') }}

    {{ Html::script('public/plugin/ckeditor5-build-classic/ckeditor.js') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        let addEditor;
        ClassicEditor.create(document.querySelector('#add-body'))
            .then(editor => {
                console.log(editor);
                addEditor = editor;
            }).catch(error => {
            console.error(error);
        });

        let editEditor;

        /* Add */
        $(document).on('click', '.add-blog', function() {
            $('#add-form').trigger('reset');
            $(".dropify-clear").trigger("click");
            $('#add-modal').modal('show');
        });

        $('#add-form').keydown(function (e) {
            if (e.which == 13 && e.target.id != '') {
                add_submit();
                $('#add-modal').modal('hide');
            }
        });

        $('.modal-footer').on('click', '.add', function() {
            add_submit();
        });


        /* Show */
        $(document).on('click', '.show-blog', function() {
            $('.show-title').text($(this).data('title'));
            $('.show-image').attr('src', $(this).data('image'));
            $('.show-body').html($(this).data('content'));
            $('#show-modal').modal('show');
        });

        /* Edit */
        $(document).on('click', '.edit-blog', function() {
            $('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('title'));

            edit_image_preview('#edit-image', $(this).data('image'));

            $('#edit-body').val($(this).data('content'));

            ClassicEditor.create(document.querySelector('#edit-body'))
                .then(editor => {
                    editor.setData($(this).data('content'));
                    editEditor = editor;
                }).catch(error => {
                console.error(error);
            });

            $('#edit-modal').modal('show');

            id_edit = $(this).data('id');
        });

        $('#edit-modal').on('hidden.bs.modal', function(e) {
            $(".dropify-clear").trigger("click");
            editEditor.destroy();
        });

        $('#edit-form').keydown(function (e) {
            if (e.which == 13 && e.target.id != '') {
                edit_submit();
                $('#edit-modal').modal('hide');
            }
        });

        $('.modal-footer').on('click', '.edit', function() {
            edit_submit();
        });

        /* Delete */
        $(document).on('click', '.delete-blog', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });

        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'blog/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                    $('#blog-id-' + id).remove();
                }
            });
        });

        function edit_image_preview(element, image) {
            var drEvent = $(element).dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = image;
            drEvent.destroy();
            drEvent.init();
            $(element).dropify({
                defaultFile: image
            });
        }

        function add_submit() {
            let formData = new FormData();

            name = $('#add-name').val();
            image = $('#add-image')[0].files[0];
            body = addEditor.getData();

            formData.append('name', name);
            formData.append('image', image);
            formData.append('body', body);

            $.ajax({
                type: 'POST',
                url: 'blog',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function(data) {
                    $('.error-add-name').addClass('hidden');
                    $('.error-add-image').addClass('hidden');
                    $('.error-add-body').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function () {
                            $('#add-modal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#datatable').append(
                            "<tr id='blog-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" +
                                    "<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
                                        "<img src='" + data.image + "' alt=''>" +
                                    "</a>" +
                                "</td>" +
                                "<td>" + data.body + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-title='" + data.name + "' data-image='" + data.image + "' data-content='" + data.body + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-blog' data-toggle='tooltip' data-original-title='Save'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-title='" + data.name + "' data-image='" + data.image + "' data-content='" + data.body + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-blog' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-blog' data-toggle='tooltip' data-original-title='Remove'>" +
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
            var form_data = new FormData();

            id = $('#id-edit').val();
            name = $('#edit-name').val();
            image = $('#edit-image')[0].files[0];
            body = editEditor.getData();

            form_data.append('id', id);
            form_data.append('name', name);
            form_data.append('image', image);
            form_data.append('body', body);
            form_data.append('_method', 'PUT');

            $.ajax({
                type: 'POST',
                url: 'blog/' + id_edit,
                data: form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function(data) {
                    $('.error-edit-name').addClass('hidden');
                    $('.error-edit-image').addClass('hidden');
                    $('.error-edit-body').addClass('hidden');

                    if (data.errors) {
                        setTimeout(function() {
                            $('#edit-modal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('#blog-id-' + data.id).replaceWith(
                            "<tr id='blog-id-" + data.id + "'>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" +
                                    "<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
                                        "<img src='" + data.image + "' alt=''>" +
                                    "</a>" +
                                "</td>" +
                                "<td>" + data.body + "</td>" +
                                "<td class='actions'>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-title='" + data.name + "' data-image='" + data.image + "' data-content='" + data.body + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-blog' data-toggle='tooltip' data-original-title='Save'>" +
                                        "<i class='icon md-wrench' aria-hidden='true'></i> Show" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' data-title='" + data.name + "' data-image='" + data.image + "' data-content='" + data.body + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-blog' data-toggle='tooltip' data-original-title='Edit'>" +
                                        "<i class='icon md-edit' aria-hidden='true'></i> Edit" +
                                    "</a>" +
                                    "<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-blog' data-toggle='tooltip' data-original-title='Remove'>" +
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