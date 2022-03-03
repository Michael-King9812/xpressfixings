@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Add More State</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add State</li>
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
        <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.addStateStore')}}" method="post" class="form-horizontal form-material mx-2">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Add State:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="text" name="add_state" value="{{old('add_state')}}" placeholder="Add More States"
                                                class="form-control form-control-line">
                                        </div>
                                        @error('add_state') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white"> <i class="fas fa-plus"></i> Add State</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body"> 
                    <h4 style="font-weight: bold;">List of All States</h4>
                    @if(Session::has('success'))
                        <div id="msg" class="alert alert-success">{{ Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div id="msg" class="alert alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                    
                <div class="table table-responsive table-striped table-hover">
                    <table class="table">
                    <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">States</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($allStates as $listStates)
                                    <tr>
                                        <td>{{$listStates->stateName}}</td>
                                        <td>
                                        <form action="{{route('admin.deleteState', $listStates->stateName)}}" method="post">
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
