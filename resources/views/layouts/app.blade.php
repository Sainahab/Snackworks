<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta-tags')
    <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}@yield('title')</title>

    <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">

    @notifyCss
    <!-- Fontawesome -->
    <link type="text/css" href="/frontend/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Prism -->
    {{-- <link type="text/css" href="/frontend/vendor/prismjs/themes/prism.css" rel="stylesheet"> --}}
    <!-- Front CSS -->
    {{-- <link type="text/css" href="/frontend/css/front.css" rel="stylesheet"> --}}
    <!-- Owl CSS -->
    <link type="text/css" href="/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link type="text/css" href="/frontend/css/custom.css" rel="stylesheet">
    <!-- Star CSS -->
    <link type="text/css" href="/frontend/css/star-rating-svg.css" rel="stylesheet">

    <!-- datatable CSS -->
    <link type="text/css" href="/frontend/css/DataTables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

    <script src="https://kit.fontawesome.com/bef64db956.js" crossorigin="anonymous"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}
    @yield('css')
</head>

<body>

    <header id="header" style=" position: fixed">
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
                                <a href="" >
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
                                    <p class="cart-sub-totle">
                                        <span class="pull-left">Cart Subtotal</span>
                                        <a href="/cart"><span class="pull-right"><strong class="price-box">{{Cart::getTotal()}} MAD</strong></span> </p></a>

                                    <div class="mt-20 text-left">
                                        <a href="/cart" class="btn-color btn">Cart</a>

                                            {{-- <button id="updatecart" style="color:white" class="btn-color btn">Update Cart</button> --}}
                                        {{-- <a href="/checkout" class="btn-color btn right-side">Checkout</a> --}}
                                    </div>



                                </div>

                                {{-- <div class="cart-dropdown header-link-dropdown" style="margin-top:400px">
                                    <p class="cart-sub-totle">
                                        <span class="pull-left">Cart Subtotal</span>
                                        <span class="pull-right"><strong class="price-box">{{Cart::getTotal()}} MAD</strong></span> </p>

                                    <div class="mt-20 text-left">
                                        <a href="/cart" class="btn-color btn">Cart</a> --}}

                                            {{-- <button id="updatecart" style="color:white" class="btn-color btn">Update Cart</button> --}}
                                        {{-- <a href="/checkout" class="btn-color btn right-side">Checkout</a> --}}
                                    {{-- </div>
                                    </div> --}}
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
    </header>


    <main>

        {{-- <div class="preloader bg-soft flex-column justify-content-center align-items-center">
            <div class="loader-element">
                <span class="loader-animated-dot"></span>
                <h1>{{setting('site.title')}}</h1>
            </div>
        </div> --}}

        @yield('content')

        {{-- <footer style="background-color: rgb(0, 0, 0);"  class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 text-white overflow-hidden">
            <div class="pattern pattern-soft top"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <a class="footer-brand mr-lg-5 d-flex" href="/">
                            <h2>{{setting('site.title')}}</h2>

                        </a>
                        <p class="my-4">{{setting('site.description')}}</p>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h4>Navigation</h4>
                        <ul class="links-vertical">
                            <li><a href="/">Home</a></li>
                            <li><a  href="/projects">Projects</a></li>
                            <li><a  href="/services">Services</a></li>
                            <li><a  href="/about">About</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h4>Useful Pages</h4>
                        <ul class="links-vertical">
                            {{menu('footer_menu','partials.footer-menu')}}
                        </ul>
                    </div>
                    <div class="col-12 col-sm-3 col-lg-2">
                        <h4>Social</h4>
                        <ul class="links-vertical">
                            <li><a href="//{{setting('social.facebook')}}" target="_blank">Facebook</a></li>
                            <li><a  href="//{{setting('social.twitter')}}" target="_blank">Twitter</a></li>
                            <li><a  href="//{{setting('social.linkedin')}}" target="_blank">LinkedIn</a></li>
                            <li><a  href="//{{setting('social.youtube')}}" target="_blank">Youtube</a></li>
                            <li><a href="//{{setting('social.facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="//{{setting('social.twitter')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="//{{setting('social.linkedin')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="//{{setting('social.youtube')}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 my-lg-5">
                <div class="copyright">

                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                        <p class="font-weight-normal mb-0">© {{setting('site.title')}} <span class="current-year"></span>. All rights reserved.</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">

                            <ul >
                                <li><a href="//{{setting('social.facebook')}}" target="_blank">Facebook</a></li>
                                <li><a  href="//{{setting('social.twitter')}}" target="_blank">Twitter</a></li>
                                <li><a  href="//{{setting('social.linkedin')}}" target="_blank">LinkedIn</a></li>
                                <li><a  href="//{{setting('social.youtube')}}" target="_blank">Youtube</a></li>
                                <li><a href="//{{setting('social.facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="//{{setting('social.twitter')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="//{{setting('social.linkedin')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="//{{setting('social.youtube')}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </footer> --}}

        <footer style="background-color: rgb(0, 0, 0);" class="footer">
            <div class="container">
                <div class="footer">
                                <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                                                    <div class="single-footer about">
                                                                <div class="logo">
                                                                    <a href="{{route('home')}}"><img src="{{asset('assets/images/Brand.png')}}"width="100px" height="70px" alt="#"></a>


                                        <p class="text"><p class="my-4">{{setting('site.description')}}</p></p>


                                                                </div>
                                                </div>
                                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                                                <div class="opening-hours">
                                                                <h2>Opening Hours</h2>
                                                                <ul>
                                                                                <li>Mon - thurs - Sat : <span>11.00 am - 05.00 am</span></li>
                                                                                <li>Friday : <span>14.00 am - 05.00 am</span></li>
                                                                                <li>Sunday : <span class="footer-close">Closed</span></li>
                                                                </ul>
                                                </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 footer-box">

                                                <div class="useful-links">
                                                                <h2>useful links</h2>
                                                                <ul class="links-vertical">
                                                                    <li><a href="/">Home</a></li>
                                                                    <li><a  href="/projects">Projects</a></li>
                                                                    <li><a  href="/services">Services</a></li>
                                                                    <li><a  href="/about">About</a></li>
                                                                </ul>
                                                </div>
                                </div>
                </div>
    </div>
    <div class="copyright">
                <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                                                <p class="copy-text">Copyright © {{date('Y')}} all Rights Reserved. Made with <i class="fa fa-heart"></i> by <a style="color: green;" href="https://signworks.ma/" target="_blank">Signworks Creative Media</a></p>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                                                <ul>
                                                    <li><a href="//{{setting('social.facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="//{{setting('social.twitter')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="//{{setting('social.linkedin')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="//{{setting('social.youtube')}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                </ul>
                                </div>
                </div>
    </div>
    </div>
            <!-- Footer Top -->


        </footer>

    </main>
    <!-- Core -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script src="{{asset('js/contact.js')}}"></script>

    <script src="{{asset('assets/js/1jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    {{-- <script src="{{asset('assets/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js')}}" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/contact.js')}}"></script> --}}



    <script src="/frontend/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Datatables JS -->
    <script src="/frontend/assets/js/datatables.min.js"></script>

    <script src="/frontend/vendor/popper.js/dist/umd/popper.min.js"></script>

    <script src="/frontend/vendor/headroom.js/dist/headroom.min.js"></script>

    <!-- Vendor JS -->
    <script src="/frontend/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="/frontend/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="/frontend/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="/frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Button Js -->
    <script async defer src="/frontend/assets/js/button.js"></script>

    <!-- Impact JS -->
    <script src="/frontend/assets/js/front.js"></script>
    <!-- Star JS -->
    <script src="/frontend/assets/js/jquery.star-rating-svg.js"></script>
    <!-- Owl JS -->
    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
    <!-- Select2 JS -->
    <script src="/frontend/assets/js/select2.min.js"></script>
    <!-- Custom JS -->
    <script src="/frontend/assets/js/custom.js"></script>

    <script>
		$(document).ready(function(){
			$(".category").click(function(){
				var category = $(this).data("category");
				if (category === "all") {
					$(".product").show();
				} else {
					$(".product").hide();
					$(".product[data-category='" + category + "']").show();
				}
			});
		});
	</script>

    @notifyJs
    @yield('javascript')
</body>

</html>
