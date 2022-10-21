@extends('front.layouts.app')


@section('title')
Adex - Notification
@endsection
@section('content')
@include('front.auth.deshboard')

<div class="submit-property content-area">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-md-12">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">ADEX Notifications</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Reminders</h6>
                                    <label>Wrap up Emails about content you missed</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Advertisement Updates</h6>
                                    <label>Changes to Advertisement</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Repost</h6>
                                    <label>When others repost your content</label>
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
            <div class="col-lg-8 col-md-12">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">Marketing Communications</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Sales & Promotions</h6>
                                    <label>We only notify you for significant promotions</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox" checked/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Product updates</h6>
                                    <label>Major changes in our product offering</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Newsletter</h6>
                                    <label>Updates on what’s going on here at Adex</label>
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
    </div>
</div>
@endsection

