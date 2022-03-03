@extends('layout')

@section('main')
    <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Provide Best Service
              </h2>
            </div>
            <p>
             xpressfixing.com is an online platform design to ease mobile repair, rebranding of mobile phone into new once,  our service are with warranty. As our customer or a new user all you have to do select the phone type you wish to repair, your phones issues,.

However each phone fault is associated with range of services,.
One thing that makes us different from others is we give the best to  customers with our well expiriienced technicians
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('images/about-img.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
@endsection