@extends('engineers/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-5">
            <h4 class="page-title">Profile Page</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Infomation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
        <div class="card-body">
                <center class="m-t-30"> <img src="{{asset('customers/assets/images/users/5.jpg')}}"
                        class="rounded-circle" width="150" />
                    <h4 class="card-title m-t-10">Full Name: Hanna Gover</h4>
                    <!-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6> -->
                    <!-- <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                    class="icon-people"></i>
                                <font class="font-medium">254</font>
                            </a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                    class="icon-picture"></i>
                                <font class="font-medium">54</font>
                            </a></div>
                    </div> -->
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6>hannagover@gmail.com</h6> <small class="text-muted p-t-30 db">Phone</small>
                <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="johnathan@admin.com"
                                class="form-control form-control-line" name="example-email"
                                id="example-email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" value="password"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="123 456 7890"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success text-white">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
