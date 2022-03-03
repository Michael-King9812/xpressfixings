@extends('layout')

@section('main')
     <!-- contact section -->
  <section class="contact_section layout_padding">

<div class="container">
  <div class="heading_container heading_center">
    <h2>
      Contact Us
    </h2>
  </div>
  <div class="row">
    <div class="col-md-9 mx-auto">
      <div class="form_container">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="First Name" />
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Last Name" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="email" class="form-control" placeholder="Email" />
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Phone Number" />
            </div>
          </div>
          <div class="form-group ">
            <input type="text" class="message-box" placeholder="Message" />
          </div>
          <div class="btn-box">
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<!-- end contact section -->

@endsection