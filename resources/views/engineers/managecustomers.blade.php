@extends('engineers/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Manage Customer Orders</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers Orders List</li>
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
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 style="font-weight: bold;">Customers Order History</h4>
                    @if(Session::has('success'))
                        <div id="msg" class="alert alert-success">{{ Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="msg" class="alert alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                    
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Email</th>
                                <th scope="col">Time</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Device Type</th>
                                <th scope='col'>Status</th>
                                <th scope="col">Current State</th>
                                <th scope="col">Current City</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            for($i = 0; $i < count($orderDetails); $i++) {
                                $orderdetail = $orderDetails[$i];
                                ?>
                                  
                                <tr>
                                    <!-- <th scope="row"></th> -->
                                    <td>{{ $orderdetail->email }}</td>
                                    <td>{{ $orderdetail->created_at->diffForHumans() }}</td>
                                    <td>{{ $orderdetail->phone }}</td>
                                    <td>{{ $orderdetail->deviceType }}</td>
                                    <!-- <td><span class="label label-primary">Pending</span></td> -->
                                    
                                    <!-- <td><span class="label label-warning">Pending...</span></td> -->
                                    <?php    
                                        if($orderdetail->status == '0') {
                                            echo "<td><span style='font-weight: bold; font-weight: bold;' class='label label-warning'>Pending...</span></td>";
                                        }
                                        elseif($orderdetail->status == '1') {
                                            echo "<td><span style='font-weight: bold; color: blue; font-weight: bold;' class='label'>Delivered</span></td>";
                                        }
                                        elseif ($orderdetail->status == '2') {
                                            echo "<td><span style='font-weight: bold; color: green; font-weight: bold;' class='label'>Done</span></td>";

                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1' && $orderdetail->approvalStatus == '1') {
                                            echo "<td scope='col'><span style='font-weight: bold; color: lightgreen; font-weight: bold;' class='label'>Verification Needed</span></td>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1') {
                                            echo "<td><span style='font-weight: bold; color: purple; font-weight: bold;' class='label'>Waiting</span></td>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '2') {
                                            echo "<td scope='col'><span style='font-weight: bold; color: black; font-weight: bold;' class='label'>Approved</span></td>";
                                        }
                                        else  {
                                            echo "<td><span style='font-weight: bold; font-weight: bold; color: red;' class='label'>Cancelled</span></td>";
                                        }
                                    ?> 
                                        
                                    <td>{{ $orderdetail->currentState }}</td>
                                    <td>{{ $orderdetail->currentCity }}</td>
                                    <td>
                                        <a href="{{route('engineer.viewSingle', $orderdetail->remember_token)}}"><button class="btn btn-default" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                                    </td>
                                        
                                </tr>
                                <?php
                                echo '<option value="'.$orderdetail->id.'">'.$orderdetail->fullname.'</option>';
                                
                            }
                        ?>
                                                       

                            
                            
                            
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
