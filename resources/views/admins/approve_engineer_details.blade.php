@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-5">
            <h4 class="page-title">Approve Engineer</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Approve Engineer Details</li>
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
    <div class="col-lg-10 col-xlg-10 col-md-10">
        <div class="card">
        <div class="card-body">
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body">
                <small class="text-muted p-t-30 db">Full Name</small>
                <h6>{{$engineerDetails->fullname}}</h6> 
                <small class="text-muted p-t-30 db">Email</small>
                <h6>{{$engineerDetails->email}}</h6>  
                <small class="text-muted p-t-30 db">Phone Number</small>
                <h6>{{$engineerDetails->phoneNumber}}</h6> 
                <small class="text-muted p-t-30 db">Address</small>
                <h6>{{$engineerDetails->address}}</h6> 
                <small class="text-muted p-t-30 db">City</small>
                <h6>{{$engineerDetails->city}}</h6>   
                <small class="text-muted p-t-30 db">State</small>
                <h6>{{$engineerDetails->state}}</h6> <br><br>
                
                
                @if($engineerDetails->status == '0')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <form action="{{route('approveEngineerUpdate', $engineerDetails->remember_token )}}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-success text-white" style="font-weight: bold;"> <i class="fas fa-check-circle"></i> Approve Engineer</button>
                            </form>              
                        </div>
                    </div>  
                @endif
            </div>
            <br><br>
        </div>
    </div>
    <!-- Column -->
    
</div>
@endsection
