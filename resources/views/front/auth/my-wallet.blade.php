@extends('front.layouts.app')


@section('title')
Adex - My Wallet
@endsection


@section('content')
@include('front.auth.deshboard')

<!-- Submit Property start -->
<div class="content-area">
    <div class="container">
        <div class="row justify-content-center current-ad-section">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 p-5 current-ad-background" >
                <div class="my-5 pull-right">
                    <h3>Current Adevertisment</h3>
                    <p>Next payment on 03/03/2022</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center current-balance-section">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-2 pl-0">
                <div class="balance-section">
                    <h5>Balance</h5>
                    <p>$147.98</p>
                    <p>Add the bank account where you want to receive payouts</p>
                    <a href="#" class="btn btn-sm btn-theme-black">Add Bank Account</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-2 pr-0">
                <div class="card-section" style="">
                    <h6>Virtual Card</h6>
                    <div class="last-line-show">
                        <p>HANK ENG</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
