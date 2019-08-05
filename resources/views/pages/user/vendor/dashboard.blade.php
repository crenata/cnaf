@extends('template')

@section('title', 'Account')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xs.css') }}" media="screen and (max-width: 575.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
    <link rel="stylesheet" href="{{ asset('public/css/user/tentangkami/xl.css') }}" media="screen and (min-width: 1200px)">

    {{ Html::style('public/plugin/lightbox/dist/css/lightbox.min.css') }}

    <style type="text/css">
        td a img {
            width: 36px;
            height: 36px;
            border-radius: 100%;
        }

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
    <!-- Detail -->
    <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="detail-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail-modal-title">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Show -->
    <div class="modal small fade" id="show-modal" tabindex="-1" role="dialog" aria-labelledby="show-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
        <div class="modal-dialog" role="document">
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
                                    {{ Form::label('qty', 'Qty', array('class' => 'col-sm-6 col-form-label')) }}
                                    <div class="col-sm-12">
                                        {{ Form::number('qty', null, array('class' => 'form-control', 'id' => 'edit-qty', 'placeholder' => 'Qty')) }}
                                        <div class="alert alert-danger d-none error-edit-qty p-2 mt-2"></div>
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
                    <h5 class="delete-title small text-center font-weight-bold">Are you sure want delete this Item?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="naccs my-5">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <div class="bg-881a1b rounded">
                    <div class="p-3">
                        <h5 class="">Selamat Datang</h5>
                        <h6 class="">{{ Auth::user()->name }} (Vendor)</h6>
                    </div>
                    <div class="menu">
                        <div class="active d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Manage Order</span>
                        </div>
                        <div class="d-flex border-top">
                            <span class="light align-self-center"></span>
                            <span>Manage Item</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <ul class="nacc list-unstyled">
                    <li class="w-100 small">
                        <div class="rounded border p-4">
                            <div class="table-responsive">
                                <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="transactions-crud">
                                    @foreach($transactions as $index => $transaction)
                                        <tr id="transaction-id-{{ $transaction->id }}">
                                            <td>{{ $index += 1 }}</td>
                                            <td>{{ $transaction->transaction->user->name }}</td>
                                            <td>{{ date('D, j F Y', strtotime($transaction->created_at)) }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>Rp. {{ number_format($transaction->total) }},-</td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" class="btn btn-info btn-sm show-detail">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li class="w-100 small">
                        <div class="rounded border p-4">
                            <div class="table-responsive">
                                <table class="ui table table-bordered table-striped table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Price (Normal)</th>
                                        <th>Price (After Discount)</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="items-crud">
                                    @foreach($items as $index => $item)
                                        <tr id="item-id-{{ $item->id }}">
                                            <td>{{ $index += 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ number_format($item->normal_price) }},-</td>
                                            <td>Rp. {{ number_format($item->price_after_discount) }},-</td>
                                            <td>
                                                <a href="{{ $item->image1 }}" data-lightbox="lightbox-image1{{ $item->id }}" data-title="" data-alt="">
                                                    <img src="{{ $item->image1 }}" alt="">
                                                </a>
                                            </td>
                                            <td class="actions">
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-qty="{{ $item->qty }}" data-normalprice="{{ $item->normal_price }}" data-priceafterdiscount="{{ $item->price_after_discount }}" data-vendor="{{ $item->vendor->name }}" data-brand="{{ $item->brand->name }}" data-image1="{{ $item->image1 }}" data-image2="{{ $item->image2 }}" data-image3="{{ $item->image3 }}" data-image4="{{ $item->image4 }}" data-description="{{ $item->description }}" class="btn btn-info btn-sm show-item">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-qty="{{ $item->qty }}" data-normalprice="{{ $item->normal_price }}" data-priceafterdiscount="{{ $item->price_after_discount }}" data-vendor="{{ $item->vendor->id }}" data-brand="{{ $item->brand->id }}" data-image1="{{ $item->image1 }}" data-image2="{{ $item->image2 }}" data-image3="{{ $item->image3 }}" data-image4="{{ $item->image4 }}" data-description="{{ $item->description }}" class="btn btn-info btn-sm edit-item">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-info btn-sm delete-item">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script('public/plugin/lightbox/dist/js/lightbox.min.js') }}

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

        /* Show */
        $(document).on('click', '.show-detail', function() {
            $('#detail-modal').modal('show');
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
            $('#id-edit').val($(this).data('id'));

            $('#edit-qty').val($(this).data('qty'));

            $('.error-edit-qty').addClass('d-none');

            $('#edit-modal').modal('show');

            id_edit = $(this).data('id');
        });

        /* Delete */
        $(document).on('click', '.delete-item', function() {
            $('#delete-modal').modal('show');
            id = $(this).data('id');
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: '{!! url('admin/item') !!}' + '/' + id,
                success: function(data) {
                    toastr.success('Successfully deleted Item!', 'Success Alert', {timeOut: 5000});
                    $('#item-id-' + id).remove();
                }
            });
        });


        function format_money(n) {
            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,').replace('.00', '');
        }
    </script>
@endsection
