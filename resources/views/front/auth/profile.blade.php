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
            <div class="user-profile-icon">
              <img src={{asset("assets/img/asset/sam-pizza.png")}} class="adex-list-image">
              <h3>Hank Eng</h3>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="car-details">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="car-padding">
              <div class="car-data">
                <p><b> Ad Space Type: Car</b></p>
                <p><b> ADEX Individual RATING:</b></p>
                <p><b> General Information:</b> Honda Accord - 2019</p>
              </div>
              <div class="whole-vehicle">
                <a href="#">Whole vehicle</a>
                <a href="#">Door panel</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="car-image">
              <img src={{asset("assets/img/asset/sam-pizza.png")}}>
            </div>
          </div>
        </div>
      </section>

      <section class="contract-section">
        <div class="contract-details">
          <h2 class="pb-4"><b> Contract Details </b></h2>
          <p><b> City and State: </b> Fredericksburg, VA - 22401 </p>
          <p><b> Advertisement Requirements: </b> I have a 2019 Honda Accord in really great condition and I am willing to use it as ad space for a good amount of time.  I live and work in the Fredericksburg, VA area.  I do a lot of driving around for my job and use my vehicle all the time.  I take pride in my cars appearance and would be willing to send more photos if needed of my car.  
          </p>
        </div>
      </section>
      <div class="accept-btn">
        <button type="submit" class="btn btn-theme-black-second btn-accept">Accept Contract</button>
      </div>
    </div>
  </div>

@endsection

@section('script')

<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/dropzone.js")}}></script>


@endsection
