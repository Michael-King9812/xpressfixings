<!DOCTYPE html>
<html lang="en">
<head>
	<title>Xpressfix Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('images/bg-01.jpg')}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

				<form action="{{route('auth.register-user')}}" method="POST" class="login100-form validate-form">
					@csrf
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>
					

					@if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

					

                    <div class="wrap-input100 validate-input" data-validate = "Full Name is Required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" value="{{old('fullname')}}" placeholder="Enter your Full Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="m-b-23" style="color: darkred;">@error('fullname') {{$message}} @enderror</div>

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="m-b-23" style="color: darkred;">@error('email') {{$message}} @enderror</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" value="{{old('password')}}" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="m-b-23" style="color: darkred;">@error('password') {{$message}} @enderror</div>
					
					<div class="text-right p-t-8 p-b-31">
						<!-- <a href="#"> -->
                        Already have an account ?
						<!-- </a> -->
						<a href="{{route('auth.login')}}" class="txt2">
							Login
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="login" class="login100-form-btn">
								Signup
							</button>
						</div>
					</div>


					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							<a href="{{route('engineer.signup')}}" style="font-size: 15px;">Signup as an Engineer Here!</a><br><br>
						</span><br><br>
						<span>
							<a href="{{route('index')}}"><span style="font-weight: bold; font-size: 20px;">&laquo;</span> Back Home</a><br><br>
						</span>
						<!-- <span>
							Or Sign Up Using
						</span> -->
					</div>

					<!-- <div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div> -->

				
				</form><br><br><br>

<center><span style="font-size: 12px; font-wigth: bold;">All right reserved. <?php echo Date('Y'); ?> @ <a href="xpressfixing.com">Xpressfixing</a></span></center>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/main.js')}}"></script>

</body>
</html>











<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form V4</title>

    <!-- Font Icon --
    <link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css --
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form  action="{{route('auth.register-user')}}" method="POST" class="signup-form">
                    @csrf
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-success">{{Session::get('fail')}}</div>
                    @endif
                    <h2 class="form-title">What type of user are you ?</h2>
                    <span class="text-danger">@error('category') {{$message}} @enderror</span>
                    <div class="form-radio">
                        <input type="radio" name="category" value="customer" id="newbie" checked="checked" />
                        <label for="newbie">Customer</label>

                        <input type="radio" name="category" value="engineer" id="average" />
                        <label for="average">Engineer</label>

                        <input type="radio" name="category" value="rider" id="master" />
                        <label for="master">Rider</label>
                    </div>

                    <span class="text-danger"></span>
                    <span>@error('fullname') {{$message}} @enderror</span>
                    <div class="form-textbox">
                        <label for="name">Full name</label>
                        <input type="text" name="fullname" id="name" value="{{old('fullname')}}" />
                    </div>

                    <span>@error('email') {{$message}} @enderror</span>
                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{old('email')}}" />
                    </div>

                    <span>@error('password') {{$message}} @enderror</span>
                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="pass" value="{{old('password')}}" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="signup" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="login.php" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS --
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</html> -->