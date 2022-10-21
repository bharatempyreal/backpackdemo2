@extends('front.layouts.app')


@section('content')

<div class="login-section contact-section" style="background: url({{ asset('assets/img/pages/login/property-123.png') }});">
    <div class="container  row justify-content-center">
        <div class="col-lg-6 align-self-center pad-0">
            <div class="main-title-2">
                <h2>Reset Password</h2>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <div class="clearfix"></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        <div class="form-group form-box">
                            @csrf
                            {{-- <input type="email" name="email" class="input-text" placeholder="Email Address"> --}}
                            <input id="email" type="email" class="input-text input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-theme-yellow-second">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
