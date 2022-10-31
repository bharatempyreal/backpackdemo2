@extends('front.layouts.app')

@section('title')
Adex - Home page
@endsection

@section('content')
<section class="how-adex-work">
  <div class="container">
    <div class="how-work-title">
      <h2>How <span> ADEX </span>Works</h2>
      <p>Advertising Reimagined</p>
    </div>
  </div>
  <div class="work-bg-img">
    <img src="{{ asset("assets/img/work.png") }}" alt="">
  </div>
</section>

<!-- ABOUT ADEX START  -->
<div class="about-adex-home-section content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="about-text pl-0">
                  <h3>Get paid to be <span> you</span>.</h3>
                  <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is, making it look like readable English. </p>
                  <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
                <a href="#" class="btn btn-lg btn-theme-black-second mb-4">Sign Up</a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12 pr-0">
                <div class="paid-you-user paid-user-right">
                    <img src={{ asset("assets/img/get-paid4.png") }} alt="Second" class="img-fluid pb-3">
                    <img src={{ asset("assets/img/get-paid1.png") }} alt="Second" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="paid-you-user">
                    <img src={{ asset("assets/img/get-paid3.png") }} alt="Second" class="img-fluid pb-3">
                    <img src={{ asset("assets/img/get-paid2.png") }} alt="Second" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT ADEX END -->

<!-- any person place or things start -->
<div class="any-person-place-or-things">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12 my-auto text-center">
            <div class="local-celeb-title">
              <p>Whether you’re a local celeb or just your average Joe/Jane, it doesn’t matter, anyone can earn with ADEX.</p>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="local-celeb-imgs">
              <div class="row">
                <div class="col-12 col-md-3 p-0">
                  <img class="d-block w-100" src={{ asset("assets/img/local-celeb-1.png") }} alt="properties">
                </div>
                <div class="col-12 col-md-3 p-0">
                  <img class="d-block w-100" src={{ asset("assets/img/local-celeb-4.png") }} alt="properties">
                </div>
                <div class="col-12 col-md-3 p-0">
                  <img class="d-block w-100" src={{ asset("assets/img/local-celeb-3.png") }} alt="properties">
                </div>
                <div class="col-12 col-md-3 p-0">
                  <img class="d-block w-100" src={{ asset("assets/img/local-celeb-2.png") }} alt="properties">
                </div>
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
</div>

<div class="how-to-work-faq">
    <div class="container">
        <h2 class="text-center">FAQ</h2>
        <p>You have questions. We’ve got answers</p>
        <div class="accordion">
          <div class="accordion-item">
            <a>1) How to create a listing?</a>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
          </div>
          <div class="accordion-item">
            <a>2) How to create a listing?</a>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
          </div>
          <div class="accordion-item">
            <a>3) How to create a listing?</a>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
          </div>
          <div class="accordion-item">
            <a>4) How to create a listing?</a>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
          </div>
          <div class="accordion-item">
            <a>5) How to create a listing?</a>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
  $(document).ready(function() {
    $('.accordion a').click(function(){
      $(this).toggleClass('active');
      $(this).next('.content').slideToggle(400);
    });
  });
</script>


@endsection
