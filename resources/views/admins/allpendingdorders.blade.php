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
            New Orders
        </h1>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if(Session::has('success'))
                    <div id="msg" style=" text-align: center;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style=" text-align: center;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Time</th>
                                <th>Phone Number</th>
                                <th>Problem</th>
                                <th>Device Type</th>
                                <th>Status</th>
                                <th>Current State</th>
                                <th>Current City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails as $orderdetail)
                                @if($orderdetail->status == '4' && $orderdetail->approval == '1')
                                    <tr>
                                        <td>{{$orderdetail->email}}</td>
                                        <td>{{ $orderdetail->created_at->diffForHumans() }}</td>
                                        <td>{{ $orderdetail->phone }}</td>
                                        <td>{{ $orderdetail->problemCategory }}</td>
                                        <td>{{ $orderdetail->deviceType }}</td>
                                        <td><span class='badge badge-success'>Pending...</span></td>
                                        <td>{{ $orderdetail->currentState }}</td>
                                        <td>{{ $orderdetail->currentCity }}</td>
                                        <td>
                                            <a href="{{route('admin.viewSingle', $orderdetail->remember_token)}}"><button class="btn btn-primary" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
