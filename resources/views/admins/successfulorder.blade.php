@extends('admins/layout')

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
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Device Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Current State</th>
                                <th scope="col">Current City</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orderDetails as $orderdetail)
                        <tr>
                            <th scope="row">{{ $orderdetail->id }}</th>
                            <td>{{ $orderdetail->email }}</td>
                            <td>{{ $orderdetail->phone }}</td>
                            <td>{{ $orderdetail->deviceType }}</td>
                            <!-- <td><span class="label label-rounded label-primary">Pending</span></td> -->
                            <?php    
                                if($orderdetail->status == '0') {
                                    echo '<td><span class="label label-rounded label-warning">Pending...</span></td>';
                                }
                                elseif($orderdetail->status == '1') {
                                    echo '<td><span class="label label-rounded label-primary">Delivered</span></td>';
                                }
                                elseif ($orderdetail->status == '2') {
                                    echo '<td><span class="label label-rounded label-success">Done</span></td>';
                                }
                                else  {
                                    echo '<td><span class="label label-rounded label-warning">Pending...</span></td>';
                                }
                            ?> 
                            <td>{{ $orderdetail->currentState }}</td>
                            <td>{{ $orderdetail->currentCity }}</td>
                            <td>
                                <a href=""><button class="btn btn-default" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                            </td>
                            <?php 
                                if ($orderdetail->status == '2') {
                                    echo '
                                        <td>
                                            <button class="btn btn-success" style="color: white; border-radius: 50%;"><i class="fa fa-check"></i></button>
                                        </td>
                                    ';
                                } else {
                                    echo '
                                        <td>
                                            <a href=""><button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    ';
                                }
                            ?>
                            
                        </tr>
                       @endforeach
                                                       

                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
