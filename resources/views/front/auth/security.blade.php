@extends('front.layouts.app')


@section('title')
Adex - My Security
@endsection

@section('content')
@include('front.auth.deshboard')
<div class="submit-property content-area">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">Privacy</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Public Profile</h6>
                                    <label>Making your profile public means anyone can see your information</label>
                                    <div class="material-switch pull-right">
                                        <input id="profile_status" {{ (auth()->check() && auth()->user() && auth()->user()->profile_status == '1') ? 'checked' : '' }} name="profile_status" type="checkbox"/>
                                        <label for="profile_status" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Show email</h6>
                                    <label>This lets users find you by your email address</label>
                                    <div class="material-switch pull-right">
                                        <input id="show_email" {{ (auth()->check() && auth()->user() && auth()->user()->show_email == '1') ? 'checked' : '' }} name="show_email" type="checkbox"/>
                                        <label for="show_email" class="label-default"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">Two Fact Authentication - Required?</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Authenticator App</h6>
                                    <label>Google auth or 1Password</label>
                                    <div class="material-switch pull-right">
                                        <input id="authenticator" name="authenticator" {{ (auth()->check() && auth()->user() && auth()->user()->authenticator == '1') ? 'checked' : '' }} type="checkbox"/>
                                        <label for="authenticator" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">SMS Recovery</h6>
                                    <label>Standard messaging rates apply</label>
                                    <div class="material-switch pull-right">
                                        <input id="smsrecovery" name="smsrecovery" {{ (auth()->check() && auth()->user() && auth()->user()->smsrecovery == '1') ? 'checked' : '' }} type="checkbox"/>
                                        <label for="smsrecovery" class="label-default"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form id="change_password" action="{{ route('change_password') }}" method="POST" >
                        @csrf
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                        <h3 class="heading-2">Password</h3>
                        <div class="row  mb-30">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="input-text" name="curentpassword" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" id="password" class="input-text" name="password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="input-text" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-theme-yellow-second">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $('#profile_status').change(function() {
        var status = 0;
        if($(this).is(":checked")) {
            status = 1;
        }
        $.ajax({
            url:"{{ route('profile-status') }}",
            type:'POST',
            dataType:'json',
            data :{
                status :status,
                _token:"{{ csrf_token() }}"
            },
            success:function(response){
                if(response.status){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: error,
                        title: response.message
                    })
                }
            }
        });
    });
    $('#show_email').change(function() {
        var email = 0;
        if($(this).is(":checked")) {
            email = 1;
        }
        $.ajax({
            url:"{{ route('show-email') }}",
            type:'POST',
            dataType:'json',
            data :{
                email :email,
                _token:"{{ csrf_token() }}"
            },
            success:function(response){
                if(response.status){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: error,
                        title: response.message
                    })
                }
            }
        });
    });
    $('#authenticator').change(function() {
        var authenticator = 0;
        if($(this).is(":checked")) {
            authenticator = 1;
        }
        $.ajax({
            url:"{{ route('authenticator') }}",
            type:'POST',
            dataType:'json',
            data :{
                authenticator :authenticator,
                _token:"{{ csrf_token() }}"
            },
            success:function(response){
                if(response.status){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: error,
                        title: response.message
                    })
                }
            }
        });
    });
    $('#smsrecovery').change(function() {
        var smsrecovery = 0;
        if($(this).is(":checked")) {
            smsrecovery = 1;
        }
        $.ajax({
            url:"{{ route('smsrecovery') }}",
            type:'POST',
            dataType:'json',
            data :{
                smsrecovery :smsrecovery,
                _token:"{{ csrf_token() }}"
            },
            success:function(response){
                if(response.status){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: error,
                        title: response.message
                    })
                }
            }
        });
    });
    $('#change_password').validate({
                ignore: [],
                rules: {
                    "curentpassword": {required : true,minlength:8},
                    "password": {required : true,minlength:8},
                    "password_confirmation": {
                    minlength: 8,
                    equalTo: "#password"
                    }
                },
                messages: {
                    "curentpassword": {minlength:"Please enter Valid Password",required:"Please enter CurrentPassword"},
                    "password":{minlength: "The Passord field is required.",required:"Please enter NewPassword"}
                },
                errorPlacement: (error, element) => {
                    error.appendTo(element.closest('div'));
                }
        });
    $("#change_password").submit(function(e) {

        if ($(this).valid()) {

            // var formdata = new FormData(this);
            // console.log(formdata);
            // $.ajax({
            //     url:"{{ route('change_password') }}",
            //     type:'POST',
            //     dataType:'json',
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     data: formdata,
            //     success:function(response){
            //         console.log(response);
            //     }
            // });
        }else{
            e.preventDefault();
        }
    });


</script>
@endsection



