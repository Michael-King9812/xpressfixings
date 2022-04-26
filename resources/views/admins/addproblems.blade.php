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
            Manage Possible Problems
        </h1>
        <!-- <p class="header-subtitle">Your sales increased by 4.25% and revenue increased by 5.12%.</p> -->
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="#" class="mr-1">
                        <i class="align-middle" data-feather="refresh-cw"></i>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <i class="align-middle" data-feather="more-vertical"></i>
                        </a>

                        <!-- <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <h5 class="card-title mb-0">Total Engineers (<span style="color: red;">{{App\Models\PossibleProblems::count()}})</span></h5>
                
                @if(Session::has('success'))
                    <div id="msg" style="padding: 8px; text-align: center;" class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div id="msg" style="padding: 8px; text-align: center;" class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card ml-5">
                        <div class="card-body">
                            <form action="{{route('admin.addProblemsStore')}}" method="post" class="form-horizontal form-material mx-2">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12" style="font-weight: bold;">Add Problem:</label>
                                    <div class="col-md-12" style="font-weight: bold;">
                                        <input type="text" name="add_problem" value="{{old('add_problem')}}" placeholder="Add List of Possible Problems"
                                            class="form-control form-control-line">
                                    </div>
                                    @error('add_problem') <div class="text-danger">{{$message}}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" style="font-weight: bold;">Add Problem Price:</label>
                                    <div class="col-md-12" style="font-weight: bold;">
                                        <input type="text" name="problem_price" value="{{old('problem_price')}}" placeholder="Add problem fixing price"
                                            class="form-control form-control-line">
                                    </div>
                                    @error('problem_price') <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success text-white"> <i class="fas fa-plus"></i> Add Problem</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mr-5">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables-basic" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th >Problems</th>
                                            <th >Price</th>
                                            <th class="align-middle" width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($possibleProblems as $possibleProblem)
                                            <tr>
                                                <td class="align-middle">{{ $possibleProblem->possibleProblems }}</td>
                                                <td class="align-middle">#{{ $possibleProblem->price }}</td>
                                                <td>
                                                    
                                                    <form action="{{route('admin.deleteProblem', [$possibleProblem->remember_token, $possibleProblem->possibleProblems])}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route('admin.editProblem', [$possibleProblem->possibleProblems, $possibleProblem->remember_token])}}"><button class="btn btn-primary" type="button" style="color: white; border-radius: 50%;"><i class="fa fa-eye"></i></button></a>
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
            </div>
            
        </div>
    </div>

@endsection