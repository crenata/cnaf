<!DOCTYPE html>
<html>
<head>
    @include('partials.body.head')
</head>
<body>
    <div class="container">
        @include('partials.attributs.nav')

        @yield('content-container')
    </div>

    @yield('content')

    @include('partials.body.footer')

    @include('partials.components.js')
</body>
</html>