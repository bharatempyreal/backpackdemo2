<div class="profile-banner">
    <div class="container">
        <div class="row" style="min-height: 200px;">
            <div class="col-lg-3 col-md-4 col-5 text-center">
                <a href={{route('my-profile')}}>
                    @php
                        $image = (auth()->check() && auth()->user() && auth()->user()->profile_pic)?auth()->user()->profile_pic:'';
                    @endphp
                    <img src="{{ asset_storage().((isset($image) && !empty($image)) ? $image : 'e') }}" class="profile_pic">
                </a>
            </div>
            <div class="col-lg-6 col-md-8 col-7 owner-details my-auto">
                <div class="info-center">
                    <h2><a href={{route('my-profile')}}>{{ (auth()->check() && auth()->user() && auth()->user()->name)?auth()->user()->name:'' }} </a>- </h2>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="mt-1 mb-3">{{ (auth()->check() && auth()->user() && auth()->user()->email)?auth()->user()->email:'' }}</h3>
                    <a href={{route('user-dashboard')}} class="btn btn-sm btn-theme-yellow-second">View Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- profile nav menu -->
<div class="dashboard-nav">
    <div class="container">
        <nav class="navbar navbar-expand-lg nav-justified">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav w-100">
                    <a href="{{route('user-dashboard')}}" class="nav-item nav-link {{ request()->is('user-dashboard') ? 'active' : ''}}">Dashboard</a>
                    <a href="{{route('my-profile')}}" class="nav-item nav-link {{ request()->is('my-profile') ? 'active' : ''}}">General Information</a>
                    <a href="{{route('security')}}" class="nav-item nav-link {{ request()->is('security') ? 'active' : ''}}">Security</a>
                    <a href="{{route('notification')}}" class="nav-item nav-link {{ request()->is('notification') ? 'active' : ''}}">Notification</a>
                    <a href="{{route('my-wallet')}}" class="nav-item nav-link {{ request()->is('my-wallet') ? 'active' : ''}}">My Wallet</a>
                    <a href="{{route('my-adex')}}" class="nav-item nav-link {{ request()->is('my-adex') ? 'active' : ''}}">My ADEX</a>
                </div>
            </div>
        </nav>
    </div>
</div>
