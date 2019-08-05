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
            <li class="nav-item {{ Request::is('articles') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('articles') }}">Artikel</a>
            </li>
            <li class="nav-item {{ Request::is('simulasi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('simulasi') }}">Simulasi</a>
            </li>
            @auth
                @if(!Auth::user()->is_vendor)
                    <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                @endif
            @else
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                </li>
            @endauth
            <li class="nav-item {{ Request::is('tentang-kami') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tentangkami') }}">Tentang Kami</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    @if(!Auth::user()->is_vendor)
                        @if(Auth::user()->credit == null || Auth::user()->credit == '')
                            <a class="nav-link credit">Credit Rp. 0,-</a>
                        @else
                            <a class="nav-link credit">Credit Rp. {{ number_format(Auth::user()->credit) }},-</a>
                        @endif
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle username-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_vendor)
                            <a href="{{ route('account.vendor') }}" class="dropdown-item">Dashboard</a>
                        @else
                            <a href="{{ route('account') }}" class="dropdown-item">Account</a>
                            <a href="{{ route('cart.index') }}" class="dropdown-item">Cart</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                </li>
                <li class="nav-item btn btn-danger ml-2">
                    <a class="nav-link px-2 py-0 text-white" href="{{ route('register') }}">Daftar</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
