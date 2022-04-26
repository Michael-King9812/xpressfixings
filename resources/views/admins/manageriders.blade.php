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
            Manage Riders
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="#" class="mr-1">
                        <i class="align-middle" data-feather="refresh-cw"></i>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <i class="align-middle" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Total Engineers (<span style="color: red;">{{App\Models\Engineer::count()}})</span></h5>
                
                @if(Session::has('success'))
                    <div id="msg" style="padding: 8px; text-align: center;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style="padding: 8px; text-align: center;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th >Engineers Name</th>
                                <th >Email</th>
                                <th >Phone Number</th>
                                <th class="d-none d-md-table-cell" >Address</th>
                                <th >State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="d-none d-md-table-cell"></td>
                                    <td class="align-middle"></td>
                                    
                                    <td class="table-action">
                                        <form action="" method="post">
                                            
                                            <!-- <button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button> -->
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

@endsection
