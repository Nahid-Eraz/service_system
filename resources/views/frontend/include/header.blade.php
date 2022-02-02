<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="menu-wrapper">
                <!-- Logo -->
                <div class="logo">
                    <a href="#"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-lg-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="/homepage">Home</a></li>
                            <li><a href="/about">about</a></li>
                            <li class="hot"><a href="#">Services</a>
                                <ul class="submenu">
                                    {{-- @guest
                                        @if ()
                                            
                                        @endif
                                    @endguest --}}
                                    <li><a href="{{route('allservices')}}">All Services</a></li>
                                    <li><a href="{{route('customeorder')}}">Custom Order</a></li>
                                </ul>
                            </li>
                            <li><a href="/jobportal">Job Portal</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="submenu">
                                    <li><a href="/cart">Cart</a></li>
                                    <li><a href="/confirmation">Confirmation</a></li>
                                    <li><a href="/checkout">Service Checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="#contact_us">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Header Right -->
                <div class="  main-menu">
                    <ul>
                        <li><a href="#"><span class="flaticon-user"></a>
                            <ul class="submenu">
                                @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('customer.login') }}">Login</a></li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('customer.signin') }}">Register</a></li>
                                    @endif
                                @else
                                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                                        <li><a href="{{ route('profileview') }}">Profile</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                @endguest
                            </ul>
                        </li>
                        <li>
                            <div class="nav-search search-switch">
                                <span class="flaticon-search"></span>
                            </div>
                        </li>

                        <li><a href="/cart"><span class="flaticon-shopping-cart"></span></a> </li>
                    </ul>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
</div>



<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
