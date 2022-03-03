@extends('layout')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title">Order for Repairs</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customer Order Details</li>
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
    <div class="col-lg-6 col-xlg-6 col-md-6">
        <div class="card">
            <div class="card-body"> 
            <div class="table-responsive">
                <table class="table ">
                    
                    <tbody>
                        <!-- <tr>
                            <th colspan="6">Name:</th>
                            <td>Michael King </td>
                        </tr>
                        <tr>
                            <th colspan="6">Email:</th>
                            <td>Kingmichael9812@gmail.com </td>
                        </tr>
                        <tr>
                            <th colspan="6">Phone:</th>
                            <td>08108554110 </td>
                        </tr> -->
                        <tr>
                            <th colspan="6">Device Type:</th>
                            <td>Tecno </td>
                        </tr>
                        <tr>
                            <th colspan="6">Model:</th>
                            <td>Tecno 32X </td>
                        </tr>
                        <tr>
                            <th colspan="6">IMIE No.:</th>
                            <td>32458967934 </td>
                        </tr>
                        <tr>
                            <th colspan="6">Complain:</th>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos labore quaerat dolorum inventore odit, amet minus voluptatibus modi officia sint. 
                                Distinctio quidem perspiciatis autem neque animi quo alias quaerat hic! </td>
                        </tr>
                        <tr>
                            <th colspan="6">Current State:</th>
                            <td>Niger </td>
                        </tr>
                        <tr>
                            <th colspan="6">Current Location:</th>
                            <td>Miner </td>
                        </tr>
                        <tr>
                            <th colspan="6">Status:</th>
                            <td><span class="label label-rounded label-primary">Pending</span></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
                
                
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-6 col-xlg-6 col-md-6">
        <div class="card">
            
            <div class="card-body"> 
                <h4 style="font-weight: bold;">Take Action</h4>
            
                <form class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        
                        <div class="col-sm-10">
                            <label class="col-md-12" style="font-weight: bold">Price</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Enter Price in Naira (#)"
                                    class="form-control form-control-line">
                            </div>
                            <div class="col-sm-2 col-md-4" style="padding: 8px;">
                                <button class="btn btn-default">Update Price</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal form-material mx-2">
                    
                    <div class="form-group">
                        <div class="col-sm-10 col-md-12">
                            <label class="col-sm-12 col-md-10" style="font-weight: bold;">Status Update:</label>
                            <div class="col-sm-6 col-md-6">
                                <select class="form-select shadow-none form-control-line">
                                    <option value="0">Select Status</option>
                                    <option>Approve</option>
                                    <option>Done</option>
                                    <option>Delivered</option>
                                    <option>Decline</option>
                                </select>
                            </div>
                            <div class="col-sm-2 col-md-4" style="padding: 8px;">
                                <button class="btn btn-default">Update Status</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
                
            </div>

        </div>
    </div>
    <!-- Column -->

</div>
@endsection
