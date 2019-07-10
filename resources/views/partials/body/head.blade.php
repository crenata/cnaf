<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title') | SobatCNAF</title>

<link rel="apple-touch-icon" href="{{ asset('public/plugin/mui-trade-template/mmenu/assets/images/apple-touch-icon.png') }}">
<link rel="shortcut icon" href="{{ asset('public/plugin/mui-trade-template/mmenu/assets/images/favicon.ico') }}">

<style>
    html {
        font-family: 'Open Sans', sans-serif !important;
    }
</style>

@include('partials.components.css')

@yield('stylesheets')