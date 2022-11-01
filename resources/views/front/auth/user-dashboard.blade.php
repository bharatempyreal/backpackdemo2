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
        <div class="col-lg-6 col-md-6">
          <a href="#">
            <div class="dashboard-details">
              <img src="{{asset("assets/img/personal12.png")}}" alt="">
              <p>Personal Dashboard</p>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-6">
          <a href="#">
            <div class="dashboard-details dashboard-business-img">
              <img src="{{asset("assets/img/business.png")}}" alt="">
              <p>Business Dashboard</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/js/dropzone.js")}}></script>


@endsection
