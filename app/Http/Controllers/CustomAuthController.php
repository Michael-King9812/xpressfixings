<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Engineer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Database;

class CustomAuthController extends Controller
{
    // public function __construct() {
    //     $this->middleware('UserLoginId');
    // }

    
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = "users";
    }

    public function login() {
        return view('auth.login');
    }

    
    public function engineerSignup() {
        return view('auth.engineer.registration');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:15'
        ]);


        
        $postUsersData = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'category' => $request->category,
            'password' => $request->password,
        ];
        $res = $this->database->getReference($this->tablename)->push($postUsersData);

        // $user = new User();
        // $user->fullname = $request->fullname;
        // $user->email = $request->email;
        // $user->category = "customer";
        // $user->password = Hash::make($request->password);
        
        // $res = $user->save();

        if ($res) {
            return redirect('login')->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something wrong');
        }
        

    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);

        $user = User::where('email','=', $request->email)->first();
        $engineer = Engineer::where('email','=', $request->email)->first();
        

        if ($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('UserLoginId', $user->id);

                if ($user->category == 'customer') {
                    return redirect('/customer/dashboards');
                } 
                elseif ($user->category == 'admin') {
                    return redirect('/admins/dashboard');
                } 
                elseif ($user->category == 'engineer') {
                    return redirect('/engineer/dashboard');
                }
                elseif ($user->category == 'rider') {
                    return redirect('/rider/dashboard');
                } 
                else {
                    return redirect('/');
                }

            } else {
                return back()->with('fail', 'Your Password did not match.');
            }

        } elseif ($engineer) {
            if(Hash::check($request->password, $engineer->password)) {
                
                $request->session()->put('UserLoginId', $engineer->id);
                
                    return redirect('/engineer/dashboard');    
            } else {
                return back()->with('fail', 'Your Password did not match.');
            }
        } else {
            return back()->with('fail', 'You are not registered please <a href="{{route("auth.login")}}">Click Here</a> to Signup');
        }
    }

    public function logout()
    {
        if (Session::has('UserLoginId')) {
            Session::pull('UserLoginId');

            return redirect('/login');
        }
    }







    

    public function registration() {
        return view('auth.registration');
    }

    public function addEngineerStore(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'password'=>'required',
        ]);

        $engineerName = $request->input('name');
        $engineerEmail = $request->input('email');
        $engineerPhone = $request->input('phone');
        $engineerAddress = $request->input('address');
        $engineerCity = $request->input('city');
        $engineerState = $request->input('state');
        $engineerPassword = $request->input('password');
        $engineerToken = Str::random(32);


        $engineerModel = new Engineer();

        $engineerModel->fullname = $engineerName;
        $engineerModel->phoneNumber = $engineerPhone;
        $engineerModel->email = $engineerEmail;
        $engineerModel->address = $engineerAddress;
        $engineerModel->city = $engineerCity;
        $engineerModel->state = $engineerState;
        $engineerModel->password = Hash::make($engineerPassword);
        $engineerModel->remember_token = $engineerToken;

        $isAddEngineer = $engineerModel->save();

        
        if ($isAddEngineer) {
            return redirect('/login')->with('success', $engineerName.' You have registered successfully.');
        } else {
            return back()->with('fail', 'Something wrong');
        }

    }
}