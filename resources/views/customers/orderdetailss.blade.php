@extends('layout')

@section('main')


<main class="l-main">
<link rel="stylesheet" href="{{asset('customers/assets/js/jquery.min.js')}}">

            <section class="home" id="home">
                

                    <div class="container col-md-9" style="margin-top: 100px;">
                        <div class="row">
                            
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                        <h4 class="section-title" style="text-align: left; font-weight: bold; font-size: 25px;">Order for Repairs Details</h4><br>
                        @error('proof_upload_image')<div class="alert alert-danger" style="color: red; font-weight: bold;"> {{$message}} </div> @enderror    
                        <div class="car" style="padding: 13px 8px;">
                            <div class="table table-responsive">
                            <table class="table ">
                                
                                <tbody>
                                    <tr>
                                        <th colspan="6">Name:</th>
                                        <td>{{ $orderDetails->fullName }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Email:</th>
                                        <td>{{ $orderDetails->email }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Phone:</th>
                                        <td>{{ $orderDetails->phone }} </td>
                                    </tr>
                   
                                    <tr>
                                        <th colspan="6">Device Type:</th>
                                        <td>{{ $orderDetails->deviceType }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="6">Device Name:</th>
                                        <td>{{ $orderDetails->phoneType }} </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="6">Model:</th>
                                        <td> {{ $orderDetails->model }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">IMIE No.:</th>
                                        <td> {{ $orderDetails->imieNo }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Problem Type:</th>
                                        <td>{{ $orderDetails->problemCategory }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Complain:</th>
                                        <td>{{ $orderDetails->complain }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Current State:</th>
                                        <td> {{ $orderDetails->currentState }} </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Current Location:</th>
                                        <td> {{ $orderDetails->currentCity }} </td>
                                    </tr>
                                   


                                    <tr>

                                    <!-- 
                                        // 0 = pending
                                        // 1 = delivered
                                        // 2 = done
                                        // 3 = cancled
                                        // 4 = approved 
                                    -->


                                        <th colspan="6">Status:</th>
                                        <td><span class="label label-rounded label-success">
                                        <?php 
                                        // if ($orderDetails->approval == '1') {
                                        //     // echo "<p style='color: purple; font-weight: bold;'>Waiting for your Approval...</p>";
                                        // }  
                                        // else {
                                            if($orderDetails->status == '0') {
                                                echo "<p style='color: orange; font-weight: bold;'>Pending...</p>";
                                            }
                                            elseif($orderDetails->status == '1') {
                                                echo "<p style='color: blue; font-weight: bold;'>Delivered</p>";
                                            }
                                            elseif ($orderDetails->status == '2') {
                                                echo "<p style='color: done; font-weight: bold;'><i class='fa fa-check-double'></i> Done</p>";
                                            } 
                                            
                                            elseif ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->approvalStatus == '2') {
                                                echo "<p style='color: darkgreen; font-weight: bold;'><i class='fa fa-check'></i> Payment Verified and Fixing in Progress..</p>";
                                            }
                                            elseif ($orderDetails->problemCategory == 'others' && $orderDetails->approval == '1' && $orderDetails->deviceFixPrice == '') {
                                                echo "<p style='color: purple; font-weight: bold;'>Waiting for Admin to assign price</p>";
                                            }
                                            elseif ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->deviceFixPrice != '') {
                                                echo "<p style='color: purple; font-weight: bold;'>Waiting for your Approval...</p>";
                                            }
                                            elseif ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->approvalStatus == '0') {
                                                echo "<p style='color: purple; font-weight: bold;'>Select Engineer...</p>";
                                            }
                                            elseif ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->approvalStatus == '1') {
                                                echo "<p style='color: orange; font-weight: bold;'>Wait for Verification...</p>";
                                            }
                                            
                                            elseif ($orderDetails->status == '4' && $orderDetails->approval == '2') {
                                                echo "<p style='color: darkblue; font-weight: bold;'><span style='color: darkgreen'>You've been Approved, fixing in progress...</span><br>";
                                                if($orderDetails->status == '4' && $orderDetails->approval == '2' && $orderDetails->assignedEngineer == '') {
                                                    echo "Now you can assign engineer</p>";
                                                } elseif($orderDetails->status == '4' && $orderDetails->approval == '2' && $orderDetails->assignedEngineer != '') {
                                                    echo "You've already assigned an engineer</p>";
                                                } else {

                                                }
                                            }
                                            elseif ($orderDetails->status == '3') {
                                                echo "<p style='color: red; font-weight: bold;'>Cancelled</p>";
                                            }
                                            else  {
                                                echo "<p style='color: orange; font-weight: bold;'>Pending...</p>'";
                                            }
                                        // }
                                        
                                        ?> 
                                        </span></td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Time:</th>
                                        <td> {{ $orderDetails->created_at->diffForHumans() }} </td>
                                    </tr>
                                    <?php    
                                        if($orderDetails->deviceFixPrice != '') {
                                        //     echo "";
                                        // }
                                        // elseif($orderDetails->status == '1' || $orderDetails->status == '4' || $orderDetails->status == '2') {
                                            echo '<tr>
                                                    <th colspan="6">Price</th>
                                                    <td><span style="color: purple; font-weight: bold;">#'.$orderDetails->deviceFixPrice.'</span> </td>
                                                </tr>';
                                        // }
                                        // elseif ($orderDetails->status == '2') {
                                        //     echo "";
                                        // } 
                                        // else  {
                                        //     echo "";
                                        }
                                    ?> 
                                        
                                    <tr>
                                        <th colspan="6">Action:</th>
                                        
                                        <td> 
                                                @if($orderDetails->problemCategory == 'others' && $orderDetails->deviceFixPrice == '')
                                                    <p style='color: darkblue; font-weight: bold;'><span style='color: tomato'>Request Recieved, wait for Admin to assign price</span><br>

                                                @elseif(($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->approvalStatus != '2' && $orderDetails->assignedEngineer != '') || ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->deviceFixPrice != '') )
                                                    <!-- <form id="form" action="{{route('approve.fixOrder', $orderDetails->remember_token)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button style="" class="btn btn-success" style="color: white; cursor: pointer; border-radius: 0;">Approved <i class="fa fa-check"></i></button>
                                                    </form> -->
                                                   
                                                        <span style="font-weight: bold; font-size: 15px; color: orange;"><i class="fa fa-exclamation-triangle"></i> Fixing will be Placed on 2 Month Warranty.</span><br><br>
                                                        <button class="btn btn-success"  data-toggle="modal" data-target="#paymentModal" style="color: white; cursor: pointer; border-radius: 0;"><i class="fa fa-credit-card"></i> Make Payment</button>
                                                        <br><br>
                                                        <form action="{{route('cancle.order', $orderDetails->remember_token)}}" method="post">
                                                            @csrf
                                                            @method('put')

                                                            <button class="btn btn-danger" style="color: white; cursor: pointer; border-radius: 0;">Cancle <i class="fa fa-trash"></i></button>
                                                        </form>
                                                @elseif($orderDetails->status == '0')
                                                        <!-- <form id="form" action="{{route('approve.fixOrder', $orderDetails->remember_token)}}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button style="" class="btn btn-success" style="color: white; cursor: pointer; border-radius: 0;">Approved <i class="fa fa-check"></i></button>
                                                        </form>
                                                        <button class="btn btn-success"  data-toggle="modal" data-target="#paymentModal" style="color: white; cursor: pointer; border-radius: 0;">Make Payment <i class="fa fa-pay"></i></button>
                                                        <br><br> -->
                                                        <form action="{{route('cancle.order', $orderDetails->remember_token)}}" method="post">
                                                            @csrf
                                                            @method('put')

                                                            <button class="btn btn-danger" style="color: white; cursor: pointer; border-radius: 0;">Cancle <i class="fa fa-trash"></i></button>
                                                        </form>
                                                   
                                                @elseif($orderDetails->status == 2)
                                                        <button class="btn btn-primary" style="color: white; border-radius: 0;">Done <i class="fas fa-check-double"></i></button>
                                                
                                                @elseif($orderDetails->status == 3)
                                                    <button class="btn btn-danger" style="color: white; border-radius: 0;">Cancelled <i class="fa fa-trash"></i></button>

                                                @else
                                                    <form action="{{route('cancle.order', $orderDetails->remember_token)}}" method="post">
                                                        @csrf
                                                        @method('put')
    
                                                        <button class="btn btn-danger" style="color: white; border-radius: 0;">Cancle <i class="fa fa-trash"></i></button>
                                                    </form>
                                                @endif



                                                <!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalBoxTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentTabs" style="font-weight: bold">Choose Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <ul class="nav nav-pills">
    <!-- <li class="active"><a data-toggle="pill" href="#home">PayStack</a></li>
    <!-- <li><a data-toggle="pill" href="#menu1">PayStack</a></li>
    <li><a data-toggle="pill" href="#menu2" style="float: left;">Transfer</a></li>
    <!-- <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
  </ul> -->
  <ul class="nav nav-tabs">
  <li class="activ"><a data-toggle="pill" style="font-weight: bold; padding: 10px; font-size: 18px; text-decoration: none;" href="#menu1">PayStack</a></li>
  <li><a data-toggle="pill" href="#menu2" style="font-weight: bold; padding: 10px; font-size: 18px; text-decoration: none;">Transfer</a></li>
</ul>
  
  <div class="tab-content">
    <!-- <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div> -->
    <div id="menu1" class="tab-pane fade in active" style="padding: 8px;">
      <h5>Pay Through PayStack</h5>
      <form class="form-horizontal" id="paymentForm">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email-address" value="{{$orderDetails->email}}" placeholder="Enter email" disabled name="email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Price:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="amount" value="{{$orderDetails->deviceFixPrice}}" placeholder="" disabled name="price" required>
      </div>
    </div>
    <input type="hidden" class="form-control" id="token" value="{{$orderDetails->remember_token}}" placeholder="" disabled name="price" required>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-success" type="submit"  data-toggle="modal" data-target="#paymentModal" onclick="payWithPaystack(event)" style="color: white; cursor: pointer; border-radius: 0;">Place Payment <i class="fa fa-pay"></i></button>
      </div>
    </div>
  </form>
    </div>
    <div id="menu2" class="tab-pane fade" style="padding: 8px;">
      <h5>Pay Through Transfer</h5><br>
      <span style="font-size: 15px;"><b>Account Name:</b> Ajisafe Sodiq Lukuman</span><br>
      <span style="font-size: 15px;"><b>Bank Account Number:</b> 2119127993</span><br>
      <span style="font-size: 15px;"><b>Bank Name:</b> UBA</span><br>
      <span style="font-size: 15px; font-weight: bold;">Amount: <span style="color: indigo;">#{{$orderDetails->deviceFixPrice}}</span></span><br><br>
      <p style="color: orange; font-size: 12px;">&nbsp; &nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Upload proof of payment after successful transfer form confirmation.</p>

      <br>
      <center>
      <form action="{{route('customer.uploadProof', $orderDetails->remember_token)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
            <img src="{{asset('default/10002.png')}}" alt="" id="profileDisplay" onclick="triggerClick()" style="max-width: 420px; min-width: 220px; width: auto; height: 220px; display: block; margin: 10px auto; cursor: pointer;">
            <input type="file" name="proof_upload_image" onchange="displayImage(this)" id="profileImage" style="margin-bottom: 15px; display: none;"><br>

          <!-- <input type="file" name="proof_upload_image" id="" style="width: 180px; height: 60px; border-radius: 10px;"> -->
          <button class="btn btn-success"  data-toggle="modal" data-target="#paymentModal" style="color: white; cursor: pointer; border-radius: 0;">Upload <i class="fa fa-pay"></i></button>

      </form>
      </center>
    </div>
    
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
                                            
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>

                            @if(($orderDetails->status == '4') && ($orderDetails->approval == '1' && $orderDetails->approvalStatus == '1') || ($orderDetails->status == '4' && $orderDetails->approval == '1' && $orderDetails->approvalStatus == '2') || ($orderDetails->status == '4' && $orderDetails->approval == '2' && $orderDetails->approvalStatus == '2'))
                                <h6 style="font-weight: bold;">Payment Proof:</h6>  
                                
                                @if($orderDetails->approvalImage == "Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png" )
                                    <img src="{{asset($orderDetails->approvalImage)}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                @else
                                    <a href="{{asset($orderDetails->approvalImage)}}" target="_top">
                                        <img src="{{asset($orderDetails->approvalImage)}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                    </a><br><br>
                                    @if( $orderDetails->status == '4' && $orderDetails->approval == '2' && $orderDetails->approvalStatus == '2')
                                        <img src="{{asset('Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png')}}" alt="Approval Image" style="width: 160px; height: 160px; border-radius: 5px;">
                                    @endif
                                @endif
                                <br>
                            
                            @endif
                            <br><br>
                            <p>
                                <span style="font-weight: bold;">IMPORTANT PAYMENT NOTICE:</span><br>
                                <span style="color: red;">
                                All payment is to be made directly on the website Xpressfixing will never assign any engineer to collect money via is personal account.
                                Paying to an Engineers personal account is at customers risk</span>
                            </p>

                        </div>
                            </div>
                        
                        </div>
                        
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <!--  && $orderDetails->approval == '2'  -->
                            @if($orderDetails->status == '4' && $orderDetails->assignedEngineer == "")
                                <h4 class="section-title" style="text-align: left; font-weight: bold; font-size: 25px;">Engineer Details</h4><br>

                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: bold; font-size: 12px;">Select Engineer</label>
                                    <div class="col-sm-12">
                                        <form action='{{route("customer.assignEngineer", $orderDetails->remember_token)}}' method='post'>
                                            <select name="selectEngineer" id="selectEngineer" placeholder="Choose Engineer" value="{{old('selectEngineer')}}" class="form-select shadow-none form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                <option id="engineerOptions" value="">Choose Engineer</option>      
                                                @foreach($allEngineers as $listEngineers)
                                                    <option value="{{$listEngineers->remember_token}}">{{$listEngineers->fullname}}</option>
                                                @endforeach
                                            </select>
                                            
                                            @error('selectEngineer') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                            
                                            <table class="table" id="#table">
                                                <br>
                                                <tbody id="engineerDetails" class="tbody">
                                                
                                                </tbody>
                                            </table>
                                            <div id="select" style="visibility: hidden; display: none;">
                                                
                                                    @csrf
                                                    @method('put')
                                                    <button class='btn btn-success' style='color: white; border-radius: 0;'><i class='fa fa-check'></i> Select Engineer </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>




                                <h4 class="section-title" style="text-align: left; font-weight: bold; font-size: 25px;">Order Ride</h4>
                                        <p style="color: red; font-size: 14px;">&nbsp; &nbsp;<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Feature is coming soon...</p>
                                <form action="#" method="post" class="form-horizontal form-material mx-2">
                                   

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Enter Your Name for Identification."
                                                    class="form-control form-control-line" name="idName" disabled  style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea rows="3" name="current-location" disabled placeholder="Enter your current location..." class="form-control form-control-line"  style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);"></textarea>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <!-- <label class="col-md-12" style="font-weight: bold">Phone Number:</label> -->
                                            <div class="col-md-12">
                                                <input type="text" name="phone-number" disabled placeholder="Enter Phone Number"
                                                    class="form-control form-control-line"  style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!-- <label class="col-sm-12" style="font-weight: bold">Current State</label> -->
                                            <div class="col-sm-12">
                                                <select name="current-state" disabled class="form-select shadow-none form-control form-control-line"  style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    <option value="">Please Select Current State</option>    
                                                    @foreach($allEngineers as $listStates)
                                                        <option value="{{$listStates->stateName}}">{{$listStates->stateName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                <div class="form-group">
                                    <!-- <label class="col-md-12" style="font-weight: bold">City</label> -->
                                    <div class="col-md-12">
                                        <input type="text" name="current-city" disabled placeholder="Enter your current city"
                                            class="form-control form-control-line"  style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary text-white" disabled>Order Ride</button>
                                    </div>
                                </div>
                            </form>
                            @endif

                            @if($orderDetails->assignedEngineer != "")
                                <table class="table table-responsive">
                                    <tbody>
                                            <tr>
                                                <th colspan="6">Engineers Name:</th>
                                                <td> {{ $assignedEngineer->fullname }} </td>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Engineers Phone:</th>
                                                <td> {{ $assignedEngineer->phoneNumber }} </td>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Engineers Email:</th>
                                                <td> {{ $assignedEngineer->email }} </td>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Engineers Address:</th>
                                                <td> {{ $assignedEngineer->address }} </td>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Engineers City of Residence:</th>
                                                <td> {{ $assignedEngineer->city }} </td>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Engineers State:</th>
                                                <td> {{ $assignedEngineer->state }} State</td>
                                            </tr>
                                    </tbody>
                                </table>
                            @endif

                            <!-- <img src="{{asset('customers/assets/img/home.png')}}" alt="" class="home__img"> -->
                            
                            <br><br>
                            
                        </div>   
                        
                    </div>



                    <?php 
                        if($orderDetails->isBookRide == '1') {
                            echo '
                            <center>
                            <div class="col-12 col-lg-8 col-md-10" data-aos="fade-down"
                            data-aos-easing="linear"
                            data-aos-duration="1500">
                            <div class="map-box">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                                        width="100%" height="400" frameborder="0" style="border:0; border-radius: 10px; width: 100%;"
                                        allowfullscreen></iframe><br><br>

                                        <div class="table table-responsive">
                                    <table class="table text-align">
                                   
                                    <tbody>
                                        <!-- <tr>
                                            <th colspan="6">Riders Name:</th>
                                            <td>Usang Edet </td>
                                        </tr> -->
                                        <tr>
                                            <th colspan="6">Vehicle Type:</th>
                                            <td>Suzuki </td>
                                        </tr>
                                        <tr>
                                            <th colspan="6">Vehicle Plate No.:</th>
                                            <td>VX-89-345-AMB </td>
                                        </tr>
                                        <tr>
                                            <th colspan="6">Vehicle Color:</th>
                                            <td>Black </td>
                                        </tr>
                                        ';
                                    
                                        if($orderDetails->status == '0') {
                                            echo "";
                                        }
                                        elseif($orderDetails->status == '1') {
                                            echo '<tr>
                                                    <th colspan="6">Price</th>
                                                    <td><span style="color: green; font-weight: bold;">#'.$orderDetails->deviceFixPrice.'</span> </td>
                                                </tr>';
                                        }
                                        elseif ($orderDetails->status == '2') {
                                            echo "";
                                        } 
                                        else  {
                                            echo "";
                                        } 
                                        echo '<tr>
                                            <th colspan="6">Action:</th>
                                            <td>'; ?>
                                            <form action="{{route('cancle.ride', $orderDetails->remember_token)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <a href="{{route('cancle.ride', $orderDetails->remember_token)}}"><span class="btn btn-success" style="color: white; border-radius: 0;">Approve <i class="fa fa-check"></i></span></a> 
                                            <button class="btn btn-danger" style="color: white; border-radius: 0;">Cancle <i class="fa fa-trash"></i></button>
                                            <?php echo '
                                        </form>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                                </div>
                                </center>';
                        }

                    ?>
                </div>
                
                    </div>



                    
                </div>
            </section>

        </main>

        <script src="https://js.paystack.co/v1/inline.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                                   
        <script>
            Echo.channel('orders')
            .listen('sendPosition', (e) => {
                console.log(e);
            });
        </script>


        <script>
            $('#selectEngineer').change(function () {
                        
                $.ajax({
                    url: "/views/engineer/"+$('#selectEngineer').val(),
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {

                        $('#engineerDetails') .find('tr') .remove() .end().append('\
                                <tr>\
                                    <td>Name:</td>\
                                    <td>'+response.fullname+'</td>\
                                </tr>\
                                <tr>\
                                    <td>Phone Number:</td>\
                                    <td>'+response.phoneNumber+'</td>\
                                </tr>\
                                <tr>\
                                    <td>Email Address:</td>\
                                    <td>'+response.email+'</td>\
                                </tr>\
                                <tr>\
                                    <td>Address:</td>\
                                    <td>'+response.address+'</td>\
                                </tr>\
                                <tr>\
                                    <td>City:</td>\
                                    <td>'+response.city+'</td>\
                                </tr>\
                                <tr>\
                                    <td>State:</td>\
                                    <td>'+response.state+'</td>\
                                </tr>\
                                ');
                                
                                if($('#selectEngineer').val() != '') {
                                    $("#select").css({
                                        display: "block",
                                        visibility: "visible"
                                    });
                                } 
                    }
                });
                

            });
        </script>


        <script>
            $(document).ready(function() {

                load_data();

                functon load_data(query='') {
                    $.ajax({
                        url : "{{URL::to('/view')}}/{{$orderDetails->remember_token}}",
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $('.tbody').html(data);
                        }
                    })
                }

                $('#engineer_assigned').change(function() {
                    $('#hidden_engineers').val($('#engineer_assigned').val());
                });

            });
        </script>

        <script>
            function triggerClick() {
                document.querySelector('#profileImage').click();
            }

            function displayImage(e) {
                if (e.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                        
                    }
                    reader.readAsDataURL(e.files[0]);
                }
            }
        </script>


        <script>

            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);

            console.log($('email-address').val());
            function payWithPaystack(e) {
                e.preventDefault();
                var deviceAmount = {{$orderDetails->deviceFixPrice}}
                

                let handler = PaystackPop.setup({
                key: 'pk_live_56bf056f32417eaab0bafb14fdcf45d4085a12f7', // Replace with your public key
                // key: 'pk_test_046a4a3973d277683a582a0124889681b5b9097d', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: deviceAmount * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function(){
                alert('Window closed.');
                },
                callback: function(response){
                let reference = response.reference;
                console.log(reference);
                // verify Payment
                $.ajax({
                    type: "GET",
                    url: "{{URL::to('customer/verify-payment')}}/{{$orderDetails->remember_token}}/"+reference,
                
                    success: function(response) {
                        console.log(response);
                        
                        if(response[0].status == true) {
                        $('form').prepend(`
                            <h2>${response[0].message}</h2>
                        `);
                        
                        } else {
                        $('').prepend(`
                            <h2>Failed to Verify Payment</h2>
                        `);
                        }
                    }
                });
                }
            });
            handler.openIframe();
            }
            
        </script>


    @endsection
