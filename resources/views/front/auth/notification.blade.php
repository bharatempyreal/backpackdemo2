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
                                        <input id="reminders" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->reminders_notification == '1') ? 'checked' : '' }} data-name="reminders_notification" type="checkbox"/>
                                        <label for="reminders" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Advertisement Updates</h6>
                                    <label>Changes to Advertisement</label>
                                    <div class="material-switch pull-right">
                                        <input id="advertisement_updates" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->advertisement_updates_notification == '1') ? 'checked' : '' }} data-name="advertisement_updates_notification" type="checkbox"/>
                                        <label for="advertisement_updates" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Repost</h6>
                                    <label>When others repost your content</label>
                                    <div class="material-switch pull-right">
                                        <input id="repost" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->repost_notification == '1') ? 'checked' : '' }} data-name="repost_notification" type="checkbox"/>
                                        <label for="repost" class="label-default"></label>
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
                                        <input id="sales_promotions" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->sales_promotions_notification == '1') ? 'checked' : '' }} data-name="sales_promotions_notification" type="checkbox"/>
                                        <label for="sales_promotions" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Product updates</h6>
                                    <label>Major changes in our product offering</label>
                                    <div class="material-switch pull-right">
                                        <input id="product_updates" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->product_updates_notification == '1') ? 'checked' : '' }} data-name="product_updates_notification" type="checkbox"/>
                                        <label for="product_updates" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Newsletter</h6>
                                    <label>Updates on what’s going on here at Adex</label>
                                    <div class="material-switch pull-right">
                                        <input id="newsletter" class="notification_checkbox" {{ (auth()->check() && auth()->user() && auth()->user()->newsletter_notification == '1') ? 'checked' : '' }} data-name="newsletter_notification" type="checkbox"/>
                                        <label for="newsletter" class="label-default"></label>
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

@section('script')
<script>
    $('.notification_checkbox').change(function() {
        var data = 0;
        if($(this).is(":checked")) {
            data = 1;
        }
        var name = $(this).data('name');

        // if(data == 1){
        //     alert(name+ " Is checked")
        // }else{
        //     alert(name+ " Is Unchecked")

        // }
        $.ajax({
            url:"{{ route('notification_status') }}",
            type:'POST',
            dataType:'json',
            data :{
                name :name,
                status:data
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
</script>
@endsection
