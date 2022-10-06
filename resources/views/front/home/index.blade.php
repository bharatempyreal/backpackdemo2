@extends('front.layouts.app')

@section('title')
Adex - Home page
@endsection

@section('content')
<!-- Banner start -->
<div class="banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height item-bg active">
                <img class="d-block w-100 h-100" src={{ asset("assets/img/pages/home/adex-hom-banner.png") }} alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="row row-2">
                            <div class="col-lg-6 col-md-12 banner-content-background">
                                <div class="text-left tl">
                                    <h1>Connect with your community and grow your business</h1>
                                    <p class="test">The platform with the largest network of people looking to help your business grow to a whole new level</p>
                                    <a href="#" class="btn btn-lg btn-theme-black">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!-- Have AD Space start -->
<div class="have-ad-space">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-5 my-auto text-center">
            <!-- Heading -->
            <h2 class="mt-4 mb-2">
              Have AD space?
            </h2>
            <!-- Text -->
            <p class="text-black mb-4">
              Transform your world into a billboard
            </p>
            <a href="#" class="btn btn-lg btn-theme-black-second mb-4">Sign Up</a>
          </div>
          <div class="col-12 col-md-7">
            <div class="row">
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-1.jpg") }} alt="properties">
              </div>
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-2.jpg") }} alt="properties">
              </div>
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-3.jpg") }} alt="properties">
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
</div>
<!-- Have AD Space end -->

<!-- ABOUT ADEX START  -->
<div class="about-adex-home-section content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="about-text">
                    <h3>Earn extra <span> money</span> with <span> ADEX</span></h3>
                    <p>Whether you’re looking for short term gig income or seeking to earn long term passive income, you can do it with ADEX. Our self-service marketplace listing platform empowers people and local businesses alike, allowing you to create conventional and unique advertising opportunities. </p>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 offset-xl-1 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                <div class="about-slider-box">
                    <img src={{ asset("assets/img/pages/home/about-adex-section.png") }} alt="Second" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT ADEX END -->

<!-- any person place or things start -->
<div class="any-person-place-or-things content-area-5">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12 my-auto text-center">
            <!-- Heading -->
            <div class="container">
                <h2 class="mb-3">
                  Any <span>person</span>, place or thing.
                </h2>
                <!-- Text -->
                <p class="text-black mb-5">By now you know – any person, place, or thing can earn with ADEX. Your creativity is your only limitation.  Good news is, now you’re here ready to create a listing – fantastic! Here are some things to keep in mind so that your listing pops and stands out above the crowd:</p>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="row">
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-4.png") }} alt="properties">
              </div>
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-5.png") }} alt="properties">
              </div>
              <div class="col-12 col-md-4 p-0">
                <img class="d-block w-100" src={{ asset("assets/img/pages/home/properties-6.png") }} alt="properties">
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 my-auto text-center">
            <!-- Heading -->
            <div class="container">
                <!-- Text -->
                <p class="text-black mb-4 mt-5">Are you a person that would like to offer yourself as Ad space or; do you have a place or thing you’d like to offer up as Ad space, create a Listing in a few easy steps:</p>
                <a href="#" class="btn btn-lg btn-theme-yellow-second">Sign Up</a>
              </div>
          </div>
        </div> <!-- / .row -->
      </div>
</div>
<!-- any person place or things end -->

<!-- Testimonial custom home page start -->
<div class="testimonial-custom-home">
    <div class="container">
        <h2 class="mb-5 text-center"> What our <span>Customers</span> say. </h2>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="profile-user">
                                <div class="avatar">
                                    <img src={{ asset("assets/img/avatar/avatar-2.jpg") }} alt="testimonial-avatar" class="img-fluid">
                                </div>
                            </div>
                            <h5>
                                Eliane Perei
                            </h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been standard</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="profile-user">
                                <div class="avatar">
                                    <img src={{ asset("assets/img/avatar/avatar-1.jpg") }} alt="testimonial-avatar" class="img-fluid">
                                </div>
                            </div>
                            <h5>
                                John Pitarshon
                            </h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been standard</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="profile-user">
                                <div class="avatar">
                                    <img src={{ asset("assets/img/avatar/avatar-1.jpg") }} alt="testimonial-avatar" class="img-fluid">
                                </div>
                            </div>
                            <h5>
                                Karen Paran
                            </h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been standard</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="profile-user">
                                <div class="avatar">
                                    <img src={{ asset("assets/img/avatar/avatar-3.jpg") }} alt="testimonial-avatar" class="img-fluid">
                                </div>
                            </div>
                            <h5>
                                Karen Paran
                            </h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been standard</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')


@endsection
