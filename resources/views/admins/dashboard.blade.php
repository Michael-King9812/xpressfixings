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
            Dashboard
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Users</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3" style="font-weight: bold;">{{App\Models\User::where('category','customer')->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Engineers</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3" style="font-weight: bold;">{{App\Models\Engineer::count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Riders</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="activity"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3" style="font-weight: bold;">0</h1>
                    <!-- <div class="mb-0">
                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
                        More earnings than usual
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Orders</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3" style="font-weight: bold;">{{App\Models\Orderdetail::count()}}</h1>
                    <!-- <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
                        More earnings than usual
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
