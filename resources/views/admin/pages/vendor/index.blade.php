@extends('admin.template')

@section('title', 'Vendor')

@section('stylesheets')
	{{ Html::style('public/plugin/mui-trade-template/global/vendor/dropify/dropify.css') }}

	<style type="text/css">
		td a img {
			width: 36px;
			height: 36px;
			border-radius: 100%;
		}
		.hidden {
			display: none;
		}
	</style>
@endsection

@section('pageheader')
	<div class="page-header">
		<h1 class="page-title">Vendor</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.home') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Vendors</li>
		</ol>
	</div>
@endsection

@section('content')
	<!-- Add -->
	<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add-modal-title">Add Vendor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="add-form" name="vendor-form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Vendor Name')) }}
										<div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
									</div>
								</div>

								<div class="form-group row">
									{{ Form::label('phone', 'Phone', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'add-phone', 'required' => '', 'placeholder' => 'XXX-XXX-XXX')) }}
										<div class="alert alert-danger hidden error-add-phone p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image" class="add-image" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image_logo', 'Image Logo', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image_logo" class="add-image-logo" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image-logo p-2 mt-2"></div>
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
									<td style="width: 100px;">Phone</td>
									<td style="width: 10px;">:</td>
									<td class="show-phone"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Image</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image">
											<img src="" alt="" class="show-image">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Image Logo</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image-logo">
											<img src="" alt="" class="show-image-logo">
										</a>
									</td>
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
					<form class="form-horizontal" id="edit-form" name="vendor-form">
						<input type="text" name="" id="id-edit" hidden>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Vendor Name')) }}
										<div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
									</div>
								</div>

								<div class="form-group row">
									{{ Form::label('phone', 'Phone', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('phone', null, array('class' => 'form-control', 'id' => 'edit-phone', 'placeholder' => 'XXX-XXX-XXX')) }}
										<div class="alert alert-danger hidden error-edit-phone p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image" class="edit-image" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image_logo', 'Image Logo', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image_logo" class="edit-image-logo" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image-logo p-2 mt-2"></div>
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
					<h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Vendor?</h5>
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
		            <h3 class="panel-title">Vendor List</h3>
		        </header>

		        <div class="panel-body">
		        	<div class="row">
		                <div class="col-md-6">
		                    <div class="mb-15">
		                    	<a href="javascript:void(0)" class="btn btn-sm btn-success add-vendor">
		                    		<i class="icon md-plus" aria-hidden="true"></i> Add
		                    	</a>
		                    </div>
		                </div>
		            </div>

					@if(count($vendors) > 0)
						<div class="table-responsive">
							<table class="ui table table-bordered table-striped table-hover" id="datatable">
								<thead>
									<tr>
										<th>Name</th>
										<th>Phone</th>
										<th>Image</th>
										<th>Image Logo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="vendors-crud">
									@foreach($vendors as $vendor)
										<tr id="vendor-id-{{ $vendor->id }}">
											<td>{{ $vendor->name }}</td>
											<td>{{ $vendor->phone }}</td>
											<td>
												<a href="{{ $vendor->image }}" data-lightbox="lightbox-image{{ $vendor->id }}" data-title="" data-alt="">
													<img src="{{ $vendor->image }}" alt="">
												</a>
											</td>
											<td>
												<a href="{{ $vendor->image_logo }}" data-lightbox="lightbox-image-logo{{ $vendor->id }}" data-title="" data-alt="">
													<img src="{{ $vendor->image_logo }}" alt="">
												</a>
											</td>
											<td class="actions">
												<a href="javascript:void(0)" data-id="{{ $vendor->id }}" data-name="{{ $vendor->name }}" data-phone="{{ $vendor->phone }}" data-image="{{ $vendor->image }}" data-imagelogo="{{ $vendor->image_logo }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-vendor" data-toggle="tooltip" data-original-title="Show">
													<i class="icon md-wrench" aria-hidden="true"></i> Show
												</a>
												<a href="javascript:void(0)" data-id="{{ $vendor->id }}" data-name="{{ $vendor->name }}" data-phone="{{ $vendor->phone }}" data-image="{{ $vendor->image }}" data-imagelogo="{{ $vendor->image_logo }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-vendor" data-toggle="tooltip" data-original-title="Edit">
													<i class="icon md-edit" aria-hidden="true"></i> Edit
												</a>
												<a href="javascript:void(0)" data-id="{{ $vendor->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-vendor" data-toggle="tooltip" data-original-title="Delete">
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
										<th>Phone</th>
										<th>Image</th>
										<th>Image Logo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="vendors-crud">
									
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
	{{ Html::script('public/plugin/mui-trade-template/global/vendor/dropify/dropify.min.js') }}
	{{ Html::script('public/plugin/mui-trade-template/global/js/Plugin/dropify.js') }}

	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		});

		/* Add */
		$(document).on('click', '.add-vendor', function() {
			$('#add-form').trigger('reset');
			$(".dropify-clear").trigger("click");
			$('#add-modal').modal('show');
		});

		$('#add-form').keydown(function (e) {
			if (e.which == 13) {
				add_submit();
				$('#add-modal').modal('hide');
			}
		});

		$('.modal-footer').on('click', '.add', function() {
			add_submit();
        });


		/* Show */
		$(document).on('click', '.show-vendor', function() {
			$('.show-name').text($(this).data('name'));
			$('.show-phone').text($(this).data('phone'));
			$('.show-image').attr('src', $(this).data('image'));
			$('.show-lightbox-image').attr('href', $(this).data('image')).attr('data-lightbox', $(this).data('image'));
			$('.show-image-logo').attr('src', $(this).data('imagelogo'));
			$('.show-lightbox-image-logo').attr('href', $(this).data('imagelogo')).attr('data-lightbox', $(this).data('imagelogo'));
            $('#show-modal').modal('show');
        });

        /* Edit */
		$(document).on('click', '.edit-vendor', function() {
			$('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#edit-phone').val($(this).data('phone'));
            edit_image_preview('.edit-image', $(this).data('image'));
            edit_image_preview('.edit-image-logo', $(this).data('imagelogo'));
            $('#edit-modal').modal('show');
            
            id_edit = $(this).data('id');
        });

		$('#edit-form').keydown(function (e) {
			if (e.which == 13) {
				edit_submit();
				$('#edit-modal').modal('hide');
			}
		});

        $('.modal-footer').on('click', '.edit', function() {
        	edit_submit();
        });

        /* Delete */
        $(document).on('click', '.delete-vendor', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'vendor/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted vendor!', 'Success Alert', {timeOut: 5000});
                    $('#vendor-id-' + id).remove();
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
			var add_form_data = new FormData();

			name = $('#add-name').val();
			phone = $('#add-phone').val();
			image = $('.add-image')[0].files[0];
			image_logo = $('.add-image-logo')[0].files[0];

			add_form_data.append('name', name);
			add_form_data.append('phone', phone);
			add_form_data.append('image', image);
			add_form_data.append('image_logo', image_logo);

			$.ajax({
				type: 'POST',
				url: 'vendor',
				data: add_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				enctype: 'multipart/form-data',
				success: function(data) {
					$('.error-add-name').addClass('hidden');
					$('.error-add-phone').addClass('hidden');
					$('.error-add-image').addClass('hidden');
					$('.error-add-image-logo').addClass('hidden');
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
						toastr.success('Successfully added Vendor!', 'Success Alert', {timeOut: 5000});
						$('#datatable').append(
								"<tr id='vendor-id-" + data.id + "'>" +
								"<td>" + data.name + "</td>" +
								"<td>" + data.phone + "</td>" +
								"<td>" +
								"<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td>" +
								"<a href='" + data.image_logo + "' data-lightbox='lightbox-image-logo" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image_logo + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td class='actions'>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "' data-image='" + data.image + "' data-imagelogo='" + data.image_logo + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-vendor' data-toggle='tooltip' data-original-title='Show'>" +
								"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "' data-image='" + data.image + "' data-imagelogo='" + data.image_logo + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-vendor' data-toggle='tooltip' data-original-title='Edit'>" +
								"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-vendor' data-toggle='tooltip' data-original-title='Delete'>" +
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
			phone = $('#edit-phone').val();
			image = $('.edit-image')[0].files[0];
			image_logo = $('.edit-image-logo')[0].files[0];

			edit_form_data.append('id', id);
			edit_form_data.append('name', name);
			edit_form_data.append('phone', phone);
			edit_form_data.append('image', image);
			edit_form_data.append('image_logo', image_logo);
			edit_form_data.append('_method', 'PUT');

			$.ajax({
				type: 'POST',
				url: 'vendor/' + id_edit,
				data: edit_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('.error-edit-name').addClass('hidden');
					$('.error-edit-phone').addClass('hidden');
					$('.error-edit-image').addClass('hidden');
					$('.error-edit-image-logo').addClass('hidden');
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
						toastr.success('Successfully updated vendor!', 'Success Alert', {timeOut: 5000});
						$('#vendor-id-' + data.id).replaceWith(
								"<tr id='vendor-id-" + data.id + "'>" +
								"<td>" + data.name + "</td>" +
								"<td>" + data.phone + "</td>" +
								"<td>" +
								"<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td>" +
								"<a href='" + data.image_logo + "' data-lightbox='lightbox-image-logo" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image_logo + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td class='actions'>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "' data-image='" + data.image + "' data-imagelogo='" + data.image_logo + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-vendor' data-toggle='tooltip' data-original-title='Show'>" +
								"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-phone='" + data.phone + "' data-image='" + data.image + "' data-imagelogo='" + data.image_logo + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-vendor' data-toggle='tooltip' data-original-title='Edit'>" +
								"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-vendor' data-toggle='tooltip' data-original-title='Delete'>" +
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