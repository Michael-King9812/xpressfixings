@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Manage All Customers</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of All Customers</li>
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
                    <h4 style="font-weight: bold;">Customers List (500)</h4>
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <!-- <th scope="col">Phone Number</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <!-- <th scope="row"></th> -->
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <!-- <td>{{ $user->phone }}</td> -->
                                    
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
