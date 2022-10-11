@extends('front.layouts.app')

@section('title')
Adex - Signup page
@endsection
@section('title')


@endsection


@section('content')
<!-- Banner start -->
<div class="login-section contact-section" style="background: url(assets/img/pages/login/property-123.png);">
    <div class="container  row justify-content-center">
        <div class="col-lg-6 align-self-center pad-0">
            <div class="main-title-2 mb-0">
                <h2>Register</h2>
                <p>Register to access the <span>ADEX </span>Marketplace</p>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <div class="clearfix"></div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group form-box">
                            {{-- <input type="text" name="first-name" class="input-text" placeholder="First Name"> --}}
                            <input id="firstname" type="text" class="input-text form-control @error('name') is-invalid @enderror" placeholder="First Name" name="first-name" value="{{ old('first-name') }}" required autocomplete="first-name" autofocus>

                                @error('first-name')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group form-box">
                            {{-- <input type="text" name="last-name" class="input-text" placeholder="Last Name"> --}}
                            <input id="lastname" type="text" class="input-text form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" name="last-name" value="{{ old('last-name') }}" required autocomplete="last-name" autofocus>

                                @error('last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group form-box">
                            {{-- <input type="text" name="address" class="input-text" placeholder="Full Address"> --}}
                            <input id="address" type="text" class="input-text form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Full Address" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group form-box">
                            {{-- <input type="email" name="email" class="input-text" placeholder="Email Address"> --}}
                            <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group form-box">
                            {{-- <input type="password" name="Password" class="input-text" placeholder="Password"> --}}
                            <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group form-box clearfix">
                            {{-- <input type="password" name="confirm-Password" class="input-text" placeholder="Confirm Password"> --}}
                            <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-theme-yellow-second">Sign up</button>
                        </div>
                    </form>
                    <div class="signup-link">
                        <p>Have an account? <a href={{route('login')}}>Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->
@endsection
