@extends('layout')

@section('main')
<!-- service section -->

<section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Services</span>
          </h2>
          <p>
            What we do
          </p>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('images/s1.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Phone Repair
                </h5>
                <p>
                  when it comes to repair of all varieties of phone, phones recycle, phone refurbishment, we are the one that does it all
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('images/s2.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Hardware Replacement
                </h5>
                <p>
                  We offer hardware replacement including phone screens, charging port 
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('images/s3.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Computer Repair
                </h5>
                <p>
                  When comes to all varities of computer repair, our super skilled technicians are always ready to get it fixed. Quality is what we are known of. With warranty
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="{{asset('images/s4.png')}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Software Update
                </h5>
                <p>
             TELL US ANY SOFTWARE YOU WANT TO UPDATE, XPRESSFIXING IS ALWAYS AVAILABLE
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-box">
          <a href="">
            See All
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  @endsection