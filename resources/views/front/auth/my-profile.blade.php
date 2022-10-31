@extends('front.layouts.app')


@section('title')
Adex - My Profile
@endsection
@section('style')
<link rel="stylesheet" type="text/css"  href={{asset("assets/css/dropzone.css")}}>
<link rel="stylesheet" href={{asset("assets/css/map.css")}} type="text/css">
<style>

    .dz-preview img {
        width: 100%;
        max-width: 200px;
        margin: 0 auto;
    }
    div#myDropZone {
        display: flex;
    }
    .dropzone .dz-default.dz-message span {
            display: block;
    }
    .dz-size{
        display: none;
    }
    .dropzone-design .dz-preview{
        min-height: 0;
        height: 206px !important;
    }
    .dropzone .dz-preview .dz-details, .dropzone-previews .dz-preview .dz-details{
        height: 0;
    }
    .dropzone-design{
        width: 43%;
    }
    .dropzone{
        min-height:200px;
    }
</style>
@endsection





@section('content')
@php
    $hide_half_form = true;
@endphp
@include('front.auth.deshboard')

<!-- Submit Property start -->
<div class="submit-property content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form id="ContactDetailsform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="heading-2">Contact Details</h3>
                        <div class="row  mb-30">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" class="input-text" id="businessname" name="businessname" placeholder="Business Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="input-text" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" class="input-text" id="phone" name="phone"  placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Location</h3>
                        <div class="row mb-30">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="input-text" id="address" name="address"  placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Landmark</label>
                                    <input type="text" class="input-text" id="landmark" name="landmark"  placeholder="Landmark">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="selectpicker search-fields" id="city" name="choosecitys">
                                        <option>Choose Citys</option>
                                        <option>New York</option>
                                        <option>Los Angeles</option>
                                        <option>Chicago</option>
                                        <option>Brooklyn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="selectpicker search-fields" id="state" name="choosestate">
                                        <option>Choose State</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Colorado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="input-text" id="zipcode" name="zipcode"  placeholder="22401">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label>Profile Picture</label>
                                <div id="myDropZone"  class="dropzone mb-0 dropzone-design mb-50">
                                <input type="hidden" class="input-text assetimage" id="assetimage" name="assetimage">
                                <input type="hidden" class="input-text assetimage_path" id="assetimage_path" name="assetimage_path">
                                <input type="hidden" class="input-text removeImages" id="removeImages" name="removeImages">
                                <input type="hidden" class="input-text cancelImages" id="cancelImages" name="cancelImages">
                                    <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Bio Information</h3>
                        <div class="row mb-50">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label>Bio Information</label>
                                    <textarea class="input-text" id="bioInformation" name="message" placeholder="Detailed Information"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button id="ContactDetails" type="submit" class="btn btn-lg btn-theme-black-second">Save Changes</button>
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

<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/dropzone.js")}}></script>

