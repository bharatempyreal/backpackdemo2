<div class="profile-banner">
    <div class="container">
        <div class="row" style="min-height: 200px;">
            <div class="col-md-2" style="min-height: 200px;">
                <a href="my-profile.php" class="ml-4">
                    <img src={{asset("assets/img/avatar/avatar-2.jpg")}} alt="comments-user">
                </a>
            </div>
            <div class="col-md-6 owner-details my-auto">
                <div class="ml-4 info-center">
                    <h2>Lucia Wagon - </h2>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="mt-1 mb-3">luciawagon@gmail.com</h3>
                    <a href="#" class="btn btn-sm btn-theme-yellow-second">View Dashboard</a>
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
                    <a href="{{route('my-profile')}}" class="nav-item nav-link active">General Information</a>
                    <a href="{{route('security')}}" class="nav-item nav-link">Security</a>
                    <a href="{{route('notification')}}" class="nav-item nav-link">Notification</a>
                    <a href="{{route('my-wallet')}}" class="nav-item nav-link">My Wallet</a>
                    <a href="{{route('my-adex')}}" class="nav-item nav-link">My ADEX</a>
                </div>
            </div>
        </nav>
    </div>
</div>
