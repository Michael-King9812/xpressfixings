@extends('engineers/layouts/layout')

@section('sidebar')
    @include('engineers.layouts.sidebar')
@endsection

@section('navbar')
    @include('engineers.layouts.navbar')
@endsection

@section('main')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Profile
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-header">
                @if(Session::has('success'))
                    <div id="msg" style="text-align: center;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style="text-align: center;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
            </div>
            <div class="card-body">
                <center>
                    <div style="width: 150px; height: 150px;">
                        <img src="/assets/img/avatars/avatar.png" class="img-fluid rounded-circle mb-2" alt="Avatar" />
                    </div>
                </center>
                <hr>
                <small class="text-muted">Full Name</small>
                <h6>{{$data->fullname}}</h6> 
                <small class="text-muted p-t-30 db">Email</small>
                <h6>{{$data->email}}</h6>
                <small class="text-muted p-t-30 db">Phone Number</small>
                <h6>{{$data->phoneNumber}}</h6>
                <small class="text-muted p-t-30 db">Address</small>
                <h6>{{$data->address}}</h6>
                <small class="text-muted p-t-30 db">City</small>
                <h6>{{$data->city}}</h6>
                <small class="text-muted p-t-30 db">State</small>
                <h6>{{$data->state}}</h6>
            </div>
        </div>
    </div>

@endsection