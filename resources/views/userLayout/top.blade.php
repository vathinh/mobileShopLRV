<!-- HEADER DESKTOP-->
<div class="animsition">
<header class="header-desktop">
    
        <div class="container-fluid">
            
            <div class="header-wrap">
            <div class="logo">
                <a href="{{ url("/")}}">
                    <img src="{{ asset('image/logo.png') }}" width="90" height="90" alt="Cool Admin" />
                </a>
            </div>
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
                                                    <img src="{{ asset('/image/'.$product-> P_imgPath) }}" />
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
                                        
                                        <div class="account-dropdown__item">
                                            <a href="{{ url("user/userDB") }}">
                                                <i class="zmdi zmdi-settings"></i>View Info</a>
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
    
</header>
</div>
<!-- HEADER DESKTOP-->