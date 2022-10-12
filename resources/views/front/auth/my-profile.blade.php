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
</style>
@endsection





@section('content')
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
                        <h3 class="heading-2">Ad Information</h3>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Asset Name</label>
                                        <input type="text" class="input-text" id="assetname" name="assetname" placeholder="Asset Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Asset Type</label>
                                        <select class="selectpicker search-fields" id="asset_type" name="asset_type">
                                            <option>Apartment</option>
                                            <option>House</option>
                                            <option>Commercial</option>
                                            <option>Garage</option>
                                            <option>Lot</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label>Asset Image</label>
                                    <div id="myDropZone"  class="dropzone mb-0 dropzone-design mb-50">
                                    <input type="hidden" class="input-text assetimage" id="assetimage" name="assetimage">
                                    <input type="hidden" class="input-text assetimage_path" id="assetimage_path" name="assetimage_path">
                                    <input type="hidden" class="input-text removeImages" id="removeImages" name="removeImages">
                                    <input type="hidden" class="input-text cancelImages" id="cancelImages" name="cancelImages">
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="heading-2">Location</h3>
                        <div class="row mb-30">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="input-text" id="assetaddress" name="assetaddress"  placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Landmark</label>
                                    <input type="text" class="input-text" id="assetlandmark" name="assetlandmark"  placeholder="Landmark">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="selectpicker search-fields" id="assetchoosecitys" name="assetchoosecitys">
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
                                    <select class="selectpicker search-fields" id="assetchoosestate" name="assetchoosestate">
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
                                    <input type="text" class="input-text" id="assetzipcode" name="assetzipcode"  placeholder="22401">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Advertisement Requirements</label>
                                    <textarea class="input-text" name="assetmessage" id="assetmessage" placeholder="Advertisement Requirements"></textarea>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Property Gallery</h3>
                        <div id="myDropZoneGallery" class="dropzone dropzone-design mb-50">
                            <input type="hidden" class="input-text asset_property_gallery" id="asset_property_gallery" name="asset_property_gallery">
                            <input type="hidden" class="input-text galleryremoveImages" id="galleryremoveImages" name="galleryremoveImages">
                            <input type="hidden" class="input-text gallerycancelImages" id="gallerycancelImages" name="gallerycancelImages">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
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
    var numberCreate = 0;
    Dropzone.autoDiscover = false;
    var uploaded = false;
    var newValue = [];
    var oldValue = [];
        var mydropzone = new Dropzone("#myDropZone", {
            url: "{{route('dropzone-image')}}",
            uploadMultiple: true,
            parallelUploads: 1,
            addRemoveLinks: true,
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
                var hidden_value = JSON.parse($('.assetimage').val() || '[]');
                hidden_value.forEach(function(item) {
                    if(removefile !== item)
                        oldArr.push(item);
                });
                $('.assetimage').val(JSON.stringify(oldArr));
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
                cancled.push(response_value[numberCreate]);
                $('.cancelImages').val(JSON.stringify(cancled));

                // $.ajax({
                //     url: "{{route('dropremoveImages')}}",
                //     type: 'POST',
                //     data: {
                //         _token: "{{ csrf_token() }}",
                //         file_name: removefile,
                //     },
                //     success: function(response) {
                //         if(response){
                //             $(file.previewElement).remove();
                //         }else{
                //             alert('Somthing Went Wrong');
                //         }
                //     }
                // });
            },
        success: function(file, status , response) {
            var oldArr = [];
            var hidden_value = JSON.parse($('.assetimage').val() || '[]');
            hidden_value.forEach(function(item) {
                oldArr.push(item);
            });
            var response_value = JSON.parse(response.currentTarget.response || '[]');
            oldArr.push(response_value[numberCreate]);
            $('.assetimage').val(JSON.stringify(oldArr));
            element = $('.dz-preview').last(response_value.length);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').html(response_value[numberCreate]);
            oldArr = [];
            if(numberCreate === (response_value.length - 1)) {
                numberCreate = 0;
            } else {
                numberCreate = numberCreate + 1;
            }

            // Add IN cancled Hidden
            var cancled = [];
            var canclehidden_value =  JSON.parse($('.cancelImages').val() || '[]');
            canclehidden_value.forEach(function(item) {
                cancled.push(item);
            });
            cancled.push(response_value[numberCreate]);
            $('.cancelImages').val(JSON.stringify(cancled));
            if(numberCreate === (response_value.length - 1)) {
                numberCreate = 0;
            } else {
                numberCreate = numberCreate + 1;
            }
        }
    });
    var numberCreate = 0;
    Dropzone.autoDiscover = false;
    var uploaded = false;
    var newValue = [];
    var oldValue = [];
        var dropzone = new Dropzone("#myDropZoneGallery", {
            url: "{{route('dropzone-image')}}",
            uploadMultiple: true,
            parallelUploads: 1,
            addRemoveLinks: true,
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
                var hidden_value = JSON.parse($('.asset_property_gallery').val() || '[]');
                hidden_value.forEach(function(item) {
                    if(removefile !== item)
                        oldArr.push(item);
                });
                $('.asset_property_gallery').val(JSON.stringify(oldArr));
                oldArr = [];

                // Add IN Remove Hidden
                var oldremoved = [];
                var removehidden_value =  JSON.parse($('.galleryremoveImages').val() || '[]');
                removehidden_value.forEach(function(item) {
                    oldremoved.push(item);
                });
                    oldremoved.push(removefile);
                $('.galleryremoveImages').val(JSON.stringify(oldremoved));
                    $(file.previewElement).remove();

                var cancled = [];
                var canclehidden_value =  JSON.parse($('.galleryremoveImages').val() || '[]');
                canclehidden_value.forEach(function(item) {
                    cancled.push(item);
                });
                cancled.push(response_value[numberCreate]);
                $('.galleryremoveImages').val(JSON.stringify(cancled));
            },
        success: function(file, status , response) {
            var oldArr = [];
            var hidden_value = JSON.parse($('.asset_property_gallery').val() || '[]');
            hidden_value.forEach(function(item) {
                oldArr.push(item);
            });
            var response_value = JSON.parse(response.currentTarget.response || '[]');
            oldArr.push(response_value[numberCreate]);
            $('.asset_property_gallery').val(JSON.stringify(oldArr));
            element = $('.dz-preview').last(response_value.length);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').html(response_value[numberCreate]);
            oldArr = [];
            if(numberCreate === (response_value.length - 1)) {
                numberCreate = 0;
            } else {
                numberCreate = numberCreate + 1;
            }

            // Add IN cancled Hidden
            var cancled = [];
            var canclehidden_value =  JSON.parse($('.gallerycancelImages').val() || '[]');
            canclehidden_value.forEach(function(item) {
                cancled.push(item);
            });
            cancled.push(response_value[numberCreate]);
            $('.gallerycancelImages').val(JSON.stringify(cancled));
            if(numberCreate === (response_value.length - 1)) {
                numberCreate = 0;
            } else {
                numberCreate = numberCreate + 1;
            }
        }
    });

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = "{{ Auth::user()->id }}";
    $.ajax({
        type: 'post',
        url: "{{ route('getbusinessdata') }}",
        data: {
            id: id,
            _token: "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(data) {
            if(data != null){
                $('#businessname').val(data.user.businessname);
                $('#email').val(data.user.email);
                $('#phone').val(data.user.phone);
                $('#address').val(data.user.address);
                $('#landmark').val(data.user.landmark);
                $('#city').val(data.user.city);
                $('#state').val(data.user.state);
                $('#zipcode').val(data.user.zipcode);
                $('#bioInformation').val(data.user.bioinformation);
                $('#assetname').val(data.user.asset_name);
                $('#asset_type').val(data.user.asset_type);
                $('#assetimage').val(data.user.asset_image);
                $('#assetimage_path').val(data.user.images);
                // console.log(JSON.parse(data.user.asset_image));
                $.each(data.images, function(key,value) {
                    var filename = value;
                    var image_name = filename.split("http://localhost/bharat/backpackdemo2/public/get-storage-path/image/");
                    var mockFile = { name: image_name[1]};
                    mydropzone.options.addedfile.call(mydropzone, mockFile);
                    mydropzone.options.thumbnail.call(mydropzone, mockFile, value);
                    mydropzone.emit("complete", mockFile);
                });
                $.each(data.gallary_img, function(key,value) {
                    var filename = value;
                    var image_name = filename.split("http://localhost/bharat/backpackdemo2/public/get-storage-path/image/");
                    var mockFile = { name: image_name[1]};
                    dropzone.options.addedfile.call(dropzone, mockFile);
                    dropzone.options.thumbnail.call(dropzone, mockFile, value);
                    dropzone.emit("complete", mockFile);
                });
                // $.each(data.images, function(key, image_path) {

                    //     $('.dropzone').append('<div class="dz-preview" data-id="'+key+'" data-path="'+image_path+'"><img class="dropzone-thumbnail" src="'+image_path+'" /><a class="dz-remove" href="javascript:void(0);" data-remove="'+key+'" data-path="'+image_path+'">Remove file</a></div>');
                    // });
                    $('#assetaddress').val(data.user.asset_address);
                    $('#assetlandmark').val(data.user.asset_landmark);
                    $('#assetchoosecitys').val(data.user.asset_city);
                    $('#assetchoosestate').val(data.user.asset_state);
                    $('#assetzipcode').val(data.user.asset_zipcode);
                    $('#assetmessage').val(data.user.asset_advertisement_requirements);
                    $('#asset_property_gallery').val(data.user.asset_property_gallery);

                    $(document).on('click','.dz-remove',function() {
                        alert('remove');
                        removefile = $(this).closest('.dz-preview').find('.dz-filename span').data('dz-name');
                        var oldArr = [];
                        var oldremoved = [];
                        var hidden_value = JSON.parse($('.dropzone_hidden').val() || '[]');
                        hidden_value.forEach(function(item) {
                            if(removefile !== item)
                            oldArr.push(item);
                        });
                        $('.dropzone_hidden').val(JSON.stringify(oldArr));
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
                    $('#assetname').val();
                    $('#asset_type').val();
                    $('#assetimage').val();
                    $('#assetimage_path').val();
                    $('#assetaddress').val();
                    $('#assetlandmark').val();
                    $('#assetchoosecitys').val();
                    $('#assetchoosestate').val();
                    $('#assetzipcode').val();
                    $('#assetmessage').val();
                    $('#asset_property_gallery').val();
                }
            }
        });

    $("#ContactDetailsform").submit(function(e) {
                e.preventDefault();
            $('.cancelImages').val('');
            $('.gallerycancelImages').val('');
        // if ($(this).valid()) {
            var formdata = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('updatebusiness')}}",
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert('success');
                },
            });
        // }

    });
    $("#adInformation").submit(function(e) {
                e.preventDefault();
        // // if ($(this).valid()) {
        //     var formdata = new FormData(this);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: "POST",
        //         url: "{{route('updatebusiness')}}",
        //         data: formdata,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             alert('update');
        //         },
        //     });
        // // }
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
