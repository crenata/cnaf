<!DOCTYPE html>
<html>
<head>
    @include('partials.body.head')
</head>
<body>
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