<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('public/css/user/home/screen480px.css') }}" media="screen and (min-width: 1px) and (max-width: 480px)">
<link rel="stylesheet" href="{{ asset('public/css/user/home/screen576px.css') }}" media="screen and (min-width: 481px) and (max-width: 576px)">
<link rel="stylesheet" href="{{ asset('public/css/user/home/screen768px.css') }}" media="screen and (min-width: 577px) and (max-width: 768px)">
<link rel="stylesheet" href="{{ asset('public/css/user/home/screen992px.css') }}" media="screen and (min-width: 769px) and (max-width: 992px)">
<link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200px.css') }}" media="screen and (min-width: 993px) and (max-width: 1200px)">
<link rel="stylesheet" href="{{ asset('public/css/user/home/screen1200pxup.css') }}" media="screen and (min-width: 1201px)">

{{ Html::style('public/plugin/bootstrap-4.3.1/dist/css/bootstrap.css') }}
{{ Html::style('public/plugin/fontawesome-free-5.9.0-web/css/all.css') }}

<!--
	Jquery move into css.blade for starting JavaScript
	Only one JS on this file
-->
{{ Html::script('public/js/jquery-3.4.0.min.js') }}
{{ Html::script('public/js/popper.min.js') }}