@extends('front.layouts.app')

@section('title')
Adex - Market Place
@endsection

@section('style')
<!-- Custom stylesheet -->
<link rel="stylesheet" type="text/css" href={{asset("assets/css/style.css")}}>
<link rel="stylesheet" type="text/css" id="style_sheet" href={{asset("assets/css/skins/default.css")}}>
{{-- <link rel="stylesheet" href={{asset("assets/css/leaflet.css")}} type="text/css"> --}}
<link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap-submenu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap-select.min.css")}}>

<link rel="stylesheet" href={{asset("assets/css/map.css")}} type="text/css">
{{-- <link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap-submenu.css")}}> --}}

<!-- Favicon icon -->
<link rel="shortcut icon" href={{asset("assets/img/favicon.png")}} type="image/x-icon" >

<!-- Google fonts -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link rel="stylesheet" type="text/css" href={{asset("assets/css/ie10-viewport-bug-workaround.css")}}>

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src={{asset("assets/js/ie-emulation-modes-warning.js")}}></script>

@endsection

@section('content')

<!-- Map content start -->
<div class="map-content content-area container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-7 map-content-sidebar properties-left">
            <div class="title-area hidden-sm hidden-xs mt-1 mb-0">
                <div class="pull-left form-group">
                    <a href={{route('list-property')}} class="btn btn-sm btn-theme-yellow"><i class="fa fa-plus-circle"></i> Create Listing</a>
                </div>
                <div class="pull-right btns-area mt-2">
                    <a href="properties-list-leftsidebar.html" class="active-view-btn"><i class="fa fa-th-list"></i></a>
                    <a href="properties-grid-leftside.html" class="change-view-btn"><i class="fa fa-th-large"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="title-area">
                <h2 class="text-center search">Market Display</h2>
                <div class="text-center mt-3 mb-4">
                    <a href="#" class="btn btn-sm btn-theme-yellow">Business</a>
                    <a href="#" class="btn btn-sm btn-theme-black">Individual</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="properties-map-search">
                <div class="properties-map-search-content">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <form class="form-inline form-search form-search-list-page" method="GET">
                                <div class="form-group">
                                    <label class="sr-only" for="textsearch2">Search</label>
                                    <input type="text" class="form-control" id="textsearch2" placeholder="Looking for something">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group mb-0">
                                <a class="btn btn-lg btn-theme-black text-white" data-toggle="collapse"  data-target="#options-content">
                                <i class="fa fa-arrow-down"></i> More Filter
                            </a>
                            </div>
                        </div>
                    </div>
                    <div id="options-content" class="collapse mt-3">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Area From</option>
                                    <option>3000</option>
                                    <option>2600</option>
                                    <option>2200</option>
                                    <option>1800</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Location</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>American Samoa</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Property Type</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" data-name="area" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Balcony</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker search-fields">
                                    <option>Garage</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="margin-t-10">Features</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">
                                    Free Parking
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox2" type="checkbox">
                                <label for="checkbox2">
                                    Air Condition
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox3" type="checkbox">
                                <label for="checkbox3">
                                    Places to seat
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">
                                    Swimming Pool
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox5" type="checkbox">
                                <label for="checkbox5">
                                    Laundry Room
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox6" type="checkbox">
                                <label for="checkbox6">
                                    Window Covering
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox7" type="checkbox">
                                <label for="checkbox7">
                                    Central Heating
                                </label>
                            </div>
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox8" type="checkbox">
                                <label for="checkbox8">
                                    Alarm
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="fetching-properties fp hidden-sm hidden-xs"></div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <div class="row">
                <div id="map" data-map="list"></div>
            </div>
        </div>
    </div>
</div>

<!-- Full Page Search -->
@endsection

@section('script')

<script src={{ asset("assets/js/leaflet.js")}}></script>
<script src={{ asset("assets/js/leaflet-providers.js")}}></script>
<script src={{ asset("assets/js/leaflet.markercluster.js")}}></script>
<script src={{ asset("assets/js/dropzone.js")}}></script>
<script src={{ asset("assets/js/jquery.magnific-popup.min.js")}}></script>
<script src={{ asset("assets/js/jquery.countdown.js")}}></script>
<script src={{ asset("assets/js/maps.js")}}></script>
@endsection
