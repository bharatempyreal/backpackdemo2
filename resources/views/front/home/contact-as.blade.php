@extends('front.layouts.app')

@section('title')
Adex - Contact Us page
@endsection

@section('style')
<style>
    .error{
        color: red;
        text-align: left;
        display: block;
    }
</style>
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
                    <form id="contact-asform" method="POST" enctype="multipart/form-data">
                        @csrf
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {

        $('#contact-asform').validate({
                ignore: [],
                rules: {
                    "name": "required",
                    "email": {email: true,required :true},
                    "subject": "required",
                    "phone": {required : true,minlength:10},
                    "message": "required",
                },
                messages: {
                    "name": "The Name field is required.",
                    "email": {email:"Enter Valid Email!",required:"Enter Email!"},
                    "subject": "The Subject field is required.",
                    "phone": {minlength:"Please enter Valid Mobile No.",required:"Please enter Mobile No."},
                    "message": "The Message field is required.",
                },
                errorPlacement: (error, element) => {
                    error.appendTo(element.closest('div'));
                }

        });
        $("#contact-asform").submit(function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                var formdata = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('contact-as-store')}}",
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
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
                    },
                });
            }
        });
    });

</script>
@endsection

