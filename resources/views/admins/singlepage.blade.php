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
            Order Details
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if(Session::has('success'))
                            <div id="msg" style="text-align: center; padding: 8px;" class="alert alert-success">{{ Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div id="msg" style="text-align: center; padding: 8px;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <small class="text-muted">Name</small>
                        <h6>{{ $userOrderDetails->fullName }}</h6> 
                        <small class="text-muted p-t-30 db">Email</small>
                        <h6>{{ $userOrderDetails->email }}</h6> 
                        <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ $userOrderDetails->phone }}</h6>  
                        <small class="text-muted p-t-30 db">Device Type</small>
                        <h6>{{ $userOrderDetails->deviceType }}</h6>
                        <small class="text-muted p-t-30 db">Phone Type</small>
                        <h6>{{ $userOrderDetails->phoneType }}</h6> 
                    
                        <small class="text-muted p-t-30 db">Model</small>
                        <h6>{{ $userOrderDetails->model }}</h6> 
                        <small class="text-muted p-t-30 db">IMIE No.</small>
                        <h6>{{ $userOrderDetails->imieNo }}</h6>   
                        <small class="text-muted p-t-30 db">Problem Type</small>
                        <h6>{{ $userOrderDetails->problemCategory }}</h6> 
                        <small class="text-muted p-t-30 db">Complain</small>
                        <h6>{{ $userOrderDetails->complain }}</h6> 
                        <small class="text-muted p-t-30 db">Current State</small>
                        <h6>{{ $userOrderDetails->currentState }}</h6> 
                        <small class="text-muted p-t-30 db">Current City</small>
                        <h6>{{ $userOrderDetails->currentCity }}</h6> 
                        <small class="text-muted p-t-30 db">Time</small>
                        <h6>{{ $userOrderDetails->created_at->diffForHumans() }}</h6> 
                        <small class="text-muted p-t-30 db">Status</small>
                        <h6>
                            <?php    
                                if($userOrderDetails->status == '0') {
                                    echo "<p style='color: orange;'>Pending...</p>";
                                }
                                elseif($userOrderDetails->status == '1') {
                                    echo "<p style='color: blue;'>Delivered</p>";
                                }
                                elseif ($userOrderDetails->status == '2') {
                                    echo "<p style='color: green; font-size: 20px;'>Fixing Completed</p>";
                                }
                                elseif ($userOrderDetails->status == '4' && $userOrderDetails->approval == '1' && $userOrderDetails->approvalStatus == '1') {
                                    echo "<p style='color: orange;'>Customer has approved. Waiting for your verification.</p>";
                                }
                                elseif ( $userOrderDetails->status == '4' && $userOrderDetails->approval == '2' && $userOrderDetails->approvalStatus == '2') {
                                    echo "<p style='color: darkgreen;'>Payment Verified and Fixing in Progress...</p>";
                                }
                                elseif ($userOrderDetails->status == '4' && $userOrderDetails->approval == '1') {
                                    echo "<p style='color: purple;'>Waiting for Response...</p>";
                                }
                                elseif ($userOrderDetails->status == '4' && $userOrderDetails->approval == '2' && $userOrderDetails->approvalStatus == '2') {
                                    echo "<p style='color: green;'><i class='fa fa-check'></i> Approved. <span style='color: indigo;'>Fixing in Progress...</span></p>";
                                }
                                else  {
                                    echo "<p style='color: red;'>...</p>";
                                }
                            ?> 
                        </h6>
                        
                                
                                @if($userOrderDetails->status == '0') 
                                    
                                
                                @elseif ($userOrderDetails->status == '2') 
                                        <small class="text-muted p-t-30 db">Fixing Price</small>
                                        <h6>
                                            <tr>
                                                <td><span style="color: green; font-weight: bold;">#{{$userOrderDetails->deviceFixPrice}}</span> </td>
                                            </tr>
                                        </h6>
                                        
                                        <small class="text-muted p-t-30 db">Assigned Engineer</small>
                                        <h6><br>
                                        <small style="font-weight: bold; color: indigo;">Proof of Payment:</small><br>
                                        
                                        @if($userOrderDetails->approvalImage == "Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png")
                                            <img src="{{asset('Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png')}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                        @else
                                            <a href="{{asset($userOrderDetails->approvalImage)}}" target="_top">
                                                <img src="{{asset($userOrderDetails->approvalImage)}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                            </a><br>
                                            @if( $userOrderDetails->status == '4' && $userOrderDetails->approval == '2' && $userOrderDetails->approvalStatus == '2')
                                                <img src="{{asset('Payment_Proof_Upload_Images\paid\-115973587912mujrzbezw.png')}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                            @endif
                                        @endif
                                @elseif(($userOrderDetails->status == '4') && $userOrderDetails->approval == '1' && $userOrderDetails->approvalStatus == '2') || ($userOrderDetails->status == '4' && $userOrderDetails->approval == '2' && $userOrderDetails->approvalStatus == '2'))
                                <small class="text-muted p-t-30 db">Fixing Price</small>
                                <h6>
                                    <tr>
                                        <td><span style="color: green; font-weight: bold;">#{{$userOrderDetails->deviceFixPrice}}</span> </td>
                                    </tr>
                                </h6>
                                
                                <!-- <small class="text-muted p-t-30 db">Assigned Engineer</small>
                                <h6>
                                    <tr>
                                        <td><span style="color: purple; font-weight: bold;">{{$userOrderDetails->assignedEngineer}}</span> </td>
                                    </tr>
                                </h6> <br> -->
                                <small style="font-weight: bold; color: indigo;">Proof of Payment:</small><br>
                                
                                @if($userOrderDetails->approvalImage == "Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png")
                                    <img src="{{asset('Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png')}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                @else
                                    <a href="{{asset($userOrderDetails->approvalImage)}}" target="_top">
                                        <img src="{{asset($userOrderDetails->approvalImage)}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                    </a><br>
                                    @if( $userOrderDetails->status == '4' && $userOrderDetails->approval == '2' && $userOrderDetails->approvalStatus == '2')
                                        <img src="{{asset('Payment_Proof_Upload_Images\paid\-115973587912mujrzbezw.png')}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                    @endif
                                @endif
                                

                                

                                @elseif($userOrderDetails->status == '4' && $userOrderDetails->approval == '1' && $userOrderDetails->approvalStatus == '1')
                                <small class="text-muted p-t-30 db">Fixing Price</small>
                                <h6>
                                    <tr>
                                        <td><span style="color: green; font-weight: bold;">#{{$userOrderDetails->deviceFixPrice}}</span> </td>
                                    </tr>
                                </h6>
                            
                                @if($assignedEngineer)
                                    <small class="text-muted p-t-30 db">Assigned Engineer</small>
                                    <h6>
                                        <tr>
                                            <td><span style="color: purple; font-weight: bold;">{{$assignedEngineer->fullname }}</span> </td>
                                        </tr>
                                    </h6> 
                                @endif
                                <br>
                                <small style="font-weight: bold; color: indigo;">Proof of Payment:</small><br>
                                <a href="{{asset($userOrderDetails->approvalImage)}}" target="_top">
                                <img src="{{asset($userOrderDetails->approvalImage)}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                </a><br>
                                    <div class="col-sm-8 col-md-10" style="padding: 8px;">
                                        <form action="{{route('order.verify', $userOrderDetails->remember_token)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-success" style="font-weight: bold; color: white">Verify Order</button><br><br>
                                        </form>
                                        
                                        <button class="btn btn-danger" style="font-weight: bold; color: white">Cancle</button>
                                    </div>

                                @elseif($userOrderDetails->status == '4' && $userOrderDetails->approval == '1' && $userOrderDetails->deviceFixPrice != '' )
                                    <small class="text-muted p-t-30 db">Fixing Price</small>
                                    <h6>
                                        <tr>
                                            <td><span style="color: green; font-weight: bold;">#{{$userOrderDetails->deviceFixPrice}}</span> </td>
                                        </tr>
                                    </h6>
                                @else  
                                    
                                    
                                
                                            
                                        

                                @endif
                              
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if($userOrderDetails->status == '4' && $userOrderDetails->problemCategory == 'others' && $userOrderDetails->approval == '1' ) 

                        <form action="{{route('admin.engineer.deviceFixPrice', $userOrderDetails->remember_token)}}" method="post" class="form-horizontal form-material mx-2">            
                                    @csrf
                                    @method('put') 

                                <p style="color: green; font-size: 14px;">&nbsp; &nbsp;<i class="fas fa-check" aria-hidden="true"></i> Active</p>
                           
                            <h3 style="font-weight: bold;">Assign Price</h3>
                            <div class="form-group">
                                
                                <div class="col-sm-10 col-md-12">
                                    <label class="col-sm-12 col-md-10" style="font-weight: bold;">Enter Price Here:</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input class="shadow-none form-control" name="fixingprice" value="{{$userOrderDetails->deviceFixPrice}}" value="{{old('fixingprice')}}" style="font-weight: bold;" value="" placeholder="#">
                                        
                                    </div>
                                    @error('fixingprice') <p style="color: red; font-size: 12px;">{{$message}}</p> @enderror
                                    <div class="col-sm-8 col-md-10" style="padding: 8px;">
                                    <button class="btn btn-success" style="font-weight: bold; color: white">Approve Order</button>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </form>

                        @endif

                        @if($userOrderDetails->assignedEngineer != "")
                            <small class="text-muted p-t-30 db">Assigned Engineer</small>
                            <h6>
                                <tr>
                                    <td><span style="color: green; font-weight: bold;">{{ $assignedEngineer->fullname }} </span> </td>
                                </tr>
                            </h6>
                            <small class="text-muted p-t-30 db">Engineer Phone </small>
                            <h6>
                                <tr>
                                    <td><span style="color: green; font-weight: bold;">{{$assignedEngineer->phoneNumber}}</span> </td>
                                </tr>
                            </h6>
                            
                            <small class="text-muted p-t-30 db">Engineers Email</small>
                            <h6>
                                <tr>
                                    <td><span style="color: purple; font-weight: bold;">{{$assignedEngineer->email}}</span> </td>
                                </tr>
                            </h6> 
                            
                            <small class="text-muted p-t-30 db">Engineers Location</small>
                            <h6>
                                <tr>
                                    <td><span style="color: purple; font-weight: bold;">{{$assignedEngineer->address}}</span> </td>
                                </tr>
                            </h6> 

                            <small class="text-muted p-t-30 db">Engineers City</small>
                            <h6>
                                <tr>
                                    <td><span style="color: purple; font-weight: bold;">{{$assignedEngineer->city}}</span> </td>
                                </tr>
                            </h6> 

                            <small class="text-muted p-t-30 db">Engineers State</small>
                            <h6>
                                <tr>
                                    <td><span style="color: purple; font-weight: bold;">{{$assignedEngineer->state}}</span> </td>
                                </tr>
                            </h6> 
                            
                            <small class="text-muted p-t-30 db">Order Time</small>
                            <h6>
                                <tr>
                                    <td><span style="color: purple; font-weight: bold;">{{ $userOrderDetails->created_at->diffForHumans() }}</span> </td>
                                </tr>
                            </h6> 

                            @if($userOrderDetails->status != '0')
                            <small class="text-muted p-t-30 db">Fixing Price</small>
                            <h6>
                                <tr>
                                    <td><span style="color: green; font-weight: bold;">#{{$userOrderDetails->deviceFixPrice}}</span> </td>
                                </tr>
                            </h6>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection