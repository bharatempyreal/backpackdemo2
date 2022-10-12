@extends('front.layouts.app')

@section('title')
Adex - List-Property
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

<!-- Submit Property start -->
<div class="submit-property content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="selectpicker search-fields" id="category_id" name="1">
                            @foreach ($category_data as $category)
                            <option value="{{ $category->id }}">{{ (isset($category->name) && $category->name != '') ?  $category->name :'' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <form>
                    <div class="form_section">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change','#category_id',function(){
        var category_id=$(this).val();
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
                }
            });
        }else{
            alert('Somthing Went Wrong');
        }
    });
</script>
@endsection


