<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="csrf-token" content="{{csrf_token()}}">
        
        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('customers/assets/images/favicon.png')}}">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{asset('customers/assets/css/bootstrap.min.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{asset('customers/assets/css/styles.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('css\bootstrap.css')}}">      -->
        <link rel="stylesheet" href="{{asset('customers/assets/js/jquery.min.js')}}">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <title>Xpressfix Home</title>

        <style>
            body {
                font-size: 14px;
            }

            a {
                text-decoration: none;
            }
        </style>
        
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="{{route('index')}}" class="nav__logo"><img src="{{asset('images/logo.png')}}" alt="" style="width: 130px; height: 80px; margin-right: -20px;"></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="{{route('index')}}" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="" class="nav__link"  data-toggle="modal" data-target="#WyModalBox">Why Us</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#contact" class="nav__link">Contact</a></li>
                        @if(Session::get('UserLoginId') != "")
                            <li class="nav__item">
                                @if($data->category == 'admin')
                                    <a href="{{route('admin.customers')}}" class="nav__link">{{ $data->fullname }}</a>

                                @elseif($data->category == 'engineer')
                                    <a href="{{route('engineer.index')}}" class="nav__link">{{ $data->fullname }}</a>

                                @elseif($data->category == 'ride')
                                    <a href="{{route('ride.index')}}" class="nav__link">{{ $data->fullname }}</a>
                                
                                @elseif($data->category == 'customer')
                                    <a href="{{route('customer.indexs')}}" class="nav__link">{{ $data->fullname }}</a>

                                @endif
                            </li>
                            <li class="nav__item"><a href="{{route('logout')}}" class="nav__link">Logout</a></li>
                        @else
                            <li class="nav__item"><a href="{{route('auth.login')}}" class="nav__link">Login</a></li>
                        @endif

                        <!-- <li><i class='bx bx-moon change-theme' id="theme-button"></i></li> -->
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle" style="z-index: 99">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        

        <!-- Modal -->
        <div class="modal fade" id="WyModalBox" tabindex="-1" role="dialog" aria-labelledby="WyModalBoxTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="WyModalBoxTitle" style="font-weight: bold">Why Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <h5 style="font-weight: bold; color: #ff6d52;">Exceptional service</h5> 
                <p style="font-weight: bold;">* We give Top quality certified parts for repair</p>
                <h5 style="font-weight: bold; color: #ff6d52;"> Months Warranty</h5>
                    <p style="font-weight: bold;">* Get free 2 months warranty on parts replaced on your gadgets</p>

                    <h5 style="font-weight: bold; color: #ff6d52;  "> Engineers</h5>
                    <p style="font-weight: bold;">* Trained & Qualified Professionals</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        

        @yield('main')

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container" data-aos="fade-down-left">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">XPRESSFIXING</a>
                    <!-- Button trigger modal -->

                    <span class="footer__description">Technologies</span>
                    <div>
                        <a href="https://www.facebook.com/xpressfixing" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.instagram.com/xpressfixing" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="https://www.twitter.com/xpressfixing" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Quick Repairs</a></li>
                        <li><a href="#" class="footer__link">Fast Delivery</a></li>
                        <li><a href="#" class="footer__link">Accurate GPS Tracker</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="" class="footer__link"  data-toggle="modal" data-target="#WyModalBox">Why Us</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li><b>Location:</b> Osogbo, Osun State</li>
                        <!-- <li>Jr Union #999</li>-->
                        <li><b>Tell:</b> +234 905 577 251</li>
                        <li><b>Email:</b> xpressfixing1@gmail.com, support@xpressfixing.com</li>
                    </ul>
                </div>
            </div>
        
            <p class="footer__copy">&#169; <?php echo Date('Y') ?> <a href="https://xpressfixing.com">Xpressfix</a>. All right reserved</p>
        </footer>

        <script>
        try {
            let msg = document.getElementById('msg');
            setTimeout(() => {
                msg.style.display = "none";
            }, 5000);
        } catch (error) {
            console.log(error);
        }
    </script>


        
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        
        <script src="{{asset('customers/assets/js/main.js')}}"></script>
        <!-- <script src="{{asset('customers/assets/js/bootstrap.min.js')}}"></script> -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            AOS.init();
        </script>
        
    </body>
</html>





