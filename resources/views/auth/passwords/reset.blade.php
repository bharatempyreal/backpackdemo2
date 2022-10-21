@extends('front.layouts.app')

@section('content')

<!-- Banner start -->
<div class="login-section contact-section" style="background: url({{ asset('assets/img/pages/login/property-123.png') }})">
    <div class="container  row justify-content-center">
        <div class="col-lg-6 align-self-center pad-0">
            <div class="main-title-2">
                <h2>Reset Password</h2>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <div class="clearfix"></div>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group form-box">
                            {{-- <input type="email" name="email" class="input-text" placeholder="Email Address"> --}}
                            <input id="email" type="email" class="input-text input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group form-box clearfix">
                            <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

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
                            <button type="submit" class="btn btn-lg btn-theme-yellow-second">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->


@endsection
