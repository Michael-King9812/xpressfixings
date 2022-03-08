@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Approve Engineer Table</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Applied Engineers</li>
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
                    <!-- <h4 style="font-weight: bold;">List of Applied Engineers</h4> -->
                    @if(Session::has('success'))
                        <div id="msg" style="font-weight: bold; text-align: center;" class="alert alert-success">{{ Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="msg" style="font-weight: bold; text-align: center;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                    
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <th scope="col">Engineers Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">State</th>
                                <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($addEngineer as $EngineerDetails)
                                <tr>
                                    <td>{{ $EngineerDetails->fullname }}</td>
                                    <td>{{ $EngineerDetails->email }}</td>
                                    <td>{{ $EngineerDetails->phoneNumber }}</td>
                                    <td>{{ $EngineerDetails->address }}</td>
                                    <td>{{ $EngineerDetails->state }}</td>
                                    
                                        <td>
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
        <!-- Column -->
    </div>
@endsection
