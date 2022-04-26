<?php

// 0 = pending
// 1 = delivered
// 2 = done
// 3 = cancled
// 4 = approved


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Engineer;
use App\Models\Orderdetail;

class EngineerController extends Controller
{
    public function __construct() {
        $this->middleware('UserLoginId');
    }

    public function index() {
        $data = array();
                
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('engineers.dashboard', compact(['data']));
    }

    public function orders() {
        $data = array();
                
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }

        $orderDetails = orderdetail::where('assignedEngineer',$data->remember_token)->orderBy('id', 'desc')->get();

        return view('engineers.index', compact(['data','orderDetails']));
    }

    public function profile() {
        $data = array();
                
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('engineers.profile', compact('data'));
    }

    public function orderdetails() {
        return view('engineers.orderdetails');
    }

    public function customers() {
        
        $data = array();
        
        
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }

        $orderDetails = orderdetail::where('assignedEngineer', $data->remember_token)->orderBy('id', 'desc')->get();

        return view('engineers.managecustomers', compact('data','orderDetails'));
    }



    public function singlePages($token)
    {
                
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        
        $userOrderDetails = Orderdetail::where('remember_token',$token)->first();
        $state = $userOrderDetails->currentState;

        $allEngineers = Engineer::where('state',$state)->orderBy('id', 'desc')->get();
        
        return view('engineers.singlepage', compact('data', 'allEngineers','userOrderDetails'));
    }


    public function newOrders() {
        $data = array();
        
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        $orderDetails = orderdetail::where('status','=','4')
                ->where('assignedEngineer', $data->remember_token)->orderBy('id', 'desc')->get();
        return view('engineers.neworders', compact(['data','orderDetails']));
    }

    public function doneOrders() {
        $data = array();
        
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        $orderDetails = orderdetail::where('status','=','2')
                ->where('assignedEngineer', $data->remember_token)->orderBy('id', 'desc')->get();
        return view('engineers.alldone', compact(['data','orderDetails']));
    }


    public function verifyPayment($token)
    {
        
        $verify = Orderdetail::where('remember_token', $token)->first();
     
        $verify->approvalStatus = "2";
        $verify->approval = "2";

        $verifyPayment = $verify->save();

        if ($verifyPayment) {
            return redirect()->back()->with('success', 'Payment Verified Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Payment Verification Failed.');
        }
        
    }

    public function deleteOrder($token)
    {
       
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }

        $order = Orderdetail::where('remember_token', $token)->first();

        $order->status = "3";        

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Order Deleted Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Order Decline Failed.');
        }
        
       
    }

    public function aprroveOrder($token)
    {
       
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }

        $order = Orderdetail::where('remember_token', $token)->first();

        $order->status = "4";
        $order->approval = "1";   
        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Order Declined Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Order Decline Failed.');
        }
        
        
    }



    
    // public function updatePrice(Request $request, $token)
    // {
    //     $request->validate([
    //         'fixingprice'=>'required'
    //     ]);
        
    //     $fixPrice = Orderdetail::where('remember_token', $token)->first();
     

    //     $fixPrice->status = "4"; 
    //     $fixPrice->approval = "1";
    //     $fixPrice->deviceFixPrice = $request->input('fixingprice');

    //     $updateFixPrice = $fixPrice->save();

    //     if ($updateFixPrice) {
    //         return redirect()->back()->with('success', 'Order Approved Successfully.');
    //     } else {
    //         return redirect()->back()->with('fail', 'Order Approval Failed.');
    //     }
        
    // }








    
    public function allPending() {
        
        $data = array();
        $orderDetails = orderdetail::where('status','=','0')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('engineers.allpendingdorders', compact(['data','orderDetails']));
    }

    public function allDone() {
        
        $data = array();
        $orderDetails = orderdetail::where('status','4')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('engineers.allapprovedorder', compact(['data','orderDetails']));
    }

    public function allAwaitingResponse() {
        $data = array();
        $orderDetails = orderdetail::where('status','2')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = Engineer::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('engineers.allapprovedorder', compact(['data','orderDetails']));
    }


    public function fixingDone($token)
    {
        $order = Orderdetail::where('remember_token', $token)->first();
        
        $order->status = "2";    

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Fixing Done Sent to Customer Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Fixing Done Failed so send.');
        }
    }

}
