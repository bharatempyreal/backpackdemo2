@extends('front.layouts.app')


@section('title')
Adex - My Adex
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
        <div class="row justify-content-center current-ad-section">
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
                        <a href="#" class="btn btn-sm btn-theme-black mt-2">View Details</a>
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
                        <a href="#" class="btn btn-sm btn-theme-black mt-2">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
