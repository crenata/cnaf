<!DOCTYPE html>
<html>
<head>
    @include('partials.body.head')
</head>
<body style="min-height: 100vh; display: block; position: relative;">
    <div class="shadow">
        <div class="container">
            @include('partials.attributs.nav')
        </div>
    </div>

    <div class="container">
        @yield('content-container')
    </div>

    @yield('content')

    @include('partials.body.footer')

    @include('partials.components.js')
</body>
</html>