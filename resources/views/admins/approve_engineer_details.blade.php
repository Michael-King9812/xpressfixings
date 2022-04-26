@extends('admins/layouts/layout')

@section('sidebar')
    @include('admins.layouts.sidebar')
@endsection

@section('navbar')
    @include('admins.layouts.navbar')
@endsection

@section('main')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Engineer Details
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if(Session::has('success'))
                    <div id="msg" style="text-align: center; padding: 10px;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style="text-align: center; padding: 10px;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="col-md-6">
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
            </div>
        </div>
    </div>

@endsection