<script>

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = "{{ Auth::user()->id }}";
    $.ajax({
        type: 'post',
        url: "{{ route('get-business-profile') }}",
        data: {
            id: id,
            _token: "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(data) {
            if(data != null){
                $('#businessname').val(data.user.business_name);
                $('#email').val(data.user.email);
                $('#phone').val(data.user.phone);
                $('#address').val(data.user.address);
                $('#landmark').val(data.user.landmark);
                $("#city").selectpicker('val', data.user.city);
                $('#state').selectpicker('val', data.user.state);
                $('#zipcode').val(data.user.zipcode);
                $('#bioInformation').val(data.user.bio_information);
                $('#assetimage').val(data.user.profile_pic);
                $.each(data.images, function(key,value) {
                    var slug = value.split('/');
                    // console.log(slug);
                    // return false;
                    var filename = slug[(slug.length)-1];
                    // var filename = data.images
                    var image_name = filename;
                    var mockFile = { name: filename};
                    mydropzone.options.addedfile.call(mydropzone, mockFile);
                    mydropzone.options.thumbnail.call(mydropzone, mockFile, value);
                    mydropzone.emit("complete", mockFile);
                });
                $(document).on('click','.dz-remove',function() {
                    // alert('remove');
                    removefile = $(this).closest('.dz-preview').find('.dz-filename span').data('dz-name');
                    var oldArr = [];
                    var oldremoved = [];
                    var hidden_value = JSON.parse($('.dropzone_hidden').val() || '[]');
                    hidden_value.forEach(function(item) {
                        if(removefile !== item)
                        oldArr.push(item);
                    });
                    $('.assetimage').val(JSON.stringify(oldArr));
                    $(this).closest('.dz-preview').remove();
                });

                }else{
                    $('#businessname').val();
                    $('#email').val();
                    $('#phone').val();
                    $('#address').val();
                    $('#landmark').val();
                    $('#city').val();
                    $('#state').val();
                    $('#zipcode').val();
                    $('#bioInformation').val();
                    $('#assetimage').val();
                }
            }
        });




        // old profile form submit

    // $("#ContactDetailsform").submit(function(e) {
    //             e.preventDefault();
    //         $('.cancelImages').val('');
    //         $('.gallerycancelImages').val('');
    //     // if ($(this).valid()) {
    //         var formdata = new FormData(this);
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "{{route('updatebusiness')}}",
    //             data: formdata,
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             success: function(response) {
    //                 if(response.status){
    //                     Toast.fire({
    //                         icon: 'success',
    //                         title: response.message
    //                     })
    //                 }else{
    //                     Toast.fire({
    //                         icon: error,
    //                         title: response.message
    //                     })
    //                 }
    //             },
    //         });
    //     // }

    // });


    var numberCreate = 0;
    Dropzone.autoDiscover = false;
    var uploaded = false;
    var newValue = [];
    var oldValue = [];
        var mydropzone = new Dropzone("#myDropZone", {
            url: "{{route('dropzone-image')}}",
            uploadMultiple: false,
            parallelUploads: 1,
            addRemoveLinks: true,
            maxFiles: 1,
            init: function() {
                this.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
            });
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token').val());
            },
            error: function(file, response) {
                console.log('error');
                $(file.previewElement).find('.dz-error-message').remove();
                $(file.previewElement).remove();
            },
            removedfile: function(file) {
                removefile = $(file.previewElement).find('.dz-filename span').html();
                var oldArr = [];
                var hidden_value = $('.assetimage').val();
                // hidden_value.forEach(function(item) {
                    if(removefile !== hidden_value)
                        oldArr.push(hidden_value);
                // });
                $('.assetimage').val(oldArr);
                oldArr = [];

                var oldremoved = [];
                var removehidden_value =  JSON.parse($('.removeImages').val() || '[]');
                removehidden_value.forEach(function(item) {
                    oldremoved.push(item);
                });
                    oldremoved.push(removefile);
                $('.removeImages').val(JSON.stringify(oldremoved));
                    $(file.previewElement).remove();

                var cancled = [];
                var canclehidden_value =  JSON.parse($('.cancelImages').val() || '[]');
                canclehidden_value.forEach(function(item) {
                    cancled.push(item);
                });
                // cancled.push(response_value[numberCreate]);
                // $('.cancelImages').val(JSON.stringify(cancled));
            },
        success: function(file, status , response) {
            $(".dz-preview").each(function(index, val) {
                if(($(".dz-preview").length-1) != 0){
                    if(index <= ($(".dz-preview").length-1)){
                        var old_img = $(this).find('.dz-filename span').html();
                        $(this).remove();
                    }
                }
            });
            var response_value = JSON.parse(response.currentTarget.response || '[]');
            // alert(response_value);
            var oldArr = [];
            var hidden_value = $('.assetimage').val();
            // hidden_value.forEach(function(item) {
            //     oldArr.push(item);
            // });
            // console.log(oldArr);
            var removefile = $(file.previewElement).find('.dz-filename span').html();
            var removehidden_value =  JSON.parse($('.removeImages').val() || '[]');
                removehidden_value.forEach(function(item) {
                    oldArr.push(item);
                });
                $('.removeImages').val(JSON.stringify(oldArr));


            var newImg = [];
            newImg.push(response_value[0]);
            $('.assetimage').val(newImg);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value);
            $(file.previewTemplate).find('.dz-filename span').html(response_value);

            // Add IN cancled Hidden
            var cancled = [];
            var canclehidden_value =  JSON.parse($('.cancelImages').val() || '[]');
            canclehidden_value.forEach(function(item) {
                cancled.push(item);
            });
            cancled.push(response_value[0]);
            $('.cancelImages').val(JSON.stringify(cancled));
        }
    });

    $("#ContactDetailsform").submit(function(e) {
                e.preventDefault();
        // $('.removeImages').val('');
        $('.cancelImages').val('');
        // if ($(this).valid()) {
            var formdata = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('business-profile')}}",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response){
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
        // }
    });

    $( window ).bind('beforeunload', function(){
        var cancle = JSON.parse($('.cancelImages').val() || '[]');
        var url = "{{route('dropremoveImages')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            dataType:'json',
            data: {
                files: cancle,
                _token:"{{ csrf_token() }}"
            },
            success: function(response) {

            }
        });
        var gallerycancelImages = JSON.parse($('.gallerycancelImages').val() || '[]');
        var url = "{{route('dropremoveImages')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            dataType:'json',
            data: {
                files: gallerycancelImages,
                _token:"{{ csrf_token() }}"
            },
            success: function(response) {
                return true;
            }
        });
    });

});
</script>


@endsection
