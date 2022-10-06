<!-- Main header start -->
<!-- <header class="main-header fixed-top"> -->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logos" href="index.html">
                    <img src={{ asset("assets/img/logos/adex-logo-white-yellow.png") }} alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- {{dd(Auth::check())}} --}}
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav header-ml">
                        {{-- @guest --}}
                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    How it Works
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href={{route('adex-market-place')}}>
                                    ADEX Market Place
                                </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="brand-logos" href={{route('home')}}>
                                    <img src={{ asset("assets/img/logos/adex-logo-white-yellow.png") }} alt="logo">
                                </a>
                            </li>
                            @if(Auth::guest())
                                <li class="nav-item">
                                    <a class="nav-link " href={{route('login')}}>
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href={{route('register')}}>
                                        Sign Up
                                    </a>
                                </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link " href={{route('contact-as')}}>
                                    Contact
                                </a>
                            </li>
                        {{-- @endguest --}}
                    </ul>

                </div>
            </nav>
        </div>
    </header>
