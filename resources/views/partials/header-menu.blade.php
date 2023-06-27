{{-- @foreach($items as $menu_item)

    <li style="list-style-type: none;" class="nav-item"><a  class="nav-link" style="padding: 14px;color:white" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
@endforeach --}}

    @include('notify::messages')
    <div class="container">
        <div class="row m-0">
            <div class="col-xl-3 col-lg-2 col-md-4 col-3 p-0">
                <div class="navbar-header">
                    <a class="navbar-brand page-scroll" href="/">
                        <img alt="Friend's snack" src="{{asset('assets/images/Brand.png')}}" width="100px" height="70px">
                    </a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-10 col-md-8 col-9 p-0 text-right">
                <div id="menu" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="level">
                            <a href="/" class="page-scroll">Home</a>
                        </li>
                        <li class="level dropdown set">
                            <a href="/menu" class="page-scroll">Menu</a>
                            <li class="level dropdown set">
                                <a href="/contact" class="page-scroll">contact</a>
                                <li class="level dropdown set">
                                    <a href="/about" class="page-scroll">About US</a>
                                </li>
                    </ul>
                </div>
                <div class=" header-right-link">
                    <ul>
                        <li style="list-style-type: none; text-transform : uppercase;" class="nav-item dropdown call-icon">

                            <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                                <span style="color:white;" class="nav-link-inner-text">{{Auth::user()?Auth::user()->name:'My account'}}</span>
                                <span class="icon"></span>
                                {{-- <span style="color:white;" class="fas fa-angle-down nav-link-arrow ml-2"></span> --}}
                            </a>
                            <ul style="background:none; " class="dropdown-menu" id="pages_submenu">
                                @if (Auth::user())
                                    <a style="color:black;" class="dropdown-item btn-color btn" href="/dashboard">Dashboard</a>
                                    <a style="color:black;" class="dropdown-item btn-color btn right-side" href="#" id="logout-btn">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        {{-- @method('Post') --}}
                                    </form>
                                @else
                                    <a style="color:black;" class=" btn-color btn" href="/login">Login</a>
                                    <a style="color:black;" class=" btn-color btn right-side" href="/register">Register</a>
                                    @endif
                            </ul>
                        </li>
                        <li class="cart-icon">
                            <a href="#" >
                                <span class="icon"></span>
                                <div class="link-text">{{Cart::getTotalQuantity()}} items - <span> {{Cart::getTotal()}} MAD</span>
                                    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                                            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button> --}}
                                </div>
                                {{-- <div class="link-text">{{Cart::getTotalQuantity()}}</div> --}}
                                    {{-- <div class="d-none d-lg-block link-text">
                                        <a href="#" class="text-white">
                                            <span class="icon">
                                                {{Cart::getTotalQuantity()}}
                                            </span>
                                        </a>
                                        <a href="#" class="text-white">
                                            <span class="icon"></span>
                                            <span class="badge badge-danger">
                                                {{Cart::getTotalQuantity()}}
                                            </span>
                                        </a>
                                    </div>

                                    <div class="d-flex d-lg-none align-items-center link-text">
                                        <a href="#" class="text-white">
                                            <span class="badge badge-danger">
                                                {{Cart::getTotalQuantity()}}
                                            </span>
                                        </a>
                                        <a href="#" class="text-white">
                                            <span class="icon">
                                                {{Cart::getTotalQuantity()}}
                                            </span>
                                        </a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                                            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                    </div> --}}

                            </a>
                            <div class="cart-dropdown header-link-dropdown scrollbar">
                                <div class="force-overflow">

                                <ul class="cart-list link-dropdown-list">
                                     @include('sections.cart')
                                </ul>

                                </div>



                            </div>
                            <div class="cart-dropdown header-link-dropdown" style="margin-top:400px">
                                <p class="cart-sub-totle">
                                    <span class="pull-left">Cart Subtotal</span>
                                    <span class="pull-right"><strong class="price-box">{{Cart::getTotal()}} MAD</strong></span> </p>

                                <div class="mt-20 text-left">
                                    <a href="/cart" class="btn-color btn">Cart</a>

                                        {{-- <button id="updatecart" style="color:white" class="btn-color btn">Update Cart</button> --}}
                                    {{-- <a href="/checkout" class="btn-color btn right-side">Checkout</a> --}}
                                </div>
                                </div>
                        </li>
                        {{-- <li class="order-online">
                            <a href="shop-categories.html" class="btn btn-green">Order online</a>
                        </li> --}}
                        <li class="side-toggle">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><span></span></button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

