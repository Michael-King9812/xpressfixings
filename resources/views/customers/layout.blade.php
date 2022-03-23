<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{asset('customers/assets/css/bootstrap.min.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{asset('customers/assets/css/styles.css')}}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <title>Xpressfix Home</title>

        <style>
            body {
                font-size: 14px;
            }

            button {
                cursor: pointer;
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
                <a href="#" class="nav__logo"><img src="{{asset('images/logo.png')}}" alt="" style="width: 110px; height: 70px; margin-right: -20px;"></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="{{route('index')}}" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="{{route('index')}}#menu" class="nav__link">Menu</a></li>
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

        

        @yield('main')

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container" data-aos="fade-down-left">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">XPRESSFIX</a>
                    <span class="footer__description">Technologies</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
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
                        <li><a href="#" class="footer__link">Event</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Palm Street Extension</li>
                        <li>Jr Union #999</li>
                        <li>999 - 888 - 777</li>
                        <li>xpressfixing@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; <?php echo Date('Y'); ?> <a href="https://xpressfixing.com">Xpressfix</a>. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="{{asset('customers/assets/js/main.js')}}"></script>
        <script src="{{asset('customers/assets/js/bootstrap.min.js')}}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
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
    </body>
</html>





