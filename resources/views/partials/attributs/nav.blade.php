<nav class="navbar navbar-expand-lg navbar-light px-0" style="background-color: white;">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('public/images/home/logo.png') }}" width="220" class="" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mr-auto"></ul>
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('article') ? 'active' : '' }}">
                <a class="nav-link" href="#">Artikel</a>
            </li>
            <li class="nav-item {{ Request::is('simulation') ? 'active' : '' }}">
                <a class="nav-link" href="#">Simulasi</a>
            </li>
            <li class="nav-item {{ Request::is('tentang-kami') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tentangkami') }}">Tentang Kami</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Masuk</a>
            </li>
            <li class="nav-item btn btn-danger ml-2">
                <a class="nav-link px-2 py-0 text-white" href="{{ route('register') }}">Daftar</a>
            </li>
        </ul>
    </div>
</nav>