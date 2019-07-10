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
    {{ $brands }}
@endsection