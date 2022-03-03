@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Manage Riders</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riders Assingment List</li>
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
                    <h4 style="font-weight: bold;">Riders Assignment History</h4>
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Phone Type</th>
                                <th scope="col">Model</th>
                                <th scope="col">Status</th>
                                <th scope="col">Current State</th>
                                <th scope="col">Current City</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kingmichael9812@gmail.com</td>
                                <td>08108554110</td>
                                <td>Tecno</td>
                                <td>X548</td>
                                <td><span class="label label-rounded label-primary">Pending</span></td>
                                <td>Niger</td>
                                <td>Mina</td>
                                <td>
                                    <a href="{{route('engineer.orderdetails')}}"><button class="btn btn-default" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                                </td>
                                <td>
                                    <a href="{{route('engineer.orderdetails')}}"><button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>Samuelekong419@gmail.com</td>
                                <td>08108554110</td>
                                <td>Tecno</td>
                                <td>X548</td>
                                <td><span class="label label-rounded label-primary">Pending</span></td>
                                <td>Niger</td>
                                <td>Mina</td>
                                <td>
                                    <a href="{{route('engineer.orderdetails')}}"><button class="btn btn-default" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
                                </td>
                                <td>
                                    <a href="{{route('engineer.orderdetails')}}"><button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>

                            
                            
                            
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
