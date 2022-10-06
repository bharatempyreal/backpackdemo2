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
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Show email</h6>
                                    <label>This lets users find you by your email address</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
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
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">SMS Recovery</h6>
                                    <label>Standard messaging rates apply</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
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
                        <h3 class="heading-2">Password</h3>
                        <div class="row  mb-30">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="Confirm Password">
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

