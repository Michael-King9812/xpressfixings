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
            Manage Engineers
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
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
                    <h5 class="card-title mb-0">Total Customers (<span style="color: red;">{{App\Models\User::where('category','customer')->count()}})</span></h5>
                </div>
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
                                <th>Names</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->fullname }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

@endsection