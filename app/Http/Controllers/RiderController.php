<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function __construct() {
        $this->middleware('UserLoginId');
    }

    public function index() {
        return view('riders.welcome');
    }

    public function profile() {
        return view('riders.profile');
    }

    public function orderdetails() {
        return view('riders.orderdetails');
    }
}
