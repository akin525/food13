<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>

    <!-- fave-icon  -->
    <link rel="shortcut icon" href="{{asset('logo.jpeg')}}" >

    <!-- font awesome cdn link  -->

    <link rel="stylesheet" href="{{asset('cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>






<!-- header part start  -->

<header class="header">
    <div class="container">
        <div class="header-main">
            <div class="header-left">
                <div class="header-left-btn">
                    <div class="icon">
                            <span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 7C12 8.10457 11.1046 9 10 9C8.89543 9 8 8.10457 8 7C8 5.89543 8.89543 5 10 5C11.1046 5 12 5.89543 12 7Z"
                                        stroke-width="1.5" />
                                    <path
                                        d="M16 7C16 10.3137 12 15 10 15C8 15 4 10.3137 4 7C4 3.68629 6.68629 1 10 1C13.3137 1 16 3.68629 16 7Z"
                                        stroke-width="1.5" />
                                    <path
                                        d="M13.0003 13H14.1268C15.314 13 16.4397 13.5273 17.1997 14.4393L18.2667 15.7196C19.3522 17.0223 18.4259 19 16.7303 19H3.27042C1.57475 19 0.648436 17.0223 1.73398 15.7196L2.80096 14.4393C3.56093 13.5273 4.68672 13 5.87384 13H7.00034"
                                        stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                            </span>
                    </div>


                </div>
            </div>


            <div class="header-left-center">
                <p>It's the last day to save. The skills for now — <span>
                            <a href="#">now on sale.</a>
                        </span></p>
            </div>


            <div class="header-right">
                <div class="header-right-item">
                    <div class="header-right-inner">
                        <div class="icon">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.75 14.25V13.0155C15.75 12.4022 15.3766 11.8506 14.8071 11.6228L13.2815 11.0126C12.5571 10.7229 11.7316 11.0367 11.3828 11.7345L11.25 12C11.25 12 9.375 11.625 7.875 10.125C6.375 8.625 6 6.75 6 6.75L6.26551 6.61724C6.96328 6.26836 7.27714 5.44285 6.98741 4.71852L6.37717 3.19291C6.14937 2.62343 5.59781 2.25 4.98445 2.25H3.75C2.92157 2.25 2.25 2.92157 2.25 3.75C2.25 10.3774 7.62258 15.75 14.25 15.75C15.0784 15.75 15.75 15.0784 15.75 14.25Z"
                                            stroke-width="1.5" stroke-linejoin="round" />
                                    </svg>
                                </span>
                        </div>


                        <div class="text">
                            <a href="tel:+17077970462">07000000000</a>
                        </div>
                    </div>
                    <div class="header-right-inner">
                        <div class="icon">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.66699 10V5.83333C1.66699 3.99238 3.15938 2.5 5.00033 2.5H15.0003C16.8413 2.5 18.3337 3.99238 18.3337 5.83333V14.1667C18.3337 16.0076 16.8413 17.5 15.0003 17.5H6.66699M5.00033 6.66667L8.15133 8.76733C9.27099 9.51378 10.7297 9.51378 11.8493 8.76733L15.0003 6.66667M1.66699 12.5H6.66699M1.66699 15H6.66699"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                        </div>


                        <div class="text">
                            <a href="mailto:1303@gmail.com">1303@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>





    <!-- menu part start -->


    <nav class="menu-bg">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="nav-main">

                        <div class="nav-main">
                            <div class="logo">
                                <a href="{{url('/')}}"> <img width="50" src="{{asset('logo.jpeg')}}"
                                                           alt="logo"></a>
                            </div>

                            <div class="menu">
                                <ul>
                                    <li><a href="{{url('/')}}">Home

                                    </li>
                                    <li><a href="{{route('about')}}">About-Us</a></li>
                                    <li><a href="{{route('food')}}">Foods</a></li>
                                    @auth
                                    <li><a href="{{route('dashboard')}}">Dashboard </a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>



                        <div class="nav-btn-main">
                            <div class="nav-btn-one">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Search food">

                                <div class="nav-search">
                                    <button type="submit">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M19.25 10.5C19.25 15.3325 15.3325 19.25 10.5 19.25C5.66751 19.25 1.75 15.3325 1.75 10.5C1.75 5.66751 5.66751 1.75 10.5 1.75C15.3325 1.75 19.25 5.66751 19.25 10.5ZM10.5 20.75C16.1609 20.75 20.75 16.1609 20.75 10.5C20.75 4.83908 16.1609 0.25 10.5 0.25C4.83908 0.25 0.25 4.83908 0.25 10.5C0.25 16.1609 4.83908 20.75 10.5 20.75ZM19.5303 18.4697C19.2374 18.1768 18.7626 18.1768 18.4697 18.4697C18.1768 18.7626 18.1768 19.2374 18.4697 19.5303L20.4696 21.5303C20.7625 21.8232 21.2374 21.8232 21.5303 21.5303C21.8232 21.2374 21.8232 20.7625 21.5303 20.4696L19.5303 18.4697Z"
                                                          fill="#4D5461" />
                                                </svg>
                                            </span>
                                    </button>
                                </div>

                            </div>

                            <div class="nav-btn-two">
                                <a href="#">
                                    <div class="love">
                                            <span>
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.833 7.584C21.1216 7.584 22.1663 8.62867 22.1663 9.91733M13.9997 6.65363L14.7989 5.834C17.285 3.2845 21.3157 3.2845 23.8018 5.834C26.2211 8.31503 26.2954 12.3134 23.9701 14.8872L17.2893 22.2819C15.5145 24.2463 12.4848 24.2463 10.71 22.2819L4.02926 14.8873C1.70392 12.3135 1.77826 8.31506 4.19757 5.83402C6.68365 3.28451 10.7144 3.28452 13.2005 5.83402L13.9997 6.65363Z"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                    </div>
                                </a>


                                <div class="love cart">
                                    <div class="click" data-name="cart-dropdown">

                                    </div>
                                    <span>
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.99967 4.66536H20.9997C23.577 4.66536 25.6663 6.7547 25.6663 9.33203V15.1654C25.6663 17.7427 23.577 19.832 20.9997 19.832H11.6663C9.08901 19.832 6.99967 17.7427 6.99967 15.1654V4.66536ZM6.99967 4.66536C6.99967 3.3767 5.95501 2.33203 4.66634 2.33203H2.33301"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12.833 23.918C12.833 24.8845 12.0495 25.668 11.083 25.668C10.1165 25.668 9.33301 24.8845 9.33301 23.918C9.33301 22.9515 10.1165 22.168 11.083 22.168C12.0495 22.168 12.833 22.9515 12.833 23.918Z"
                                                    stroke-width="1.5" />
                                                <path
                                                    d="M23.333 23.918C23.333 24.8845 22.5495 25.668 21.583 25.668C20.6165 25.668 19.833 24.8845 19.833 23.918C19.833 22.9515 20.6165 22.168 21.583 22.168C22.5495 22.168 23.333 22.9515 23.333 23.918Z"
                                                    stroke-width="1.5" />
                                                <path d="M16.333 9.33203L16.333 15.1654" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M19.2503 12.25L13.417 12.25" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>

                                </div>



                            </div>


                        </div>



                        @guest
                        <div class="nav-login-btn-main">
                            <a href="{{route('login')}}" class="main-btn-four">LogIn</a>
                            <a href="{{route('register')}}" class="main-btn">Sign Up</a>
                        </div>
                        @endguest



                    </div>
                </div>
            </div>
        </div>




    </nav>
</header>

<!-- mobile navigation start -->
<header class="mobile-header">
    <div class="container-full">
        <div class="mobile-header__container">
            <div class="p-left">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img width="50" src="{{asset('logo.jpeg')}}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="p-right">
                <button id="nav-opn-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- offcanvas -->
<aside id="offcanvas-nav">
    <nav class="m-nav">
        <button id="nav-cls-btn"><i class="fa-solid fa-xmark"></i></button>
        <div class="logo">
            <a href="{{route('home')}}">
                <img width="50" src="{{asset('logo.jpeg')}}" alt="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li class="dropdown"><a href="{{route('home')}}">Home </a>
            </li>
            <li><a href="{{route('food')}}">Foods</a></li>
            <li>
                <a href="{{route('about')}}">About Us</a>
            </li>
            <li><a href="#">Contact</a></li>
        </ul>

    </nav>
</aside>





<!-- header part end  -->


<main>
@yield('content')
</main>
</body>
