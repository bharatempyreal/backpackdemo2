@extends('front.layouts.app')

@section('title')
Adex - List-Property
@endsection

@section('style')
<style>
    .checkbox label::before {
        margin-left: -16px;
    }
</style>
@endsection

@section('content')

<!-- Sub banner start -->
<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url(assets/img/banner/banner-1.jpg) top left repeat;">
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
    <a class="btn btn-primary" href="{{ route('list-property') }}">Back</a>
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
                    console.log(response);
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
                            if(Object.keys(response.data).length>0){
                                $.each(response.data, function( index, value ) {
                                    html +='<h3 class="heading-2">'+index+'</h3>';
                                    html += startDiv('row','');
                                    if(value.length>0){
                                        $.each(value,function(index1,value1){
                                            console.log(value1)
                                            if(value1.status){
                                                var jsLang = 'jquery';
                                                switch (value1.category_type) {
                                                    case '1':
                                                        // 1 = checkbox
                                                        var options=value1.attributesvalue;
                                                        html += chekboxes(value1.name,value1.name,options);
                                                        html += inputhidden(value1.name,value1.category_type);
                                                    break;
                                                    case '2':
                                                        // 2 = dropdown
                                                        var options=value1.attributesvalue;
                                                        html += select(value1.name,value1.name,options);
                                                        html += inputhidden(value1.name,value1.category_type);
                                                    break;
                                                    case '3':
                                                        // 3 = multipleimages
                                                        html += dropzone(value1.name);
                                                    break;
                                                    case '4':
                                                        // 4 = textbox
                                                        html += inputtext(value1.name,value1.name);
                                                        html += inputhidden(value1.name,value1.category_type);
                                                    break;
                                                    case '5':
                                                        // 5 = textarea
                                                        html += textarea(value1.name,value1.name);
                                                        html += inputhidden(value1.name,value1.category_type);
                                                    break;
                                                    case '6':
                                                        // 6 = Image
                                                        html += dropzone(value1.name);
                                                    break;
                                                    case '7':
                                                        // 7 = date
                                                        html += inputdate(value1.name,value1.name);
                                                        html += inputhidden(value1.name,value1.category_type);
                                                    break;
                                                    default:
                                                        alert('Somthing Went Wrong');
                                                }
                                            }
                                        });
                                    }
                                    html += closeDiv();
                                });
                            }
                        $('.form_section').append(html);
                    }else{
                        alert(response.message)
                    }

                    $('.selectpicker').selectpicker();
                }
            });
        }else{
            alert('Somthing Went Wrong');
        }
    });
</script>
@endsection


