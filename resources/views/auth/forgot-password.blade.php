<!DOCTYPE html>
<html lang="en">
<head>
	<title>Xpressfix Login</title>
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

				<form action="{{route('auth.reset.pwrds.link')}}" novalidate="" method="POST" class="login100-form validate-form">
					@csrf
					<span class="login100-form-title p-b-49">
						Forgot Password?
					</span>
					

					@if(Session::has('success'))
                        <div class="alert alert-success" style="font-size: 14px;">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger" style="font-size: 14px;">{{Session::get('fail')}}</div>
                    @endif

					

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" value="{{old('email')}}" placeholder="Enter your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="m-b-23" style="color: darkred;">@error('email') {{$message}} @enderror</div>

					
					<div class="text-right p-t-8 p-b-31">
                        <a href="{{route('auth.login')}}">
							Back to Login
						</a>
						
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="login" class="login100-form-btn">
								Reset Password
							</button>
						</div>
					</div><br><br>
                        
                        <center>
                        <span>
							<a href="{{route('index')}}"><span style="font-weight: bold; font-size: 20px;">&laquo;</span> Back Home</a><br><br>
						</span>
                        </center>

				</form><br><br>

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