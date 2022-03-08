@extends('layout')
<!-- 
    // 0 = pending
    // 1 = delivered
    // 2 = done
    // 3 = cancled
    // 4 = approved 
-->
@section('main')

<main class="l-main">

            <section class="home" id="home">
                

                    <div class="container col-md-9" style="margin-top: 100px;">
                        <div class="row">
                            
                        <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-6">
                            <h6 class="section-title" style="text-align: left; font-weight: bold; font-size: 25px;">Order for Repairs</h6><br>
                                <div class="car" style="padding: 13px 8px;">
                                    <form action="{{route('customer.orderfixStore')}}" method="post" class="form-horizontal form-material mx-2">
                                        @csrf

                        
                                        @if(Session::has('fail'))
                                            <div class="alert alert-success">{{Session::get('fail')}}</div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{$data->fullname}}"
                                                    name="fullname" class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12" style="font-weight: bold; font-size: 12px;">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" name="email" placeholder="{{$data->email}}"
                                                    class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);" name="example-email"
                                                    id="example-email" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="+234 123 456 7890"
                                                    name="phonenumber" value="{{old('phonenumber')}}" class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    @error('phonenumber') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12" style="font-weight: bold; font-size: 12px;">Device Type</label>
                                            <div class="col-sm-12">
                                                <select name="deviceType" value="{{old('deviceType')}}" class="form-select shadow-none form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    <option value="">Choose Problem Type</option>
                                                    <option>Phone</option>
                                                    <option>Laptop</option>
                                                    
                                                </select>
                                                
                                            </div>
                                            @error('deviceType') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">Phone Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Enter Type of Phone"
                                                    name="phonetype" value="{{old('phonetype')}}" class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    @error('phonetype') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">Device Model</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Enter your current city"
                                                    name="model" value="{{old('model')}}" class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    @error('Model') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">IMIE / Serial Number</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{old('imieno')}}" name="imieno" placeholder="Enter IMIE Number/Serial Number"
                                                    class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    @error('imieno') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12" style="font-weight: bold; font-size: 12px;">Select Device Fault</label>
                                            <div class="col-sm-12">
                                                <select name="problemcategory" value="{{old('problemcategory')}}" class="form-select shadow-none form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    <option value="">Choose Problem Type</option>
                                                    <option value="others">Others</option>
                                                    @foreach($allProblems as $all)
                                                        <option>{{$all->possibleProblems}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                
                                            </div>
                                            @error('problemcategory') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">Complain</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" value="{{old('')}}" name="complain" placeholder="Enter the Phone fault and complains here describing the real fault of your device intensively..." class="form-control form-control-line" style="padding: 5px 14px;  border: none; box-shadow: 0 1px 2px rgba(0,0,0,0.1);"></textarea>
                                            </div>
                                            @error('complain') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12" style="font-weight: bold; font-size: 12px;">Current State</label>
                                            <div class="col-sm-12">
                                                <select name="currentstate" id="currentState" value="{{old('currentstate')}}" class="form-select shadow-none form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    <option value="">Select Current State</option>
                                                    @foreach($allStates as $listStates)
                                                        <option value="{{$listStates->stateName}}">{{$listStates->stateName}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('currentstate') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                                <p style="color: orange; font-size: 13px; padding: 8px 4px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> We only Operate within the current listed state for now.</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="font-weight: bold; font-size: 12px;">City</label>
                                            <div class="col-md-12">
                                                <input type="text" value="{{old('currentcity')}}" name="currentcity" placeholder="Enter your current city"
                                                    class="form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                @error('currentcity') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="col-sm-12" style="font-weight: bold; font-size: 12px;">Select Engineer</label>
                                            <div class="col-sm-12">
                                                <select name="selectEngineer" id="selectEngineer" placeholder="Choose Engineer" value="{{old('selectEngineer')}}" class="form-select shadow-none form-control form-control-line" style="padding: 10px 14px;  border: none; padding; 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                                    <option id="engineerOptions" value="">Choose Engineer</option>    
                                                    
                                                </select>
                                                
                                                @error('selectEngineer') <p style="color: red; font-size: 11px; padding: 8px 4px;">{{$message}} </p> @enderror
                                                
                                                <table class="table">
                                                    <br>
                                                    <tbody id="engineerDetails" class="tbody">
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> -->


                                        


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success text-white">Order Repair</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            
                            </div>
                            
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-6">
                                <!-- <img src="{{asset('customers/assets/img/home.png')}}" alt="" class="home__img"> -->
                                <h6 class="section-title" style="text-align: left; font-weight: bold; font-size: 25px;">Order History</h6>

                <table class="table table-borderless table-responsive">
                    @if(Session::has('success'))
                        <div class="alert alert-success" style="color: green; font-weight: bold;">{{Session::get('success')}}</div>
                    @endif
                    @if($orderDetails)
                    
                        <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Current State</th>
                            <th scope="col">Current City</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($orderDetails as $orderdetail)
                                <tr>
                                    <!-- 
                                        // 0 = pending
                                        // 1 = delivered
                                        // 2 = done
                                        // 3 = cancled
                                        // 4 = approved 
                                    -->

                                    <td>{{ $orderdetail->email }}</td>
                                    <td>{{ $orderdetail->phone }}</td>
                                    <td><span class="label label-rounded label-primary">
                                    <?php    
                                        if($orderdetail->status == '0') {
                                            echo "<p style='color: orange; font-weight: bold;'>Pending...</p>";
                                        }
                                        elseif($orderdetail->status == '1') {
                                            echo "<p style='color: blue; font-weight: bold;'>Delivered</p>";
                                        }
                                        elseif ($orderdetail->status == '2') {
                                            echo "<p style='color: darkblue; font-weight: bold;'><i class='fa fa-check-double'></i> Done</p>";
                                        } 
                                        elseif ($orderdetail->status == '3') {
                                            echo "<p style='color: red; font-weight: bold;'>Cancelled</p>";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1' && $orderdetail->approvalStatus == '1') {
                                            echo "<p style='color: orange; font-weight: bold;'>Waiting...</p>'";
                                        }
                                        elseif ($orderdetail->status == '4' && $orderdetail->approval == '1') {
                                            echo "<p style='color: indigo; font-weight: bold;'>Approval Needed</p>";
                                        }
                                        elseif ($orderdetail->status == '4') {
                                            echo "<p style='color: purple; font-weight: bold;'>Fixing...</p>";
                                        }
                                        
                                        else  {
                                            echo "<p style='color: orange; font-weight: bold;'>Pending...</p>'";
                                        }
                                    ?> 
                                    </span></td>
                                    <td>{{ $orderdetail->currentState }}</td>
                                    <td>{{ $orderdetail->currentCity }}</td>
                                    <td>
                                        <a href="{{route('customer.orderdetails', $orderdetail->remember_token)}}"><button class="btn btn-primary" style="color: white; border-radius: 50%; cursor: pointer;"><i class="fa fa-eye"></i></button></a>
                                    </td>
                                    <td>
                                        <!-- <a href=""><button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button></a> -->
                                    </td>
                                </tr>
                            @endforeach
                            

                        </tbody>
                    @else
                        <center><h3>No Order yet!</h3></center>
                    @endif
                  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
            <script type='text/javascript'>

                // $(document).ready(function () {

                    // $('#currentState').change(function (){
                    //     $.ajax({
                    //         url: "/views/"+$('#currentState').val(),
                    //         type: "GET",
                    //         dataType: 'json',
                    //         success: function(response) {
                                
                    //             console.log(response);

                    //             let engineerState = "";
                    //             for(let i = 0; i < response.length; i++) {
                    //                 engineerState += '<option id="option" value="'+response[i].remember_token+'">'+response[i].fullname+'</option>';
                    //             }
                               
                    //                 $('#selectEngineer') .find('#option') .remove() .end().append(engineerState);
                                
                                
                    //         }
                    //     });
                    // });


                    // $('#selectEngineer').change(function () {
                        
                    //     $.ajax({
                    //         url: "/views/engineer/"+$('#selectEngineer').val(),
                    //         type: 'GET',
                    //         dataType: 'json',
                    //         success: function (response) {
                                
                    //             $('#engineerDetails') .find('tr') .remove() .end().append('\
                    //                     <tr>\
                    //                         <td>Name:</td>\
                    //                         <td>'+response.fullname+'</td>\
                    //                     </tr>\
                    //                     <tr>\
                    //                         <td>Phone Number:</td>\
                    //                         <td>'+response.phoneNumber+'</td>\
                    //                     </tr>\
                    //                     <tr>\
                    //                         <td>Email Address:</td>\
                    //                         <td>'+response.email+'</td>\
                    //                     </tr>\
                    //                     <tr>\
                    //                         <td>Address:</td>\
                    //                         <td>'+response.address+'</td>\
                    //                     </tr>\
                    //                     <tr>\
                    //                         <td>City:</td>\
                    //                         <td>'+response.city+'</td>\
                    //                     </tr>\
                    //                     <tr>\
                    //                         <td>State:</td>\
                    //                         <td>'+response.state+'</td>\
                    //                     </tr>\
                    //                     ');
                    //         }
                    //     });
                        

                    // });
                // });

            </script>

    @endsection