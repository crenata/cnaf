<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('public/css/user/template/xs.css') }}" media="screen and (max-width: 575.98px)">
<link rel="stylesheet" href="{{ asset('public/css/user/template/sm.css') }}" media="screen and (min-width: 576px) and (max-width: 767.98px)">
<link rel="stylesheet" href="{{ asset('public/css/user/template/md.css') }}" media="screen and (min-width: 768px) and (max-width: 991.98px)">
<link rel="stylesheet" href="{{ asset('public/css/user/template/lg.css') }}" media="screen and (min-width: 992px) and (max-width: 1199.98px)">
<link rel="stylesheet" href="{{ asset('public/css/user/template/xl.css') }}" media="screen and (min-width: 1200px)">

{{ Html::style('public/css/user/template/app.css') }}

{{ Html::style('public/plugin/bootstrap-4.3.1/dist/css/bootstrap.css') }}
{{ Html::style('public/plugin/fontawesome-free-5.9.0-web/css/all.css') }}

{{ Html::style('public/plugin/toastr/build/toastr.min.css') }}

<!--
	Jquery move into css.blade for starting JavaScript
	Only one JS on this file
-->
{{ Html::script('public/js/jquery-3.4.0.min.js') }}
{{ Html::script('public/js/popper.min.js') }}