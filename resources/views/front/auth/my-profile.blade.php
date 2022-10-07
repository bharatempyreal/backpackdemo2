@extends('front.layouts.app')


@section('title')
Adex - My Profile
@endsection
@section('style')
<link rel="stylesheet" type="text/css"  href={{asset("assets/css/dropzone.css")}}>
<link rel="stylesheet" href={{asset("assets/css/map.css")}} type="text/css">

@endsection



@section('content')
@include('front.auth.deshboard')

<!-- Submit Property start -->
<div class="submit-property content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form id="ContactDetailsform" method="POST">
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
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button id="ContactDetails" type="submit" class="btn btn-lg btn-theme-black-second">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form id="adInformation" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="heading-2">Ad Information</h3>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Asset Name</label>
                                        <input type="text" class="input-text" name="assetname" placeholder="Asset Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Asset Type</label>
                                        <select class="selectpicker search-fields" name="apartment">
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
                                    <input type="hidden" class="input-text assetimage" name="assetimage">
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
                                    <input type="text" class="input-text" name="assetaddress"  placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Landmark</label>
                                    <input type="text" class="input-text" name="assetlandmark"  placeholder="Landmark">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="selectpicker search-fields" name="assetchoosecitys">
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
                                    <select class="selectpicker search-fields" name="assetchoosestate">
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
                                    <input type="text" class="input-text" name="assetzipcode"  placeholder="22401">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Advertisement Requirements</label>
                                    <textarea class="input-text" name="assetmessage" placeholder="Advertisement Requirements"></textarea>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Property Gallery</h3>
                        <div id="myDropZoneGallery" class="dropzone dropzone-design mb-50">
                            <input type="hidden" class="input-text asset_property_gallery" name="asset_property_gallery">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-theme-black-second">Submit</button>
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
        var dropzone = new Dropzone("#myDropZone", {
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
                removefile = $(file.previewElement).find('.dz-filename span').data('dz-name');
                var oldArr = [];
                var hidden_value = JSON.parse($('.assetimage').val() || '[]');
                hidden_value.forEach(function(item) {
                    if(removefile !== item)
                        oldArr.push(item);
                });
                $('.assetimage').val(JSON.stringify(oldArr));
                oldArr = [];
                $.ajax({
                    url: "{{route('dropremoveImages')}}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        file_name: removefile,
                    },
                    success: function(response) {
                        if(response){
                            $(file.previewElement).remove();
                        }else{
                            alert('Somthing Went Wrong');
                        }
                    }
                });
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
            // element.find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            // element.find('.dz-filename span').html(response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').html(response_value[numberCreate]);
            oldArr = [];
            // console.log('numberCreate' + numberCreate);
            // console.log('response_value' + (response_value.length - 1));
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
                removefile = $(file.previewElement).find('.dz-filename span').data('dz-name');
                var oldArr = [];
                var hidden_value = JSON.parse($('.asset_property_gallery').val() || '[]');
                hidden_value.forEach(function(item) {
                    if(removefile !== item)
                        oldArr.push(item);
                });
                $('.asset_property_gallery').val(JSON.stringify(oldArr));
                oldArr = [];
                $.ajax({
                    url: "{{route('dropremoveImages')}}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        file_name: removefile,
                    },
                    success: function(response) {
                        if(response){
                            $(file.previewElement).remove();
                        }else{
                            alert('Somthing Went Wrong');
                        }
                    }
                });
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
            // element.find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            // element.find('.dz-filename span').html(response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value[numberCreate]);
            $(file.previewTemplate).find('.dz-filename span').html(response_value[numberCreate]);
            oldArr = [];
            // console.log('numberCreate' + numberCreate);
            // console.log('response_value' + (response_value.length - 1));
            if(numberCreate === (response_value.length - 1)) {
                numberCreate = 0;
            } else {
                numberCreate = numberCreate + 1;
            }
        }
    });

$(document).ready(function () {
    // var id = "{{ Auth::user()->id }}";
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
            console.log(data.user);
            // $('#editid').val(id);
            $('#businessname').val(data.businessname);
            $('#email').val(data.email);
            $('#phone').val(data.phone);
            $('#address').val(data.address);
            $('#landmark').val(data.landmark);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#zipcode').val(data.zipcode);
            $('#bioInformation').val(data.bioInformation);
            // $('#editpassword').val(data.password);
            // $('#editsel_emp').empty().append($('<option/>').val(data.user.roles[0].id).text(data.user.roles[0].name)).val(data.user.roles[0].id);
        }
    });

    // $('#userform').validate({
    //             ignore: [],
    //             rules: {
    //                 "name": "required",
    //                 "email": "required",
    //                 "password": "required",
    //                 "role": "required",
    //             },
    //             messages: {
    //                 "name": "The Name field is required.",
    //                 "email": "The Email field is required.",
    //                 "password": "The Password field is required.",
    //                 "role": "The Role field is required.",
    //             },
    //             errorPlacement: (error, element) => {
    //                 error.appendTo(element.closest('div'));
    //             }
    //         });


    $("#ContactDetailsform").submit(function(e) {
                e.preventDefault();
        // if ($(this).valid()) {
            var formdata = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('createbusiness')}}",
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
                    alert('update');
                },
            });
        // }
    });



});

</script>


@endsection
