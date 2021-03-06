<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Engineer;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
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

    public function loginAsEngineer() {
        return view('auth.login_as_engineer');
    }

    
    public function engineerSignup() {
        $allStates = State::all();
        return view('auth.engineer.registration', compact('allStates'));
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

        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->category = "customer";
        $user->password = Hash::make($request->password);
        $searchDb = User::where('email','=', $request->email)->exists();
        
        if($searchDb != 1 ) {
            $res = $user->save();

            if ($res) {
                return redirect('login')->with('success', 'You have registered successfully');
            } else {
                return back()->with('fail', 'Something wrong');
            }   
        } else {
            return back()->with('fail', 'Already exist choose a different Email.');
        }
        

    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);

        $user = User::where('email','=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('UserLoginId', $user->id);

                if ($user->category == 'customer') {
                    return redirect('/customer/dashboards');
                } 
                elseif ($user->category == 'admin') {
                    return redirect('/admin/dashboard');
                } 
                elseif ($user->category == 'engineer') {
                    return redirect('/engineers/dashboard');
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

        } else {
            return back()->with('fail', 'You are not registered please Signup');
        }
    }


    public function loginEngineer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);
        
        $engineer = Engineer::where('email','=', $request->email)->first();
        
        if($engineer) {
            if(Hash::check($request->password, $engineer->password)) {
                
                $request->session()->put('UserLoginId', $engineer->id);
                return redirect('/engineers/dashboard');    

            } else {
                return back()->with('fail', 'Your Password did not match.');
            }
        } else {
            return back()->with('fail', 'You are not registered please to Signup');
        }
        
    }




    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    
    // public function showResetForm()
    // {
    //     return view('auth.reset_pasword');
    // }

    public function showResetForm(Request $request, $tokens = null) {
        
        $token = $tokens; 
        $email = $request->email;
        return view('auth.reset_pasword',compact(['token', 'email']));
    }

    public function sendResetLink(Request $request) {  
        $engineer = Engineer::where('email',$request->email)->first(); 
        $user = User::where('email',$request->email)->first(); 
        if($engineer) {
            $request->validate([
                'email'=>'required|email|exists:engineers,email'
            ]);
    
            $token = \Str::random(64);
            \DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
    
            $action_link = route('auth.reset.password.form', ['token'=>$token, 'email'=>$request->email]);
            $body = "We have received a request to reset the password for <b>Xpressfixing</b> account associated with your email ".$request->email.",
            you can now reset your password by clicking the link below.";
    
            \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request) {
                $message->from('support@xpressfixing.com', 'Xpressfixing');
                $message->to($request->email, 'Michaelking')
                        ->subject('Reset Password');
            });
        } elseif($user) {
            $request->validate([
                'email'=>'required|email|exists:users,email'
            ]);
    
            $token = \Str::random(64);
            \DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
    
            $action_link = route('auth.reset.password.form', ['token'=>$token, 'email'=>$request->email]);
            $body = "We have received a request to reset the password for <b>Xpressfixing</b> account associated with your email ".$request->email.",
            you can now reset your password by clicking the link below.";
    
            \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request) {
                $message->from('support@xpressfixing.com', 'Xpressfixing');
                $message->to($request->email, 'Michaelking')
                        ->subject('Reset Password');
            });
        } else {
            
        }
        
        return back()->with('success', 'We have sent your password reset link, kindly check your mail box '.$request->email);
    }

    public function resetPassword(Request $request) {
        $engineer = Engineer::where('email',$request->email)->first(); 
        $user = User::where('email',$request->email)->first(); 
        if($engineer) {
            $request->validate([
                'email'=>'required|email|exists:engineers,email',
                'new_password'=>'required|min:6|max:15|same:confirm_password',
                'confirm_password'=>'required|min:6|max:15',
            ]);
    
            
    
            $check_token = \DB::table('password_resets')->where([
                'email'=>$request->email,
                'token'=>$request->token,
            ])->first();   
    
            if (!$check_token) {
                return back()->with('fail','Invalid token');
            } else {
                Engineer::where('email',$request->email)->update([
                    'password'=>Hash::make($request->new_password),
                ]);
    
                \DB::table('password_resets')->where([
                    'email'=>$request->email,
                ])->delete();
    
                return redirect('/login/engineer')->with('success','Your password has been changed, you can now Login with you new password.');
    
            }
        } elseif($user) {
            $request->validate([
                'email'=>'required|email|exists:users,email',
                'new_password'=>'required|min:6|max:15|same:confirm_password',
                'confirm_password'=>'required|min:6|max:15',
            ]);
    
            
    
            $check_token = \DB::table('password_resets')->where([
                'email'=>$request->email,
                'token'=>$request->token,
            ])->first();   
    
            if (!$check_token) {
                return back()->with('fail','Invalid token');
            } else {
                User::where('email',$request->email)->update([
                    'password'=>Hash::make($request->new_password),
                ]);
    
                \DB::table('password_resets')->where([
                    'email'=>$request->email,
                ])->delete();
    
                return redirect('/login')->with('success','Your password has been changed, you can now Login with you new password.');
    
            }
        } else {

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
        $engineerModel->status = "0";
        $engineerModel->password = Hash::make($engineerPassword);
        $engineerModel->remember_token = $engineerToken;

        $searchDb = Engineer::where('email','=', $engineerEmail)->exists();
       if($searchDb != 1 ) {
            $isAddEngineer = $engineerModel->save();

            if ($isAddEngineer) {
                return redirect('/login')->with('success', $engineerName.' You have registered successfully.');
            } else {
                return back()->with('fail', 'Something wrong');
            }
       } else {
            return back()->with('fail', 'Already exist choose a different Email.');
       }

    }


    public function logout()
    {
        if (Session::has('UserLoginId')) {
            Session::pull('UserLoginId');

            return redirect('/login');
        }
    }

}