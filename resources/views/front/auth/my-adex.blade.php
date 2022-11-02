@extends('front.layouts.app')


@section('title')
Adex - My Adex
@endsection

@section('style')
<style>
.main_list{
    display: flex;
    align-items: center;
    justify-content: center;
}
.property-listing-btn {
    display: flex;
    align-items: center;
    justify-content: end;
    width: 95%;
    margin: 20px 0;
}
.property-listing-btn a {
    margin: 0 10px;
}
</style>
@endsection

@section('content')
@include('front.auth.deshboard')

<!-- Submit Property start -->
<div class="content-area-17">
    <div class="container">
        <div class="row justify-content-center current-ad-section">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 p-5 current-ad-background" >
                <div class="my-5 pull-right">
                    <h3>Current Adevertisment</h3>
                    <p>Next payment on 03/03/2022</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Asset list  -->
<div class="my-adex-asset-list">
    <div class="container">
        <div class="main_list">
            <div class="fetching-properties col-md-9">
            </div>
        </div>
        {{-- <div class="row justify-content-center current-ad-section adex-current">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 current-ad-row">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 adex-asset-details-image">
                        <img src={{asset("assets/img/asset/sam-pizza.png")}} class="adex-list-image">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 adex-asset-details">
                        <h5>SAM’s Pizza & Subs</h5>
                        <p class="adex-asset-details-address mt-3">Address: 2142 Jefferson Davis Hwy Suite 101, Stafford, VA 22554</p>
                        <p class="adex-asset-details-website">www.samspizza.com</p>
                        <p class="adex-asset-details-call">(540) 720-9797</p>
                        <p class="adex-asset-details-ratting mt-3">Give Business Rating:</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 adex-contract-time">
                        <h4>Sept 18, 2022</h4>
                        <div class="adex-contract-time-day">
                            <p>Days left on contract</p>
                            <h2>23</h2>
                        </div>
                        <a href="{{ route('contract') }}" class="btn btn-sm btn-theme-black mt-2">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 current-ad-row">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 adex-asset-details-image">
                        <img src={{asset("assets/img/asset/sam-pizza.png")}} class="adex-list-image">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 adex-asset-details">
                        <h5>SAM’s Pizza & Subs</h5>
                        <p class="adex-asset-details-address mt-3">Address: 2142 Jefferson Davis Hwy Suite 101, Stafford, VA 22554</p>
                        <p class="adex-asset-details-website">www.samspizza.com</p>
                        <p class="adex-asset-details-call">(540) 720-9797</p>
                        <p class="adex-asset-details-ratting mt-3">Give Business Rating:</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 adex-contract-time">
                        <h4>Sept 18, 2022</h4>
                        <div class="adex-contract-time-day">
                            <p>Days left on contract</p>
                            <h2>23</h2>
                        </div>
                        <a href="{{ route('contract') }}" class="btn btn-sm btn-theme-black mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection
@section('script')
<script>
function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
$(document).ready(function(){
    $.ajax({
        url:"{{ route('ListingProperty') }}",
        type:'post',
        dataType:'json',
        success:function(response){
            var html='';
            var listing = Object.keys(response.listing).map(function (key) { return response.listing[key]; });
            if(listing.length>0){
                $.each(listing, function (index, property) {
                    if(index != ((listing.length)-1)){
                        html += '<div class="show_property map-property-box property-hover property-listing p-0" data-advertisement_id="'+property.id+'">';
                        html += '<div class="row">';
                        html +='<div class="col-lg-4 col-md-4 text-center">';
                            var base_url = "{{ asset('/') }}";
                            var image = isJsonString(listing[(listing.length)-1][property.id]) ? base_url+'storage/image/'+(JSON.parse(listing[(listing.length)-1][property.id])[0]) : base_url+listing[(listing.length)-1][property.id];
                            var image = isJsonString(listing[(listing.length)-1][property.id]) ? base_url+'storage/image/'+(JSON.parse(listing[(listing.length)-1][property.id])[0]) : (((listing[(listing.length)-1][property.id]).includes('storage/image/'))?base_url+listing[(listing.length)-1][property.id]:base_url+'storage/image/'+listing[(listing.length)-1][property.id]);
                        html+='<div class="image_box">';
                        html += '<img src="'+image+'">';
                        html += '</div>';
                        html += '</div>';
                        html +='<div class="col-lg-8 col-md-8 row">';
                        if((property.advertisedata).length>0){
                            var tt = 0;
                            $.each(property.advertisedata,function(i,v){
                                if(v.attribute != null && v.attribute.is_default == 1 && v.attribute.category_type != 3 && v.attribute.category_type != 6){
                                    tt++;
                                    var style = '';
                                    if (tt % 2 === 0) {
                                        /* we are even */
                                        style='border:none;';
                                    }else {
                                        /* we are odd */
                                    }
                                   // As a side note, this === el.
                                    html+='<div class="listing-details col-md-6 pb-2" style="'+style+'">';
                                    html +='<div class="pr-2 label-details">'+v.name+'-</div>';
                                    html +='<div class="market-details">'+v.value+'</div>';
                                    html += '</div>';
                                }
                            })
                        }
                        html +='</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                });
                }
                $('.fetching-properties').append(html);
            }
    });
});
</script>
@endsection
