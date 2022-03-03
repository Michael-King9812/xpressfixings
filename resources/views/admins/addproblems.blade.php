@extends('admins/layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Add Possible Device Problems</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Problems</li>
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
                                <form action="{{route('admin.addProblemsStore')}}" method="post" class="form-horizontal form-material mx-2">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Add Problem:</label>
                                        <div class="col-md-12" style="font-weight: bold;">
                                            <input type="text" name="add_problem" value="{{old('add_problem')}}" placeholder="Add List of Possible Problems"
                                             class="form-control form-control-line">
                                        </div>
                                        @error('add_problem') <div class="alert alert-danger">{{$message}}</div> @enderror
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
                    <!-- Column -->
                   
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body"> 
                    <h4 style="font-weight: bold;">List of Possible Problems</h4>
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
                                <th scope="col">Possible Problems</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($possibleProblems as $possibleProblem)
                                <tr>
                                    <td>{{ $possibleProblem->possibleProblems }}</td>
                                    
                                        <td>
                                            <form action="{{route('admin.deleteProblem', [$possibleProblem->remember_token, $possibleProblem->possibleProblems])}}" method="post">
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
