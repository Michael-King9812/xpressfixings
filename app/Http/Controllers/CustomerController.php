<?php

// ====STATUS DOCUMENTATION====

// 0 = pending
// 1 = delivered
// 2 = done
// 3 = cancled
// 4 = approved



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\CustomAuthController;
use Session;
use App\Models\User;
use App\Models\State;
use App\Models\Orderdetail;
use App\Models\PossibleProblems;
use App\Events\SendPosition;
use App\Models\Engineer;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('UserLoginId');
    }

    public function indexs($state = "osun") {
        $data = array();
        $orderDetails = orderdetail::all()->where('user_id','=', Session::get('UserLoginId'));
        $allProblems = PossibleProblems::all();
        $allStates = State::all();
        $allEngineers = Engineer::where('state',$state)->get();

        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }
        
        return view('customers.xpress', compact(['data','orderDetails', 'allEngineers', 'allProblems','allStates']));
    }


    public function profile() {
        return view('customers.profile');
    }
    
    public function paystackPayment() {
        return view('customers.payment');
    }

    public function verify($token, $reference) {
       
        // $sec = "sk_live_8a2282d554a7c85e4f062a6c15e4179b577de832";
        $sec = "sk_test_9f8d7995f83cafc99b6a36b21a7108fb3049eaf7";
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,

            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,

            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $sec",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl); 
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $new_data = json_decode($response);


            $order = Orderdetail::where('remember_token', $token)->first(); 
  
            $order->approvalImage = 'storage\Payment_Proof_Upload_Images\paid\paid-g21daab019_640.png'; 
            $order->approvalStatus = '2';
            $order->approval = '2';

            $ordered = $order->save();

            if ($ordered) {
                return redirect()->back()->with('success', 'Payment and Approval Successfully.');
            } else {
                return redirect()->back()->with('fail', 'Payment and Approval Failed.');
            }
            return [$new_data];
        }
        // return $reference;
    }


    public function orderdetailss($token) {
        $data = array();
        $orderDetails = Orderdetail::where('remember_token', $token)->first();
        $allStates = State::all();

        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $state = $orderDetails->currentState;

        $allEngineers = Engineer::where('state',$state)->get();
        $assignedEngineer = Engineer::where('remember_token', $orderDetails->assignedEngineer)->first();

        return view('customers.orderdetailss', compact(['data','allEngineers','orderDetails','assignedEngineer','allEngineers']));
    }


    public function getEngineerDetails(Request $request)
    {
        $engineersData = Engineer::where('remember_token', $request->engineers)->first();
        return response()->json($engineersData);
    }

    public function getCustomerCity($state)
    {
        $allEngineers = Engineer::where('state',$state)->get();
        return response()->json($allEngineers);
    }

    public function getEngineersByState($state)
    {
        $engineersData = Engineer::where('state', $state)
                    ->where('status','=','1')->get();
        return response()->json($engineersData);
    }



    public function orderdetailsEngineerState($engineerToken = 0) {
        
        $allEngineers['data'] = Engineer::orderby('id','asc')
                                ->select('fullname','phoneNumber','email','address','state','remember_token')
                                ->where('remember_token', $engineerToken)->get();

        return response()->json($allEngineers);
    }


    public function orderfixStore(Request $request)
    {
        $request->validate([
            'phonenumber' => 'required',
            'phonetype' => 'required',
            'deviceType' => 'required',
            'imieno' => 'required',
            'model' => 'required',
            'complain' => 'required',
            'problemcategory' => 'required',
            'currentstate' => 'required',
            'currentcity' => 'required',
        ]);

        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $orderId = Orderdetail::latest()->take(1)->first();
        $fullName = $data->fullname;
        $email = $data->email;



        $user_id = $data->id;
        $phoneNumber = $request->input('phonenumber');
        $phoneType = $request->input('phonetype');
        $deviceType = $request->input('deviceType');
        $model = $request->input('model');
        $problemCategory = $request->input('problemcategory');
        $imieNo = $request->input('imieno');
        $complain = $request->input('complain');
        $currentState = $request->input('currentstate');
        $currentCity = $request->input('currentcity');


        $order = new Orderdetail();
        $order->fullName = $fullName;
        $order->email = $email;
        $order->user_id = $user_id;
        $order->phone = $phoneNumber;
        $order->deviceType = $deviceType;
        $order->model = $model;
        $order->imieNo = $imieNo;
        $order->complain = $complain;
        $order->status = "0";
        $order->problemCategory = $problemCategory;
        $order->currentCity = $currentCity;
        $order->currentState = $currentState;
        $order->remember_token = Str::random(32);

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Device repair fix order placed Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Device repair fix order placed Failed.');
        }
        
        
    }

    public function uploadProofOfPayment(Request $request, $token)
    {
        $request->validate([
            'proof_upload_image'=>'required | image',
        ]);

        $uploadImagePath = 'storage/'.$request->file('proof_upload_image')->store('Payment_Proof_Upload_Images', 'public');

        // $order = Orderdetail::where('remember_token', $token)->first();
        $order = Orderdetail::where('remember_token', $token)->first(); 
  
        $order->approvalImage = $uploadImagePath; 
        $order->approvalStatus = '1';

        $ordered = $order->save();
        // dd("Your Validation is successful");

        if ($ordered) {
            return redirect()->back()->with('success', 'Proof Uploadded Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Proof of Payment Upload Failed.');
        }

    }



    public function orderRide(Request $request, $token)
    {
        $request->validate([
            // 'idName' => 'required',
            'current-location' => 'required',
            'phone-number' => 'required',
            'current-state' => 'required',
            'current-city' => 'required',
        ]);

        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $orderId = Orderdetail::where('remember_token', $token)->first();
        $user_id = $data->id;
        $phoneNumber = $request->input('phone-number');
        $currentLocation = $request->input('current-location');
        $currentCity = $request->input('current-city');
        $currentState = $request->input('current-state');



        $order = new Orderdetail();       
        $order->activePhoneNumber = $phoneNumber;
        $order->rideCurrentLocation = $currentLocation;
        $order->rideCurrentCity = $currentCity;
        $order->rideCurrentState = $currentState;
        $order->isBookRide = "0";

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Device repair fix order placed Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Device repair fix order placed Failed.');
        }
        
        
    }


    public function approveFixOrder($token)
    {
        $order = Orderdetail::where('remember_token', $token)->first();
  
        $order->approval = "2";    

        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Order Approved Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Order Decline Failed.');
        }
    }


    public function approveRide($token)
    {
        $data = array();
        if (Session::has('UserLoginId')) {
            $data = User::where('id','=', Session::get('UserLoginId'))->first();
        }

        $order = Orderdetail::where('remember_token', $token)->first();
        dd($order);

        $order->status = "4";        

        dd($order->status);
        $ordered = $order->save();

        if ($ordered) {
            return redirect()->back()->with('success', 'Order Declined Successfully.');
        } else {
            return redirect()->back()->with('fail', 'Order Decline Failed.');
        }
    }

    public function cancleOrderfix($token)
    {


        $orderDetails = Orderdetail::where('remember_token', $token)->first();
        
        $orderDetails->status = "3";

        $cancleOrder = $orderDetails->save();
        
        if ($cancleOrder) {
            return redirect('customer/dashboards')->with('success', 'Order Cancled Successfully');
        } else {
            return redirect('customer/dashboards')->back()->with('fail', 'Order Cancled Failed');
        }
    }

    public function cancleRide($cancleRideId)
    {
        $orderDetails = Orderdetail::where('remember_token', $cancleRideId)->first();
        $cancleOrder = $orderDetails->delete();
        if ($cancleOrder) {
            return redirect('customer/dashboards')->with('success', 'Order Cancled Successfully');
        } else {
            return redirect('customer/dashboards')->back()->with('fail', 'Order Cancled Failed');
        }
    }
}
