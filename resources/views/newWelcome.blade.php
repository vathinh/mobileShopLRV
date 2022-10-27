<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('theme/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('theme/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('theme/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('theme/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('theme/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- Left MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('theme/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
        </aside>
            

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                            
                                       
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                            <i class="fa fa-shopping-cart">Cart</i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <!-- user profile img -->
                                            <div class="info clearfix">
                                               
                                                <a href="#">
                                                        <i class="fa fa-shopping-cart"> Cart</i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                                </a>
                                               
                                          
                                            </div>

                                            <div class="account-dropdown__body">
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                             
                                                @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                        <div class="account-dropdown__item">
                                                            <div class="image">
                                                                <img src="{{ $details['image'] }}" />
                                                            </div>
                                                                <p>{{ $details['name'] }}</p>
                                                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="account-dropdown__item">
                                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__footer">
                                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>                                                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            @if (Route::has('login'))
                                @auth
                            <div class="header-button">                                                     
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                   
                                        
                                            <div class="image">
                                                <img src="{{ asset('theme/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                            </div>

                                            <div class="content">
                                                <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                            </div>
                                            
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('theme/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">{{ Auth::user()->name }}</a>
                                                        </h5>
                                                        <span class="email">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                    @php
                                                        $data = Auth::user()->id;
                                                    @endphp
                                                        <a href="{{ url("user/userDetails/{$data}") }}">
                                                            <i class="zmdi zmdi-account"></i>View Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                                               
                                    </div>
                                </div>          
                            </div>   
                            @else
                                <div>
                                    <a href="{{ route('login') }}">Log in</a>                                  
                                    @if (Route::has('register')) 
                                    <div>
                                        <a href="{{ route('register') }}" >Register</a>                     
                                    </div>                                                                                            
                                    @endif
                                </div>                                
                                @endauth                      
                            @endif                            
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container">
    
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div> 
                @endif

                @yield('content')
                </div>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xs-18 col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{ $product->P_imgPath }}" alt="">
                                        <div class="caption">
                                            <h4>{{ $product->P_name }}</h4>
                                            <p><strong>Price: </strong> {{ $product->P_price }}$</p>
                                            <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('theme/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('theme/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('theme/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('theme/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('theme/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->