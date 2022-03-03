@extends('layout')
@section('main')
<!-- why us section -->

<section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{asset('images/w1.png')}}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Diagnostics
              </h5>
              <p>
               Diagnoise your mobile devices for free


              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{asset('images/w2.png')}}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Quick Repair Process
              </h5>
              <p>
                Get your gadgets repair as quick as possible with our service
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{asset('images/w3.png')}}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Low Price Guarantee
              </h5>
              <p>
                Our services are affordable to everyone
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->
@endsection