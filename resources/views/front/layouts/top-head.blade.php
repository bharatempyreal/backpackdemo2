<!-- Main header start -->
<!-- <header class="main-header fixed-top"> -->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logos" href="#">
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
                                <a class="nav-link " href={{route('howItWork')}}>
                                    How it Works
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href={{route('adex-market-place')}}>
                                    ADEX Market Place
                                </a>
                            </li>
                            <li class="nav-item my-auto">
                                <a class="brand-logos" href={{route('user-dashboard')}}>
                                    <img src={{ asset("assets/img/logos/adex-logo-white-yellow.png") }} alt="logo">
                                </a>
                            </li>
                            @if(Auth::guest())
                                <li class="nav-item">
                                    <a class="nav-link " href={{route('login')}}>
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href={{route('register')}}>
                                        Sign Up
                                    </a>
                                </li>
                            @else
                            <li class="nav-item">
                              <a href="{{ route('profile') }}" class="nav-link">{{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href={{route('user-logout')}}>Logout</a>
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
