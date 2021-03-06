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
use App\Models\Orderdetail;
use App\Models\Engineer;
use App\Models\State;
use App\Models\PossibleProblems;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('UserLoginId');
    }

    public function index()
    {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('admins.dashboard', [
            'data' => $data,
        ]);
    }

    public function customers() {
        
        $data = array();
        $orderDetails = orderdetail::orderBy('id', 'desc')->get();
        
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('admins.managecustomers', compact('data','orderDetails'));
    }

    public function allPending() {
        
        $data = array();
        $orderDetails = orderdetail::where('status','=','4')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('admins.allpendingdorders', compact(['data','orderDetails']));
    }

    public function allDone() {
        
        $data = array();
        $orderDetails = orderdetail::where('status','2')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = User::where('id', Session::get('UserLoginId'))->first();
        }
        return view('admins.allDone', [
            'data' => $data,
            'orderDetails' => $orderDetails
        ]);
    }

    public function allAwaitingResponse() {
        $data = array();
        $orderDetails = orderdetail::where('status','2')->orderBy('id', 'desc')->get();

        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('admins.allapprovedorder', compact(['data','orderDetails']));
    }

    public function engineers() {
        $data = array();

        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('admins.manageengineers', compact('data'));
    }
    
    public function approveEngineer() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $addEngineer = Engineer::where('status','0')->orderBy('id', 'desc')->get();

        return view('admins.approveengineers', compact('data','addEngineer'));
    }

    public function approveEngineerView($token) {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        $engineerDetails = Engineer::where('remember_token','=',$token)->first();

        return view('admins.approve_engineer_details', compact('data','engineerDetails'));
    }


