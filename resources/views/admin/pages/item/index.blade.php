@extends('admin.template')

@section('title', 'Item')

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
		<h1 class="page-title">Item</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.home') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Items</li>
		</ol>
	</div>
@endsection

@section('content')
	<!-- Add -->
	<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add-modal-title">Add Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="add-form" name="item-form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'add-name', 'required' => '', 'placeholder' => 'Item Name')) }}
										<div class="alert alert-danger hidden error-add-name p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('qty', 'Qty', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::number('qty', null, array('class' => 'form-control', 'id' => 'add-qty', 'required' => '', 'placeholder' => 'Qty')) }}
										<div class="alert alert-danger hidden error-add-qty p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('normal_price', 'Normal Price', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info text-white">Rp.</span>
											</div>
											{{ Form::number('normal_price', null, array('class' => 'form-control', 'id' => 'add-normal-price', 'required' => '', 'placeholder' => 'Normal Price')) }}
											<div class="input-group-append">
												<span class="input-group-text bg-info text-white">.00</span>
											</div>
										</div>
										<div class="alert alert-danger hidden error-add-normal-price p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('price_after_discount', 'Price After Discount', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info text-white">Rp.</span>
											</div>
											{{ Form::number('price_after_discount', null, array('class' => 'form-control', 'id' => 'add-price-after-discount', 'placeholder' => 'Price After Discount')) }}
											<div class="input-group-append">
												<span class="input-group-text bg-info text-white">.00</span>
											</div>
										</div>
										<div class="alert alert-danger hidden error-add-price-after-discount p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
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

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('brand_id', 'Brand', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<select name="brand_id" id="add-brand" class="form-control" required="">
											<option value="">-- Select Vendor First --</option>
											<!-- @foreach($brands as $brand) -->
												<!-- <option value="{{-- $brand->id --}}">{{-- $brand->name --}}</option> -->
											<!-- @endforeach -->
										</select>
										<div class="alert alert-danger hidden error-add-brand p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image1', 'Image 1', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image1" class="add-image1" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image1 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image2', 'Image 2', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image2" class="add-image2" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image2 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image3', 'Image 3', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image3" class="add-image3" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image3 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image4', 'Image 4', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image4" class="add-image4" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-add-image4 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('description', 'Description', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::textarea('description', null, array('class' => 'form-control', 'id' => 'add-description', 'required' => '', 'placeholder' => 'Description')) }}
										<div class="alert alert-danger hidden error-add-description p-2 mt-2"></div>
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
									<td style="width: 100px;">Qty</td>
									<td style="width: 10px;">:</td>
									<td class="show-qty"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Normal Price</td>
									<td style="width: 10px;">:</td>
									<td class="show-normal-price"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Price After Discount</td>
									<td style="width: 10px;">:</td>
									<td class="show-price-after-discount"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Vendor</td>
									<td style="width: 10px;">:</td>
									<td class="show-vendor"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Brand</td>
									<td style="width: 10px;">:</td>
									<td class="show-brand"></td>
								</tr>
								<tr>
									<td style="width: 100px;">Image 1</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image1">
											<img src="" alt="" class="show-image1">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Image 2</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image2">
											<img src="" alt="" class="show-image2">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Image 3</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image3">
											<img src="" alt="" class="show-image3">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Image 4</td>
									<td style="width: 10px;">:</td>
									<td>
										<a href="" data-lightbox="" data-title="" data-alt="" class="show-lightbox-image4">
											<img src="" alt="" class="show-image4">
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 100px;">Description</td>
									<td style="width: 10px;">:</td>
									<td class="show-description"></td>
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
					<form class="form-horizontal" id="edit-form" name="item-form">
						<input type="text" name="" id="id-edit" hidden>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('name', 'Name', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::text('name', null, array('class' => 'form-control', 'id' => 'edit-name', 'placeholder' => 'Item Name')) }}
										<div class="alert alert-danger hidden error-edit-name p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('qty', 'Qty', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::number('qty', null, array('class' => 'form-control', 'id' => 'edit-qty', 'placeholder' => 'Qty')) }}
										<div class="alert alert-danger hidden error-edit-qty p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('normal_price', 'Normal Price', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info text-white">Rp.</span>
											</div>
											{{ Form::number('normal_price', null, array('class' => 'form-control', 'id' => 'edit-normal-price', 'placeholder' => 'Normal Price')) }}
											<div class="input-group-append">
												<span class="input-group-text bg-info text-white">.00</span>
											</div>
										</div>
										<div class="alert alert-danger hidden error-edit-normal-price p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('price_after_discount', 'Price After Discount', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text bg-info text-white">Rp.</span>
											</div>
											{{ Form::number('price_after_discount', null, array('class' => 'form-control', 'id' => 'edit-price-after-discount', 'placeholder' => 'Price After Discount')) }}
											<div class="input-group-append">
												<span class="input-group-text bg-info text-white">.00</span>
											</div>
										</div>
										<div class="alert alert-danger hidden error-edit-price-after-discount p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
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

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('brand_id', 'Brand', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										<select name="brand_id" id="edit-brand" class="form-control">
											<option value="" id="brand-select">-- Select Vendor First --</option>
											<!-- @foreach($brands as $brand) -->
												<!-- <option value="{{-- $brand->id --}}" id="brand-select">{{-- $brand->name --}}</option> -->
											<!-- @endforeach -->
										</select>
										<div class="alert alert-danger hidden error-edit-brand p-2 mt-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image1', 'Image 1', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image1" class="edit-image1" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image1 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image2', 'Image 2', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image2" class="edit-image2" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image2 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image3', 'Image 3', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image3" class="edit-image3" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image3 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									{{ Form::label('image4', 'Image 4', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="input-group col-sm-12">
										<input type="file" name="image4" class="edit-image4" data-plugin="dropify" data-default-file="">
										<div class="alert alert-danger hidden error-edit-image4 p-2 mt-2" style="width: 100%;"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group row">
									{{ Form::label('description', 'Description', array('class' => 'col-sm-6 col-form-label')) }}
									<div class="col-sm-12">
										{{ Form::textarea('description', null, array('class' => 'form-control', 'id' => 'edit-description', 'placeholder' => 'Description')) }}
										<div class="alert alert-danger hidden error-edit-description p-2 mt-2"></div>
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
					<h5 class="delete-title text-center font-weight-bold">Are you sure want delete this Item?</h5>
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
		            <h3 class="panel-title">Item List</h3>
		        </header>

		        <div class="panel-body">
		        	<div class="row">
		                <div class="col-md-6">
		                    <div class="mb-15">
		                    	<a href="javascript:void(0)" class="btn btn-sm btn-success add-item">
		                    		<i class="icon md-plus" aria-hidden="true"></i> Add
		                    	</a>
		                    </div>
		                </div>
		            </div>

					@if(count($items) > 0)
						<div class="table-responsive">
							<table class="ui table table-bordered table-striped table-hover" id="datatable">
								<thead>
									<tr>
										<th>Name</th>
										<th>Qty</th>
										<th>Normal Price</th>
										<!-- <th>Price After Discount</th> -->
										<th>Vendor</th>
										<th>Brand</th>
										<th>Image 1</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="items-crud">
									@foreach($items as $item)
										<tr id="item-id-{{ $item->id }}">
											<td>{{ $item->name }}</td>
											<td>{{ number_format($item->qty) }}</td>
											<td>Rp. {{ number_format($item->normal_price) }},-</td>
											<!-- <td>Rp. {{ number_format($item->price_after_discount) }},-</td> -->
											<td>{{ $item->vendor->name }}</td>
											<td>{{ $item->brand->name }}</td>
											<td>
												<a href="{{ $item->image1 }}" data-lightbox="lightbox-image1{{ $item->id }}" data-title="" data-alt="">
													<img src="{{ $item->image1 }}" alt="">
												</a>
											</td>
											<td class="actions">
												<a href="javascript:void(0)" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-qty="{{ $item->qty }}" data-normalprice="{{ $item->normal_price }}" data-priceafterdiscount="{{ $item->price_after_discount }}" data-vendor="{{ $item->vendor->name }}" data-brand="{{ $item->brand->name }}" data-image1="{{ $item->image1 }}" data-image2="{{ $item->image2 }}" data-image3="{{ $item->image3 }}" data-image4="{{ $item->image4 }}" data-description="{{ $item->description }}" class="btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-item" data-toggle="tooltip" data-original-title="Show">
													<i class="icon md-wrench" aria-hidden="true"></i> Show
												</a>
												<a href="javascript:void(0)" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-qty="{{ $item->qty }}" data-normalprice="{{ $item->normal_price }}" data-priceafterdiscount="{{ $item->price_after_discount }}" data-vendor="{{ $item->vendor->id }}" data-brand="{{ $item->brand->id }}" data-image1="{{ $item->image1 }}" data-image2="{{ $item->image2 }}" data-image3="{{ $item->image3 }}" data-image4="{{ $item->image4 }}" data-description="{{ $item->description }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-item" data-toggle="tooltip" data-original-title="Edit">
													<i class="icon md-edit" aria-hidden="true"></i> Edit
												</a>
												<a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-item" data-toggle="tooltip" data-original-title="Delete">
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
										<th>Qty</th>
										<th>Normal Price</th>
										<!-- <th>Price After Discount</th> -->
										<th>Vendor</th>
										<th>Brand</th>
										<th>Image 1</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="items-crud">

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

		var addEditor;
		ClassicEditor.create(document.querySelector('#add-description'))
		.then(editor => {
			console.log(editor);
			addEditor = editor;
		}).catch(error => {
			console.error(error);
		});

		var editEditor;

		/* Add */
		$(document).on('click', '.add-item', function() {
			$('#add-form').trigger('reset');
			$(".dropify-clear").trigger("click");
			$('.error-add-name').addClass('hidden');
			$('.error-add-qty').addClass('hidden');
			$('.error-add-normal-price').addClass('hidden');
			$('.error-add-price-after-discount').addClass('hidden');
			$('.error-add-vendor').addClass('hidden');
			$('.error-add-brand').addClass('hidden');
			$('.error-add-image1').addClass('hidden');
			$('.error-add-image2').addClass('hidden');
			$('.error-add-image3').addClass('hidden');
			$('.error-add-image4').addClass('hidden');
			$('.error-add-description').addClass('hidden');
			$('#add-modal').modal('show');
		});

		$('#add-form').keydown(function (e) {
			if (e.which == 13 && e.target.id != '') {
				e.preventDefault();
				add_submit();
				$('#add-modal').modal('hide');
			}
		});

		$('.modal-footer').on('click', '.add', function() {
			add_submit();
        });


		/* Show */
		$(document).on('click', '.show-item', function() {
			$('.show-name').text($(this).data('name'));
			$('.show-qty').text(format_money($(this).data('qty')));
			$('.show-normal-price').text('Rp. ' + format_money($(this).data('normalprice')) + ',-');
			$('.show-price-after-discount').text('Rp. ' + format_money($(this).data('priceafterdiscount')) + ',-');
			$('.show-vendor').text($(this).data('vendor'));
			$('.show-brand').text($(this).data('brand'));
			$('.show-image1').attr('src', $(this).data('image1'));
			$('.show-lightbox-image1').attr('href', $(this).data('image1')).attr('data-lightbox', $(this).data('image1'));
			$('.show-image2').attr('src', $(this).data('image2'));
			$('.show-lightbox-image2').attr('href', $(this).data('image2')).attr('data-lightbox', $(this).data('image2'));
			$('.show-image3').attr('src', $(this).data('image3'));
			$('.show-lightbox-image3').attr('href', $(this).data('image3')).attr('data-lightbox', $(this).data('image3'));
			$('.show-image4').attr('src', $(this).data('image4'));
			$('.show-lightbox-image4').attr('href', $(this).data('image4')).attr('data-lightbox', $(this).data('image4'));
			$('.show-description').html($(this).data('description'));
			$('#show-modal').modal('show');
        });

        /* Edit */
		$(document).on('click', '.edit-item', function() {
			var data_brand = $(this).data('brand');

			$('#id-edit').val($(this).data('id'));
            $('#edit-name').val($(this).data('name'));
            $('#edit-qty').val($(this).data('qty'));
            $('#edit-normal-price').val($(this).data('normalprice'));
            $('#edit-price-after-discount').val($(this).data('priceafterdiscount'));
            $('#edit-vendor').val($(this).data('vendor')).prop('selected', true);
            // $('#edit-brand').val(data_brand).prop('selected', true);

            edit_image_preview('.edit-image1', $(this).data('image1'));
            edit_image_preview('.edit-image2', $(this).data('image2'));
            edit_image_preview('.edit-image3', $(this).data('image3'));
            edit_image_preview('.edit-image4', $(this).data('image4'));

			$('.error-edit-name').addClass('hidden');
			$('.error-edit-qty').addClass('hidden');
			$('.error-edit-normal-price').addClass('hidden');
			$('.error-edit-price-after-discount').addClass('hidden');
			$('.error-edit-vendor').addClass('hidden');
			$('.error-edit-brand').addClass('hidden');
			$('.error-edit-image1').addClass('hidden');
			$('.error-edit-image2').addClass('hidden');
			$('.error-edit-image3').addClass('hidden');
			$('.error-edit-image4').addClass('hidden');
			$('.error-edit-description').addClass('hidden');

            ClassicEditor.create(document.querySelector('#edit-description'))
			.then(editor => {
				editor.setData($(this).data('description'));
				editEditor = editor;
			}).catch(error => {
				console.error(error);
			});

            $('#edit-modal').modal('show');

            var e = document.getElementById("edit-vendor");
            var vendor_select_value = e.options[e.selectedIndex].value;

        	$.ajax({
                type: 'GET',
                url: 'item/brand/' + vendor_select_value,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        $('#edit-brand').replaceWith(
                        	"<select name='brand_id' id='edit-brand' class='form-control' required=''>" +
								"<option value=''>-- Select Brand --</option>");
						$.each(data, function(index, value) {
							console.log(value);
							if (value.id == data_brand) {
								$('#edit-brand').append(
									"<option value='" + value.id + "' selected=''>" + value.name + "</option>"
								);
							} else {
								$('#edit-brand').append(
									"<option value='" + value.id + "'>" + value.name + "</option>"
								);
							}
						});
						$('#edit-brand').append("</select>");
                    }
                },
                error: function(data) {
                	toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });

            id_edit = $(this).data('id');
        });

        $('#edit-modal').on('hidden.bs.modal', function(e) {
        	$(".dropify-clear").trigger("click");
        	editEditor.destroy();
        });

		$('#edit-form').keydown(function (e) {
			if (e.which == 13 && e.target.id != '') {
				e.preventDefault();
				edit_submit();
				$('#edit-modal').modal('hide');
			}
		});

        $('.modal-footer').on('click', '.edit', function() {
        	edit_submit();
        });

        /* Delete */
        $(document).on('click', '.delete-item', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'item/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Item!', 'Success Alert', {timeOut: 5000});
                    $('#item-id-' + id).remove();
                }
            });
        });

        /* Vendor Selected */
        $('#add-vendor').change(function() {
        	// alert($(this).val());
        	$.ajax({
                type: 'GET',
                url: 'item/brand/' + $(this).val(),
                // data: $(this).val(),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#add-brand').replaceWith(
                        	"<select name='brand_id' id='add-brand' class='form-control' required=''>" +
								"<option value=''>-- Select Brand --</option>");
						$.each(data, function(index, value) {
							console.log(value);
							$('#add-brand').append(
								"<option value='" + value.id + "'>" + value.name + "</option>"
							);
						});
						$('#add-brand').append("</select>");
                    }
                },
                error: function(data) {
                	toastr.error('Failed', 'Error Alert', {timeOut: 5000});
                }
            });
        });

        $('#edit-vendor').change(function() {
        	// alert($(this).val());
        	$.ajax({
                type: 'GET',
                url: 'item/brand/' + $(this).val(),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.errors) {

                    } else {
                        // toastr.success('Successfully loaded Brand!', 'Success Alert', {timeOut: 5000});
                        $('#edit-brand').replaceWith(
                        	"<select name='brand_id' id='edit-brand' class='form-control' required=''>" +
								"<option value=''>-- Select Brand --</option>");
						$.each(data, function(index, value) {
							console.log(value);
							$('#edit-brand').append(
								"<option value='" + value.id + "'>" + value.name + "</option>"
							);
						});
						$('#edit-brand').append("</select>");
                    }
                },
                error: function(data) {
                	toastr.error('Failed', 'Error Alert', {timeOut: 5000});
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
			qty = $('#add-qty').val();
			normal_price = $('#add-normal-price').val();
			price_after_discount = $('#add-price-after-discount').val();
			vendor_id = $('#add-vendor').val();
			brand_id = $('#add-brand').val();
			image1 = $('.add-image1')[0].files[0];
			image2 = $('.add-image2')[0].files[0];
			image3 = $('.add-image3')[0].files[0];
			image4 = $('.add-image4')[0].files[0];
			description = addEditor.getData();

			add_form_data.append('name', name);
			add_form_data.append('qty', qty);
			add_form_data.append('normal_price', normal_price);
			add_form_data.append('price_after_discount', price_after_discount);
			add_form_data.append('vendor_id', vendor_id);
			add_form_data.append('brand_id', brand_id);
			add_form_data.append('image1', image1);
			add_form_data.append('image2', image2);
			add_form_data.append('image3', image3);
			add_form_data.append('image4', image4);
			add_form_data.append('description', description);

			$.ajax({
				type: 'POST',
				url: 'item',
				data: add_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				enctype: 'multipart/form-data',
				success: function(data) {
					$('.error-add-name').addClass('hidden');
					$('.error-add-qty').addClass('hidden');
					$('.error-add-normal-price').addClass('hidden');
					$('.error-add-price-after-discount').addClass('hidden');
					$('.error-add-vendor').addClass('hidden');
					$('.error-add-brand').addClass('hidden');
					$('.error-add-image1').addClass('hidden');
					$('.error-add-image2').addClass('hidden');
					$('.error-add-image3').addClass('hidden');
					$('.error-add-image4').addClass('hidden');
					$('.error-add-description').addClass('hidden');
					if (data.errors) {
						if (data.errors.name) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.name, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-name').removeClass('hidden');
							$('.error-add-name').text(data.errors.name);
						} else if (data.errors.qty) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.qty, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-qty').removeClass('hidden');
							$('.error-add-qty').text(data.errors.qty);
						} else if (data.errors.normal_price) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.normal_price, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-normal-price').removeClass('hidden');
							$('.error-add-normal-price').text(data.errors.normal_price);
						} else if (data.errors.price_after_discount) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.price_after_discount, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-price-after-discount').removeClass('hidden');
							$('.error-add-price-after-discount').text(data.errors.price_after_discount);
						} else if (data.errors.vendor_id) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.vendor_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-vendor').removeClass('hidden');
							$('.error-add-vendor').text(data.errors.vendor_id);
						} else if (data.errors.brand_id) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.brand_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-brand').removeClass('hidden');
							$('.error-add-brand').text(data.errors.brand_id);
						} else if (data.errors.image1) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.image1, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-image1').removeClass('hidden');
							$('.error-add-image1').text(data.errors.image1);
						} else if (data.errors.image2) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.image2, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-image2').removeClass('hidden');
							$('.error-add-image2').text(data.errors.image2);
						} else if (data.errors.image3) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.image3, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-image3').removeClass('hidden');
							$('.error-add-image3').text(data.errors.image3);
						} else if (data.errors.image4) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.image4, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-image4').removeClass('hidden');
							$('.error-add-image4').text(data.errors.image4);
						} else if (data.errors.description) {
							setTimeout(function() {
								$('#add-modal').modal('show');
								toastr.error(data.errors.description, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-add-description').removeClass('hidden');
							$('.error-add-description').text(data.errors.description);
						} else {
                            setTimeout(function() {
                                $('#add-modal').modal('show');
                                toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                            }, 500);
                        }
					} else {
						toastr.success('Successfully added item!', 'Success Alert', {timeOut: 5000});

						$('#datatable').append(
								"<tr id='item-id-" + data.id + "'>" +
								"<td>" + data.name + "</td>" +
								"<td>" + format_money(parseFloat(data.qty)) + "</td>" +
								"<td>" + "Rp. " + format_money(parseFloat(data.normal_price)) + ",-" + "</td>" +
								// "<td>" + data.price_after_discount + "</td>" +
								"<td>" + data.vendor.name + "</td>" +
								"<td>" + data.brand.name + "</td>" +
								"<td>" +
								"<a href='" + data.image1 + "' data-lightbox='lightbox-image1" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image1 + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td class='actions'>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-qty='" + data.qty + "' data-normalprice='" + data.normal_price + "' data-priceafterdiscount='" + data.price_after_discount + "' data-vendor='" + data.vendor.name + "' data-brand='" + data.brand.name + "' data-image1='" + data.image1 + "' data-image2='" + data.image2 + "' data-image3='" + data.image3 + "' data-image4='" + data.image4 + "' data-description='" + data.description + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-item' data-toggle='tooltip' data-original-title='Show'>" +
								"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-qty='" + data.qty + "' data-normalprice='" + data.normal_price + "' data-priceafterdiscount='" + data.price_after_discount + "' data-vendor='" + data.vendor.id + "' data-brand='" + data.brand.id + "' data-image1='" + data.image1 + "' data-image2='" + data.image2 + "' data-image3='" + data.image3 + "' data-image4='" + data.image4 + "' data-description='" + data.description + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-item' data-toggle='tooltip' data-original-title='Edit'>" +
								"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-item' data-toggle='tooltip' data-original-title='Delete'>" +
								"<i class='icon md-delete' aria-hidden='true'></i> Delete" +
								"</a>" +
								"</td>" +
								"</tr>");
					}
				},
				error: function(data) {
					toastr.error('Failed', 'Error Alert', {timeOut: 5000});
				}
			});
		}

		function edit_submit() {
			var edit_form_data = new FormData();

			id = $('#id-edit').val();
			name = $('#edit-name').val();
			qty = $('#edit-qty').val();
			normal_price = $('#edit-normal-price').val();
			price_after_discount = $('#edit-price-after-discount').val();
			vendor_id = $('#edit-vendor').val();
			brand_id = $('#edit-brand').val();
			image1 = $('.edit-image1')[0].files[0];
			image2 = $('.edit-image2')[0].files[0];
			image3 = $('.edit-image3')[0].files[0];
			image4 = $('.edit-image4')[0].files[0];
			description = editEditor.getData();

			edit_form_data.append('id', id);
			edit_form_data.append('name', name);
			edit_form_data.append('qty', qty);
			edit_form_data.append('normal_price', normal_price);
			edit_form_data.append('price_after_discount', price_after_discount);
			edit_form_data.append('vendor_id', vendor_id);
			edit_form_data.append('brand_id', brand_id);
			edit_form_data.append('image1', image1);
			edit_form_data.append('image2', image2);
			edit_form_data.append('image3', image3);
			edit_form_data.append('image4', image4);
			edit_form_data.append('description', description);
			edit_form_data.append('_method', 'PUT');

			$.ajax({
				type: 'POST',
				url: 'item/' + id_edit,
				data: edit_form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('.error-edit-name').addClass('hidden');
					$('.error-edit-qty').addClass('hidden');
					$('.error-edit-normal-price').addClass('hidden');
					$('.error-edit-price-after-discount').addClass('hidden');
					$('.error-edit-vendor').addClass('hidden');
					$('.error-edit-brand').addClass('hidden');
					$('.error-edit-image1').addClass('hidden');
					$('.error-edit-image2').addClass('hidden');
					$('.error-edit-image3').addClass('hidden');
					$('.error-edit-image4').addClass('hidden');
					$('.error-edit-description').addClass('hidden');
					if (data.errors) {
						if (data.errors.name) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.name, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-name').removeClass('hidden');
							$('.error-edit-name').text(data.errors.name);
						} else if (data.errors.qty) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.qty, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-qty').removeClass('hidden');
							$('.error-edit-qty').text(data.errors.qty);
						} else if (data.errors.normal_price) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.normal_price, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-normal-price').removeClass('hidden');
							$('.error-edit-normal-price').text(data.errors.normal_price);
						} else if (data.errors.price_after_discount) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.price_after_discount, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-price-after-discount').removeClass('hidden');
							$('.error-edit-price-after-discount').text(data.errors.price_after_discount);
						} else if (data.errors.vendor_id) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.vendor_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-vendor').removeClass('hidden');
							$('.error-edit-vendor').text(data.errors.vendor_id);
						} else if (data.errors.brand_id) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.brand_id, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-brand').removeClass('hidden');
							$('.error-edit-brand').text(data.errors.brand_id);
						} else if (data.errors.image1) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.image1, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-image1').removeClass('hidden');
							$('.error-edit-image1').text(data.errors.image1);
						} else if (data.errors.image2) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.image2, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-image2').removeClass('hidden');
							$('.error-edit-image2').text(data.errors.image2);
						} else if (data.errors.image3) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.image3, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-image3').removeClass('hidden');
							$('.error-edit-image3').text(data.errors.image3);
						} else if (data.errors.image4) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.image4, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-image4').removeClass('hidden');
							$('.error-edit-image4').text(data.errors.image4);
						} else if (data.errors.description) {
							setTimeout(function() {
								$('#edit-modal').modal('show');
								toastr.error(data.errors.description, 'Error Alert', {timeOut: 5000});
							}, 500);
							$('.error-edit-description').removeClass('hidden');
							$('.error-edit-description').text(data.errors.description);
						} else {
                            setTimeout(function() {
                                $('#edit-modal').modal('show');
                                toastr.error(data.errors, 'Error Alert', {timeOut: 5000});
                            }, 500);
                        }
					} else {
						toastr.success('Successfully updated item!', 'Success Alert', {timeOut: 5000});
						$('#item-id-' + data.id).replaceWith(
								"<tr id='item-id-" + data.id + "'>" +
								"<td>" + data.name + "</td>" +
								"<td>" + format_money(parseFloat(data.qty)) + "</td>" +
								"<td>" + "Rp. " + format_money(parseFloat(data.normal_price)) + ",-" + "</td>" +
								// "<td>" + data.price_after_discount + "</td>" +
								"<td>" + data.vendor.name + "</td>" +
								"<td>" + data.brand.name + "</td>" +
								"<td>" +
								"<a href='" + data.image1 + "' data-lightbox='lightbox-image1" + data.id + "' data-title='' data-alt=''>" +
								"<img src='" + data.image1 + "' alt=''>" +
								"</a>" +
								"</td>" +
								"<td class='actions'>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-qty='" + data.qty + "' data-normalprice='" + data.normal_price + "' data-priceafterdiscount='" + data.price_after_discount + "' data-vendor='" + data.vendor.name + "' data-brand='" + data.brand.name + "' data-image1='" + data.image1 + "' data-image2='" + data.image2 + "' data-image3='" + data.image3 + "' data-image4='" + data.image4 + "' data-description='" + data.description + "' class='btn btn-sm btn-icon btn-pure btn-default on-editing save-row show-item' data-toggle='tooltip' data-original-title='Show'>" +
								"<i class='icon md-wrench' aria-hidden='true'></i> Show" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' data-name='" + data.name + "' data-qty='" + data.qty + "' data-normalprice='" + data.normal_price + "' data-priceafterdiscount='" + data.price_after_discount + "' data-vendor='" + data.vendor.id + "' data-brand='" + data.brand.id + "' data-image1='" + data.image1 + "' data-image2='" + data.image2 + "' data-image3='" + data.image3 + "' data-image4='" + data.image4 + "' data-description='" + data.description + "' class='btn btn-sm btn-icon btn-pure btn-default on-default edit-row edit-item' data-toggle='tooltip' data-original-title='Edit'>" +
								"<i class='icon md-edit' aria-hidden='true'></i> Edit" +
								"</a>" +
								"<a href='javascript:void(0)' data-id='" + data.id + "' class='btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-item' data-toggle='tooltip' data-original-title='Delete'>" +
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
