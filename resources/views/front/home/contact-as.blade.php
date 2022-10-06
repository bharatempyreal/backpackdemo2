@extends('front.layouts.app')

@section('title')
Adex - Contact Us page
@endsection


@section('content')
<!-- Banner start -->
<div class="login-section contact-section" style="background: url(assets/img/pages/login/property-123.png);">
    <div class="container  row justify-content-center">
        <div class="col-lg-8 align-self-center pad-0">
            <div class="main-title-2 m-0">
                <h2>Contact</h2>
                <p>How can we <span>assist</span> you?</p>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group number">
                                    <input type="text" name="phone" class="form-control" placeholder="Number">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" placeholder="Write message" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-lg btn-theme-yellow-second">Send Massage</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

@endsection
