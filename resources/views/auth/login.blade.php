@extends('front.layouts.app')

@section('title')
Adex - Login page
@endsection
@section('title')
<style>
    .invalid-feedback{
        color: "#fff !important";
    }
</style>
@endsection

@section('content')


<!-- Banner start -->
<div class="login-section contact-section" style="background: url(assets/img/pages/login/property-123.png);">
    <div class="container  row justify-content-center">
        <div class="col-lg-6 align-self-center pad-0">
            <div class="main-title-2">
                <h2>Login</h2>
                <p>Sign in to <span>continue.</span></p>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <div class="clearfix"></div>
                    <form action="{{ route('login') }}" method="POST">
                        <div class="form-group form-box">
                            @csrf
                            {{-- <input type="email" name="email" class="input-text" placeholder="Email Address"> --}}
                            <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group form-box clearfix mb-0">
                            {{-- <input type="password" name="Password" class="input-text" placeholder="Password"> --}}
                            <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="clearfix">
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password</a>
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-theme-yellow-second">Login</button>
                        </div>
                    </form>
                    <div class="signup-link">
                        <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->
@endsection
