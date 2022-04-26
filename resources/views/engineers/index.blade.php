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
            Manage Orders
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-12">
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
                                <tr>
                                    <td>{{$orderdetail->email}}</td>
                                    <td>{{ $orderdetail->created_at->diffForHumans() }}</td>
                                    <td>{{ $orderdetail->phone }}</td>
                                    <td>{{ $orderdetail->problemCategory }}</td>
                                    <td>{{ $orderdetail->deviceType }}</td>
                                    <?php    
                                        if($orderdetail->status == '0') {
                                            echo "<td><span class='badge badge-warning'>Pending...</span></td>";
                                        }
                                        elseif($orderdetail->status == '1') {
                                            echo "<td><span class='badge badge-primary'>Delivered</span></td>";
                                        }
                                        elseif ($orderdetail->status == '2') {
                                            echo "<td><span class='badge badge-success'>Completed</span></td>";

                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1' && $orderdetail->approvalStatus == '1') {
                                            echo "<td scope='col'><span class='badge badge-info'>Verification Needed</span></td>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1' && $orderdetail->deviceFixPrice == '') {
                                            echo "<td><span class='badge badge-warning'>Waiting</span></td>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1' && $orderdetail->deviceFixPrice != '') {
                                            echo "<td><span class='badge badge-outline-warning'>Awaiting Response</span></td>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '2') {
                                            echo "<td scope='col'><span class='badge badge-secondary'>Approved</span></td>";
                                        }
                                        else  {
                                            echo "<td><span class='badge badge-danger'>Cancelled</span></td>";
                                        }
                                    ?> 
                                    <td>{{ $orderdetail->currentState }}</td>
                                    <td>{{ $orderdetail->currentCity }}</td>
                                    <td>
                                        <a href="{{route('engineer.viewSingle', $orderdetail->remember_token)}}"><button class="btn btn-primary" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection