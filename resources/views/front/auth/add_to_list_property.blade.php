@extends('front.layouts.app')

@section('title')
Adex - List-Property
@endsection

@section('style')
{{-- #### --}}
<link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-new.css') }}">
{{-- #### --}}
<style>
    .checkbox label::before {
        margin-left: -16px;
    }
    .dropzone .dz-default.dz-message span {
    display: block;
}
</style>
@endsection

@section('content')

<!-- Sub banner start -->
<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{ asset('assets/img/banner/banner-1.jpg') }}) top left repeat;">
    <div class="container">
        <div class="page-name">
            <h1>List Your Property</h1>
            <ul>
                <li><a href="index.php">Adex</a></li>
                <li><span>/</span>List Your Business</li>
            </ul>
        </div>
    </div>
</div>
<div class="container pt-3">
    {{-- <a class="btn btn-primary cancle_btn" data-img_remove_url="{{ route('ajaxremoveImagesFront') }}" data-href="{{ route('list-property') }}">Back</a> --}}
    <span class="cancle_btn" data-img_remove_url="{{ route('ajaxremoveImagesFront') }}" data-href=""></span>
</div>
<!-- Submit Property start -->
<div class="submit-property content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form action="{{ route('saveListProperty') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="category_id" name="category_id" value="{{ myisset($category_id) }}">
                        @csrf
                        <div class="form_section">

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
{{-- #### --}}
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
{{-- #### --}}
<script src="{{ asset('js/htmlreturn.js') }}"></script>
<script>
    $(document).ready(function(){
        var category_id=$('#category_id').val();
        if(category_id != ''){
            $.ajax({
                url:"{{ route('getAttributeAsPerCategory') }}",
                type:'post',
                dataType:'json',
                data : {
                    category_id:category_id
                },
                success:function(response){
                    if(response.status){
                        $('.form_section').html('');
                        // First Paramete = Lable Second Parameter = Name
                        var html = '';
                            // html += startDiv('row','');
                            // html += inputtext('Name','name');
                            // html += inputemail('Email','email');
                            // html += select('Color','color');
                            // html += inputdate('To Date','to_date');
                            // html += textarea('Notes','notes');
                            // html += chekboxes();
                            // html += dropzone();
                            // html += closeDiv();
                            // 1 = checkbox, 2 = dropdown, 3 = multipleimages, 4 = textbox, 5 = textarea, 6 = Image, 7 = date
                            // inputhidden(name='',value='', classname='')
                            if(Object.keys(response.data).length>0){
                                $.each(response.data, function( index, value ) {
                                    html += startDiv('property-input','');
                                    html +='<h3 class="heading-2">'+index+'</h3>';
                                    html += startDiv('row','');
                                    if(value.length>0){
                                        $.each(value,function(index1,value1){
                                            if(value1.status){
                                                var jsLang = 'jquery';
                                                var attr = '';
                                                switch (value1.category_type) {
                                                    case '1':
                                                        // 1 = checkbox
                                                        var options=value1.attributesvalue;
                                                        if(value1.compulsory == 1){
                                                            attr = 'required';
                                                        }
                                                        html += chekboxes(value1.name, value1.name, options, attr);
                                                        html += inputhidden(value1.name,value1.id,'',attr);
                                                    break;
                                                    case '2':
                                                        // 2 = dropdown
                                                        if(value1.compulsory == 1){
                                                            attr = 'required';
                                                        }
                                                        var options=value1.attributesvalue;
                                                        html += select(value1.name, value1.name, options, attr);
                                                        html += inputhidden(value1.name,value1.id);
                                                    break;
                                                    case '3':
                                                        // 3 = multipleimages
                                                        if(value1.compulsory == 1){
                                                            attr1 = 'required';
                                                        }
                                                        attr = 'data-category_type='+value1.category_type;
                                                        html += adddropzone(value1.name,'','',attr);
                                                        html += inputhiddenfordropzone((value1.name).replace(/ /g,"_"),'','dropzone_hidden',attr1);
                                                        html += inputhidden((value1.name).replace(/ /g,"_"),value1.id);

                                                    break;
                                                    case '4':
                                                        // 4 = textbox
                                                        if(value1.compulsory == 1){
                                                            attr = 'required';
                                                        }
                                                        html += inputtext(value1.name,value1.name,'',attr);
                                                        html += inputhidden(value1.name,value1.id);
                                                    break;
                                                    case '5':
                                                        // 5 = textarea
                                                        if(value1.compulsory == 1){
                                                            attr = 'required';
                                                        }
                                                        html += textarea(value1.name,value1.name,'',attr);
                                                        html += inputhidden(value1.name,value1.id);
                                                    break;
                                                    case '6':
                                                        // 6 = Image
                                                        if(value1.compulsory == 1){
                                                            attr1 = 'required';
                                                        }
                                                        attr = 'data-category_type='+value1.category_type;
                                                        html += adddropzone(value1.name,'','',attr);
                                                        html += inputhiddenfordropzone((value1.name).replace(/ /g,"_"),'','dropzone_hidden',attr1);
                                                        html += inputhidden((value1.name).replace(/ /g,"_"),value1.id);
                                                    break;
                                                    case '7':
                                                        // 7 = date
                                                        if(value1.compulsory == 1){
                                                            attr = 'required';
                                                        }
                                                        html += inputdate(value1.name,value1.name,'',attr);
                                                        html += inputhidden(value1.name,value1.id);
                                                    break;
                                                    default:
                                                        alert('Somthing Went Wrong');
                                                }
                                            }
                                        });
                                    }
                                    html += closeDiv();
                                    html += closeDiv();
                                });
                                html += inputhiddenfordropzone('cancelImages','','cancelImages');
                                html += inputhiddenfordropzone('removeImages','','removeImages');
                            }
                        $('.form_section').append(html);
                    }else{
                        alert(response.message)
                    }

                        $(".dropzone").each(function(i_d,v_d) {
                                Dropzone.autoDiscover = false;
                                var cat_type=$(this).data('category_type');
                                var url = "{{ route('ajaxUploadImages') }}";
                                new Dropzone(v_d, {
                                url: url,
                                uploadMultiple: true,
                                parallelUploads: 1,
                                addRemoveLinks: true,
                                maxFiles: (cat_type == 3) ? 1 : 50 ,
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
                                    var dropzone_hidden = $(file.previewTemplate).closest('.dropzone_box').parent().find('.dropzone_hidden');
                                    var oldArr = [];
                                    var hidden_value = JSON.parse(dropzone_hidden.val() || '[]');
                                    hidden_value.forEach(function(item) {
                                        if (item != removefile){
                                            oldArr.push(item);
                                        }
                                    });
                                    dropzone_hidden.val(JSON.stringify(oldArr));

                                    // Add IN Remove Hidden
                                    var oldremoved = [];
                                    var removehidden_value = JSON.parse($('.removeImages').val() || '[]');
                                    removehidden_value.forEach(function(item) {
                                        oldremoved.push(item);
                                    });
                                    oldremoved.push(removefile[0]);
                                    $('.removeImages').val(JSON.stringify(oldremoved));
                                    $(file.previewElement).remove();
                                },
                                success: function(file, status, response) {
                                    var dropzone_hidden = $(file.previewTemplate).closest('.dropzone_box').parent().find('.dropzone_hidden');
                                    var oldArr = [];
                                    var hidden_value = JSON.parse(dropzone_hidden.val() || '[]');
                                    hidden_value.forEach(function(item) {
                                        oldArr.push(item);
                                    });
                                    var response_value = JSON.parse(response.currentTarget.response || '[]');
                                    oldArr.push(response_value[0]);
                                    dropzone_hidden.val(JSON.stringify(oldArr));


                                    $(file.previewTemplate).find('.dz-filename span').data('dz-name', response_value);
                                    $(file.previewTemplate).find('.dz-filename span').html(response_value);

                                    // Add IN cancled Hidden
                                    var cancled = [];
                                    var canclehidden_value = JSON.parse($('.cancelImages').val() || '[]');
                                    canclehidden_value.forEach(function(item) {
                                        cancled.push(item);
                                    });
                                    cancled.push(response_value[0]);
                                    $('.cancelImages').val(JSON.stringify(cancled));
                                }
                            });
                        });

                    $('.selectpicker').selectpicker();
                }
            });
        }else{
            alert('Somthing Went Wrong');
        }

        $('form').validate({
            ignore: [],
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-control').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-control').removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function (error, element) {
                if(element.hasClass('selectpicker')) {
                    error.insertAfter(element.parent());
                }else if(element.hasClass('dropify')) {
                    error.insertAfter($('#category-image-upload .dropify-wrapper'));
                }
                else if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
                else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                    error.insertAfter(element.parent().parent());
                }
                else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.appendTo(element.parent().parent());
                }
                else {
                    error.insertAfter(element);
                }
            }
        });
    });

$(document).on('click', '.cancle_btn', function(e) {
    var event = e;
    // e.preventDefault();
    var cancle = JSON.parse($('.cancelImages').val() || '[]');
    var url = $(this).data('img_remove_url');
    var back = $(this).data('href');
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            files: cancle,
        },
        success: function(response) {
            window.location.href=back;
        }
    });
});

$(document).on('submit', 'form', function() {
    $('.cancelImages').val('');
})

$(window).bind('beforeunload', function() {
    var cancle = JSON.parse($('.cancelImages').val() || '[]');
    var url = $('.cancle_btn').data('img_remove_url');
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            files: cancle,
        },
        success: function(response) {
            return true;
        }
    });
});
</script>
@endsection


