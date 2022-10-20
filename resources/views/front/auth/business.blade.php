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

<!-- Submit Property start -->
  <div class="submit-property content-area">
    <div class="container">
      <section class="profile-section">
        <div class="row">
          <div class="col-md-12">
            <div class="capital-logo">
              <img src={{asset("assets/img/capital.png")}}>
            </div>
          </div>
        </div>
      </section>
      <section class="car-details">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="car-padding">
              <div class="car-data">
                <p class="pb-3"><b>Captial Ale House:</b>  $125</p>
                <p> <b>ADEX BUSINESS RATING:</b> </p>
                <p> <b>Business Type:</b> Restaurant / Tavern</p>
                <p> <b>Ad Space needed:</b> (1) posting signs/decals on local houses (lawn, front door, and windows) and (2) Wear advertising apparel (hats, t-shirts, etc.)</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="contract-duration">
              <p>Contract Duration</p>
              <h2>60</h2>
            </div>
          </div>
        </div>
      </section>

      <section class="contract-section">
        <div class="contract-details">
          <h2 class="pb-4"><b> Contract Details </b></h2>
          <p><b> City and State: </b> September 18, 2022 </p>
          <p><b> Start Date: </b> Fredericksburg, VA - 22401 </p>
          <p><b> End Date: </b> November 18, 2022 </p>
          <p><b> Price: </b> $123.00 </p>
          <p><b> Advertisement Requirements: </b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. 
          </p>
        </div>
        <button type="submit" class="btn btn-theme-black-second accept-contract">Accept Contract</button>
      </section>
    </div>
  </div>

@endsection

@section('script')

<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/dropzone.js")}}></script>


@endsection
