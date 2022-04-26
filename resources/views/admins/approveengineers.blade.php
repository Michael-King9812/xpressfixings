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
                @if(Session::has('success'))
                    <div id="msg" style="text-align: center; padding: 10px;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style="text-align: center; padding: 10px;" class="alert alert-danger">{{ Session::get('fail')}}</div>
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
                            @foreach($addEngineer as $EngineerDetails)
                                <tr>
                                    <td class="align-middle">{{ $EngineerDetails->fullname }}</td>
                                    <td class="align-middle">{{ $EngineerDetails->email }}</td>
                                    <td class="align-middle">{{ $EngineerDetails->phoneNumber }}</td>
                                    <td class="d-none d-md-table-cell">{{ $EngineerDetails->address }}</td>
                                    <td class="align-middle">{{ $EngineerDetails->state }}</td>
                                    
                                    <td class="table-action">
                                        <a href="{{route('approveView.engineer', [$EngineerDetails->remember_token])}}">
                                            <button class="btn btn-primary" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button>                                       
                                         </a>
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