public function approveEngineerUpdate(Request $request, $token) {
        
        $engineerDetails = Engineer::where('remember_token','=',$token)->first();
     

        $engineerDetails->status = "1"; 

        $approvedEngineer = $engineerDetails->save();

        if ($approvedEngineer) {
            return redirect('admin/approve/engineer')->with('success', $engineerDetails->fullname.' approved as an Engineer successfully.');
        } else {
            return redirect()->back()->with('fail', 'Engineer approval failed.');
        }
    }


    public function riders() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        return view('admins.manageriders', compact('data'));
    }

    public function allCustomers() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        
        $users = User::all()->where('category','=', 'customer');

        return view('admins.allcustomers', compact('data','users'));
    }

    public function allEngineers() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('admins.allengineers', compact('data'));
    }

    public function allRiders() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('admins.allriders', compact('data'));
    }

    public function profile() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        return view('admins.profile', compact('data'));
    }

    public function singlePages($token)
    {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        
        $userOrderDetails = Orderdetail::where('remember_token',$token)->first();
        $state = $userOrderDetails->currentState;

        $allEngineers = Engineer::where('state',$state)->orderBy('id', 'desc')->get();
        $assignedEngineer = Engineer::where('remember_token', $userOrderDetails->assignedEngineer)->first();
        
        return view('admins.singlepage', compact('data', 'allEngineers','userOrderDetails','assignedEngineer'));
    }

    public function addProblems() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $possibleProblems = PossibleProblems::all();

        return view('admins.addproblems', compact('data','possibleProblems'));
    } 


    public function editProblem($problem, $token)
    {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $possibleProblems = PossibleProblems::all();
        $problem = PossibleProblems::where('possibleProblems', $problem)
                                    ->where('remember_token', $token)
                                    ->first();
        
                                    
        return view('admins.editProblem', compact('data', 'problem','possibleProblems'));
    }
    
    
    public function viewEngineers() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $viewEngineers = Engineer::where('status','=','1')->orderBy('id', 'desc')->get();

        return view('admins.manageengineers', compact('data','viewEngineers'));
    } 

    public function viewEngineersStore(Request $request)
    {
        
        $request->validate([
            'engineer_name'=>'required',
            'engineer_email'=>'required',
            'engineer_phone'=>'required',
            'engineer_address'=>'required',
            'engineer_state'=>'required',
        ]);

        $engineerName = $request->input('engineer_name');
        $engineerEmail = $request->input('engineer_email');
        $engineerPhone = $request->input('engineer_phone');
        $engineerAddress = $request->input('engineer_address');
        $engineerState = $request->input('engineer_state');
        $engineerToken = $request->_token;


        $engineerModel = new Engineer();

        $engineerModel->fullname = $engineerName;
        $engineerModel->phoneNumber = $engineerPhone;
        $engineerModel->email = $engineerEmail;
        $engineerModel->address = $engineerAddress;
        $engineerModel->state = $engineerState;
        $engineerModel->remember_token = $engineerToken;

        $isAddEngineer = $engineerModel->save();

        
        if ($isAddEngineer) {
            return redirect()->back()->with('success', $engineerName.' added Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to Add Engineer.');
        }
    }

    public function editAddEngineer(Request $request, $token, $engineersName)
    {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $addEngineer = Engineer::all()->where('remember_token',$token);
        return view('admins.editEngineerDetails', compact('data','addEngineer'));
    }
    
    public function editAddEngineerStore(Request $request, $token, $engineersName)
    {
        $request->validate([
            'engineer_name'=>'required',
            'engineer_email'=>'required',
            'engineer_phone'=>'required',
            'engineer_address'=>'required',
            'engineer_state'=>'required',
        ]);

        $engineerName = $request->input('engineer_name');
        $engineerEmail = $request->input('engineer_email');
        $engineerPhone = $request->input('engineer_phone');
        $engineerAddress = $request->input('engineer_address');
        $engineerState = $request->input('engineer_state');
        $engineerToken = $request->_token;


        $engineerModel = Engineer::where('remember_token',$token);

        $engineerModel->fullname = $engineerName;
        $engineerModel->phoneNumber = $engineerPhone;
        $engineerModel->email = $engineerEmail;
        $engineerModel->address = $engineerAddress;
        $engineerModel->state = $engineerState;
        $engineerModel->remember_token = $engineerToken;

        $isAddEngineer = $engineerModel->save();

        
        if ($isAddEngineer) {
            return redirect()->back()->with('success', $engineerName.' Edited Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to Edit Engineer Details.');
        }
    }

    public function deleteEngineer($token, $engineerName)
    {
        $engineerDelete = Engineer::where('remember_token', $token)->first();

        $deleteEngineer = \DB::table('engineers')
        ->where('remember_token', $token)
        ->update([
             'status'=> '0',
        ]);

        if ($deleteEngineer) {
            return redirect()->back()->with('success', $engineerName.' Deleted Successfully.');
        } else {
            return redirect()->back()->with('fail', 'An error occured in deleting engineer.');
        }
       
    }

    public function storePossibleProblem(Request $request)
    {
        $request->validate([
            'add_problem'=>'required',
            'problem_price'=>'required'
        ]); 

        $possibleProblems = new PossibleProblems();
        $problem = $request->input('add_problem');
        $problemPrice = $request->input('problem_price');

        $possibleProblems->possibleProblems = $problem;
        $possibleProblems->price = $problemPrice;
        $possibleProblems->remember_token = Str::random(32);

        $addProblem = $possibleProblems->save();

        if ($addProblem) {
            return redirect()->back()->with('success', $request->input('add_problem').' added Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to Add Possible Problem.');
        }
    }
    
    public function updatePossibleProblem(Request $request, $problem, $token)
    {
        $request->validate([
            'add_problem'=>'required',
            'problem_price'=>'required'
        ]); 

        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $addProblem = \DB::table('possible_problems')
        ->where('possibleProblems',$problem)
        ->where('remember_token', $token)
        ->update([
             'possibleProblems'=> $request->add_problem,
             'price' => $request->problem_price,
        ]);

        $possibleProblems = PossibleProblems::all();
        

        if ($addProblem) {
            return view('admins.addproblems', compact('data', 'possibleProblems'))->with('success', $request->input('add_problem').' Updated Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to Update Possible Problem.');
        }
    }


    public function deleteProblem($token, $problem)
    {

        $problemDelete = PossibleProblems::where('remember_token', $token)->first();

        $deleteProblem = $problemDelete->delete();

        if ($deleteProblem) {
            return redirect()->back()->with('success', $problem.' Deleted Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Problem in Deleting Data.');
        }
    }

    public function deleteState($id)
    {
        
        // $deleteState = State::findOrFail($id)->delete();
        $deleteState = State::find($id)->delete();

        if ($deleteState) {
            return redirect()->back()->with('success', $problem.' Deleted Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Problem in Deleting Data.');
        }
       
    }

    public function addStates() {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $allStates = State::all();

        return view('admins.addstates', compact('data','allStates'));
    }   

    public function storeState(Request $request)
    {
        $request->validate([
            'add_state'=>'required',
        ]);

        $addState = new State();
        $state = $request->input('add_state');

        $addState->stateName = $state;

        $addingState = $addState->save();

        if ($addingState) {
            return redirect()->back()->with('success', $request->input('add_state').' added Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Failed to Add Possible Problem.');
        }
    }


    public function updatePrice(Request $request, $token)
    {
        $request->validate([
            'fixingprice'=>'required'
        ]);
        
        $fixPrice = Orderdetail::where('remember_token', $token)->first();
     

        $fixPrice->status = "4"; 
        $fixPrice->approval = "1";
        $fixPrice->deviceFixPrice = $request->input('fixingprice');

        $updateFixPrice = $fixPrice->save();

        if ($updateFixPrice) {
            return redirect()->back()->with('success', 'Order Approved Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Order Approval Failed.');
        }
        
    }

    // public function verifyPayment($token)
    // {
        
    //     $verify = Orderdetail::where('remember_token', $token)->first();
     
    //     $verify->approvalStatus = "2";
    //     $verify->approval = "2";

    //     $verifyPayment = $verify->save();

    //     if ($verifyPayment) {
    //         return redirect()->back()->with('success', 'Payment Verified Successfully.');
    //     } else {
    //         return redirect()->back()->with('fail', 'Payment Verification Failed.');
    //     }
        
    // }

    public function fixingDone($token)
    {
        dd("Hello");
        $order = Orderdetail::where('remember_token', $token)->first();
        
        $order->status = "2";    

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Fixing Done Sent to Customer Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Fixing Done Failed so send.');
        }
    }
   

    // public function deleteOrder($token)
    // {
       
    //     $data = array();
    //     if (Session::has('UserLoginId')) {
    //         $data = User::where('id','=', Session::get('UserLoginId'))->first();
    //     }

    //     $order = Orderdetail::where('remember_token', $token)->first();

    //     $order->status = "3";        

    //     $ordered = $order->save();

    //     if ($ordered) {
    //         return redirect()->back()->with('success', 'Order Deleted Successfully.');
    //     } else {
    //         return redirect()->back()->with('fail', 'Order Decline Failed.');
    //     }
        
       
    // }

    // public function aprroveOrder($token)
    // {
       
    //     $data = array();
    //     if (Session::has('UserLoginId')) {
    //         $data = User::where('id','=', Session::get('UserLoginId'))->first();
    //     }

    //     $order = Orderdetail::where('remember_token', $token)->first();

    //     $order->status = "4";   
    //     $ordered = $order->save();

    //     if ($ordered) {
    //         return redirect()->back()->with('success', 'Order Declined Successfully.');
    //     } else {
    //         return redirect()->back()->with('fail', 'Order Decline Failed.');
    //     }
        
        
    // }
}