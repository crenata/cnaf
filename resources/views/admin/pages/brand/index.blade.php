@extends('admin.template')

@section('title', 'Brand')

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
		<h1 class="page-title">Brand</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.home') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Brands</li>
		</ol>
	</div>
@endsection

@section('content')
	<!-- Add -->
	<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add-modal-title">Add Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="add-form" name="brand-form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Brand Name')) }}
										<div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group row">
									{{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image" class="add-image" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('vendor_id', 'Vendor', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<select name="vendor_id" id="add-vendor" class="form-control" required="">
											<option value="">-- Select Vendor --</option>
											@foreach($vendors as $vendor)
												<option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
											@endforeach
										</select>
										<div class="alert alert-danger hidden error-add-vendor p-2 mt-2"></div>
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
									<td style="width: 100px;">Image</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image">
											<img src="" alt="" class="show-image">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Vendor</td>
									<td style="width: 10px;">:</td>
									<td class="show-vendor"></td>
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
					<form class="form-horizontal" id="edit-form" name="brand-form">
						<input type="text" name="" id="id-edit" hidden>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Brand Name')) }}
										<div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group row">
									{{ Form::label('image', 'Image', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image" class="edit-image" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('vendor_id', 'Vendor', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<select name="vendor_id" id="edit-vendor" class="form-control">
											<option value="" id="vendor-select">-- Select Vendor --</option>
											@foreach($vendors as $vendor)
												<option value="{{ $vendor->id }}" id="vendor-select">{{ $vendor->name }}</option>
											@endforeach
										</select>
										<div class="alert alert-danger hidden error-edit-vendor p-2 mt-2"></div>
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
					<h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Brand?</h5>
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
		            <h3 class="panel-title">Brand List</h3>
		        </header>

		        <div class="panel-body">
		        	<div class="row">
		                <div class="col-md-6">
		                    <div class="mb-15">
		                    	<a href="javascript:void(0)" class="btn btn-sm btn-success add-brand">
		                    		<i class="icon md-plus" aria-hidden="true"></i> Add
		                    	</a>
		                    </div>
		                </div>
		            </div>

					@if(count($brands) > 0)
						<div class="table-responsive">
							<table class="ui table table-bordered table-striped table-hover" id="datatable">
								<thead>
									<tr>
										<th>Name</th>
										<th>Image</th>
										<th>Vendor</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="brands-crud">
									@foreach($brands as $brand)
										<tr id="brand-id-{{ $brand->id }}">
											<td>{{ $brand->name }}</td>
											<td>
												<a href="{{ $brand->image }}" data-lightbox="lightbox-image{{ $brand->id }}" data-title="" data-alt="">
													<img src="{{ $brand->image }}" alt="">
												</a>
											</td>
											<td>{{ $brand->vendor->name }}</td>
											<td class="actions">
												<a href="javascript:void(0)" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}" data-image="{{ $brand->image }}" data-vendor="{{ $brand->vendor->name }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-brand" data-toggle="tooltip" data-original-title="Show">
													<i class="icon md-wrench" aria-hidden="true"></i> Show
												</a>
												<a href="javascript:void(0)" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}" data-image="{{ $brand->image }}" data-vendor="{{ $brand->vendor->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-brand" data-toggle="tooltip" data-original-title="Edit">
													<i class="icon md-edit" aria-hidden="true"></i> Edit
												</a>
												<a href="javascript:void(0)" data-id="{{ $brand->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-brand" data-toggle="tooltip" data-original-title="Delete">
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
										<th>Image</th>
										<th>Vendor</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="brands-crud">

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

	{{ Html::script('public/plugin/ckeditor5-build-classic/ckeditor.js') }}

	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		});

		/* Add */
		$(document).on('click', '.add-brand', function() {
			$('#add-form').trigger('reset');
			$(".dropify-clear").trigger("click");
			$('.error-add-name').addClass('hidden');
			$('.error-add-image').addClass('hidden');
			$('.error-add-vendor').addClass('hidden');
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
		$(document).on('click', '.show-brand', function() {
			$('.show-name').text($(this).data('name'));
			$('.show-image').attr('src', $(this).data('image'));
			$('.show-lightbox-image').attr('href', $(this).data('image')).attr('data-lightbox', $(this).data('image'));
			$('.show-vendor').text($(this).data('vendor'));
			$('#show-modal').modal('show');
        });

        /* Edit */
		$(document).on('click', '.edit-brand', function() {
			$('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            edit_image_preview('.edit-image', $(this).data('image'));
            $('#edit-vendor').val($(this).data('vendor')).prop('selected', true);
			$('.error-edit-name').addClass('hidden');
			$('.error-edit-image').addClass('hidden');
			$('.error-edit-vendor').addClass('hidden');
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
        $(document).on('click', '.delete-brand', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'brand/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted brand!', 'Success Alert', {timeOut: 5000});
                    $('#brand-id-' + id).remove();
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
			image = $('.add-image')[0].files[0];
			vendor_id = $('#add-vendor').val();

			add_form_data.append('name', name);
			add_form_data.append('image', image);
			add_form_data.append('vendor_id', vendor_id);

			$.ajax({
				type: 'POST',
				url: 'brand',
				data: add_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				enctype: 'multipart/form-data',
				success: function(data) {
					$('.error-add-name').addClass('hidden');
					$('.error-add-image').addClass('hidden');
					$('.error-add-vendor').addClass('hidden');
					if (data.errors) {
						if (data.errors.name) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.name, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-name').removeClass('hidden');
							$('.error-add-name').text(data.errors.name);
						} else if (data.errors.image) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.image, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-image').removeClass('hidden');
							$('.error-add-image').text(data.errors.image);
						} else if (data.errors.vendor_id) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.vendor_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-vendor').removeClass('hidden');
							$('.error-add-vendor').text(data.errors.vendor_id);
						} else {
                            setTimeout(function() {
                                $('#add-modal').modal('show');
                                toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                            }, 500);
                        }
					} else {
						toastr.success('Successfully added Brand!', 'Success Alert', {timeOut: 5000});
						$('#datatable').append(
								"<tr id='brand-id-" + data.id + "'>" +
									"<td>" + data.name + "</td>" +
									"<td>" +
										"<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
											"<img src='" + data.image + "' alt=''>" +
										"</a>" +
									"</td>" +
									"<td>" + data.vendor.name + "</td>" +
									"<td class='actions'>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-image='" + data.image + "' data-vendor='" + data.vendor.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-brand' data-toggle='tooltip' data-original-title='Show'>" +
											"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
										"</a>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-image='" + data.image + "' data-vendor='" + data.vendor.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-brand' data-toggle='tooltip' data-original-title='Edit'>" +
											"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
										"</a>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-brand' data-toggle='tooltip' data-original-title='Delete'>" +
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
			image = $('.edit-image')[0].files[0];
			vendor_id = $('#edit-vendor').val();

			edit_form_data.append('id', id);
			edit_form_data.append('name', name);
			edit_form_data.append('image', image);
			edit_form_data.append('vendor_id', vendor_id);
			edit_form_data.append('_method', 'PUT');

			$.ajax({
				type: 'POST',
				url: 'brand/' + id_edit,
				data: edit_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('.error-edit-name').addClass('hidden');
					$('.error-edit-image').addClass('hidden');
					$('.error-edit-vendor').addClass('hidden');
					if (data.errors) {
						if (data.errors.name) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.name, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-name').removeClass('hidden');
							$('.error-edit-name').text(data.errors.name);
						} else if (data.errors.image) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.image, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-image').removeClass('hidden');
							$('.error-edit-image').text(data.errors.image);
						} else if (data.errors.vendor_id) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.vendor_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-vendor').removeClass('hidden');
							$('.error-edit-vendor').text(data.errors.vendor_id);
						} else {
                            setTimeout(function() {
                                $('#edit-modal').modal('show');
                                toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                            }, 500);
                        }
					} else {
						toastr.success('Successfully updated brand!', 'Success Alert', {timeOut: 5000});
						$('#brand-id-' + data.id).replaceWith(
								"<tr id='brand-id-" + data.id + "'>" +
									"<td>" + data.name + "</td>" +
									"<td>" +
										"<a href='" + data.image + "' data-lightbox='lightbox-image" + data.id + "' data-title='' data-alt=''>" +
											"<img src='" + data.image + "' alt=''>" +
										"</a>" +
									"</td>" +
									"<td>" + data.vendor.name + "</td>" +
									"<td class='actions'>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-image='" + data.image + "' data-vendor='" + data.vendor.name + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-brand' data-toggle='tooltip' data-original-title='Show'>" +
											"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
										"</a>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-image='" + data.image + "' data-vendor='" + data.vendor.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-brand' data-toggle='tooltip' data-original-title='Edit'>" +
											"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
										"</a>" +
										"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-brand' data-toggle='tooltip' data-original-title='Delete'>" +
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
