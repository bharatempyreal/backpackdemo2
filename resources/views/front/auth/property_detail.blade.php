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
@php
$ids=[3,4,5,6,7,2,1];
$group=[];
foreach ($group_by_data as $k=>$data){
    $group[$k]=[];
    $new=$data;
    foreach ($data as $key => $value) {
        $group[$k]=$value['attribute'];
    }
    usort($new, function($a){
        return ($a['attribute']['category_type'] == 3 || $a['attribute']['category_type'] == 6) ? -1 : 1;
    });
    $group[$k]=$new;
}
@endphp
<!-- Submit Property start -->
  <div class="submit-property content-area">
    <div class="container">
        @foreach ($group as $key=>$val)
            @php
                $attrs = array_column($val, 'attribute');
                $test1 = array_search('3', array_column($attrs, 'category_type'));
                $test2 = array_search('6', array_column($attrs, 'category_type'));
            @endphp
            <div class="property-content-details {{ ($test1 !==false || $test2 !==false)?'image':'text' }}">
                <h3 class="{{ ($test1 !== false) ? 'property-gallery-title' : (($test2 !== false)?'pb-3':'')}}">{{ $key }}</h3>
                <div class="{{ ($test1 !==false || $test2 !==false)?'':'row' }}">
                @foreach ($val as $v)
                    @if($v['attribute']['category_type'] == 3 || $v['attribute']['category_type'] == 6)
                    <section class="profile-section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="capital-logo {{ ($v['attribute']['category_type'] == 3) ? 'property_logo' : '' }}">
                                    @if($v['attribute']['category_type'] == 3)
                                        @php
                                            $img=json_decode($v['value']);
                                        @endphp
                                            @if(isset($img) && !empty($img) && count($img)>0)
                                                @foreach ($img as $i)
                                                <div class="col-md-4">
                                                    <img src="{{ asset_storage().$i }}">
                                                </div>
                                                @endforeach
                                            @endif
                                    @else
                                        <img src="{{ asset_storage().($v['value'])}}" >
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                    @else
                    <div class="col-lg-4 col-md-6 apply-padding">
                        <p><b> {{ $v['name'] }} : </b> </p>
                        <p>{{ $v['value'] }}</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endforeach

    @if(1==2)
        {{-- Img Section --}}
      <section class="profile-section">
        <div class="row">
          <div class="col-md-12">
            <div class="capital-logo">
              <img src={{asset("assets/img/sam's-pizza-sub.png")}}>
            </div>
          </div>
        </div>
      </section>
      <section class="car-details sams-pizza-details">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="sams-pizza">
              <h3>SAM’s Pizza & Subs</h3>
              <p>Address: 2142 Jefferson Davis Hwy Suite 101, Stafford, VA 22554</p>
              <span>www.samspizza.com <br> (540) 720-9797</span>
              <h6>Ad cost: $120.00</h6>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="days-left-text">
              <h3>Sept 18, 2022</h3>
            </div>
            <div class="contract-duration">
              <p>Days left on contract</p>
              <h2>23</h2>
            </div>
          </div>
        </div>
      </section>

      <section class="contract-section">
        <div class="contract-details">
          <h2 class="pb-4"><b> Contract Details </b></h2>
          <p><b> City and State: </b> Stafford, VA - 22554 </p>
          <p><b> Start Date: </b> September 18, 2022 </p>
          <p><b> End Date: </b> October 18, 2022 </p>
          <p><b> Price: </b> $123.00 </p>
          <p><b> Advertisement Requirements: </b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
          </p>
        </div>
      </section>
      @endif

      @auth
      <section class="sams-pizza-sub-online">
        <h3>Sam’s Pizza & Subs</h3>
        <p>Online</p>
        <div class="chat-conversation">
          <div class="user-chat">
            <span class="text">
              Thank you for choosing Sam’s Pizza & Subs of Stafford.  We would love to partner with you and get our ad on your vehicle.
            </span>
          </div>
          <div class="user-chat owner-chat">
            <span class="text">
              I am super excited to work with you guys.  Please let me know when I can get my car wrapped and start working.
            </span>
          </div>
          <div class="user-chat">
            <span class="text">
              Absolutely. The ad time starts on September 11th, so we need to get you scheduled to the car wrapping company as soon as you are available.
            </span>
          </div>
          <div class="user-chat owner-chat">
            <span class="text">
              I can get there just about any day of the week. I just need to know when and where to drop my car off.
            </span>
          </div>
          <div class="user-chat">
            <span class="text">
              Sounds great!  We’ll be in contact with the place and time.  Thank you.
            </span>
          </div>
        </div>
      </section>
      @endauth

    </div>
  </div>

@endsection

@section('script')

<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/dropzone.js")}}></script>


@endsection
