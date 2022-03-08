@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Add Engineers</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Engineers for Work</li>
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
        <!-- <div class="col-lg-4 col-xlg-3 col-md-5"> -->
                        <!-- <div class="card">
                            <div class="card-body">
                                <form action="" method="post" class="form-horizontal form-material mx-2">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Engieer Name:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="text" name="engineer_name" value="{{old('engineer_name')}}" placeholder="Enter Engineers Name"
                                                class="form-control form-control-line">
                                        </div>
                                        @error('engineer_name') <div class="alert alert-danger" class="msg">{{$message}}</div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Engieer Email:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="email" name="engineer_email" value="{{old('engineer_email')}}" placeholder="Enter Engineers Email"
                                                class="form-control form-control-line">
                                        </div>
                                        @error('engineer_email') <div class="alert alert-danger" class="msg">{{$message}}</div> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Engieer Phone Number:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="text" name="engineer_phone" value="{{old('engineer_phone')}}" placeholder="Add List of Possible Problems"
                                                class="form-control form-control-line">
                                        </div>
                                        @error('engineer_phone') <div class="alert alert-danger" class="msg">{{$message}}</div> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Engieer Address:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="text" name="engineer_address" value="{{old('engineer_address')}}" placeholder="Enter Engineer address or Location"
                                                class="form-control form-control-line">
                                        </div>
                                        @error('engineer_address') <div class="alert alert-danger" class="msg">{{$message}}</div> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Engieer State:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                        <select name="engineer_state" value="{{old('engineer_state')}}" class="form-select shadow-none form-control-line">
                                            <option value="">Select Current State</option>
                                            <option value="Kwara">Kwara</option>
                                            <option value="Osun">Osun</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Plateu">Plateu</option>
                                            <option value="Sokoto">Sokoto</option>
                                            <option value="FCT">FCT</option>
                                        </select>
                                        </div>
                                        @error('engineeraddress') <div class="alert alert-danger" class="msg">{{$message}}</div> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white"> <i class="fas fa-plus"></i> Add Engineer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- Column -->
                   
        <!-- Column -->
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 style="font-weight: bold;">List of Engineers</h4>
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
                                <!-- <th scope="col">#</th> -->
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
                                            <!-- <a href="{{route('admin.editAddEngineer', [$EngineerDetails->remember_token, $EngineerDetails->fullname])}}">
                                                
                                                <button class="btn btn-primary" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button>                                       
                                            </a> -->
                                        </td>   
                                        <td>
                                            <form action="{{route('admin.deleteEngineer', [$EngineerDetails->remember_token, $EngineerDetails->fullname])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" style="color: white; border-radius: 50%;"><i class="fa fa-trash"></i></button>
                                            </form>
                                            
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
