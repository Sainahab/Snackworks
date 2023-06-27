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
    <link type="text/css" href="/frontend/vendor/prismjs/themes/prism.css" rel="stylesheet">
    <!-- Front CSS -->
    <link type="text/css" href="/frontend/css/front.css" rel="stylesheet">
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
    @yield('css')
</head>

<body>
    @include('notify::messages')
    <header style="background-color: rgb(0, 0, 0); position: fixed"  id="header">
         <div class="container">
            <div class="row m-0">
                <div class="col-xl-3 col-lg-2 col-md-4 col-3 p-0" >
                    <a class="text-white" href="/">
                        {{-- <h2>{{setting('site.title')}}</h2> --}}
                     <img src="{{asset('assets/images/Brand.png')}}"width="100px" height="70px" alt="Friend's snack">


                    </a>
                </div>
                <div class="col-xl-9 col-lg-10 col-md-8 col-9 p-0 text-right">

                    <div id="menu" class="navbar-collapse collapse">
                        <ul style="text-transform : uppercase;" class="nav navbar-nav ">
                            {{menu('header_menu','partials.header-menu')}}
                        </ul>

                    </div>
                    <div class=" header-right-link" style="margin-top: 25px;">

                        <ul>
                            <li style="list-style-type: none; text-transform : uppercase;" class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                                    <span style="color:white;" class="nav-link-inner-text">{{Auth::user()?Auth::user()->name:'My account'}}</span>
                                    <span style="color:white;" class="fas fa-angle-down nav-link-arrow ml-2"></span>
                                </a>
                                <ul class="dropdown-menu" id="pages_submenu">
                                    @if (Auth::user())
                                        <li style="list-style-type: none; text-transform : uppercase;"><a style="color:black;" class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                        <li style="list-style-type: none; text-transform : uppercase;"><a style="color:black;" class="dropdown-item" href="#" id="logout-btn">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <li style="list-style-type: none; text-transform : uppercase;"><a style="color:black;" class="dropdown-item" href="/login">Login</a></li>
                                        <li style="list-style-type: none; text-transform : uppercase;"><a style="color:black;" class="dropdown-item" href="/register">Register</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li class="order-online">
                                <div class="d-none d-lg-block">
                                    <a href="/cart" class="text-white"><i class="fas fa-shopping-cart"></i>
                                        <span class="badge badge-danger">
                                            {{Cart::getTotalQuantity()}}
                                        </span>
                                    </a>
                                </div>

                                <div class="d-flex d-lg-none align-items-center">
                                    <a href="/cart" class="text-white"><i class="fas fa-shopping-cart"></i>
                                        <span class="badge badge-danger">
                                            {{Cart::getTotalQuantity()}}
                                        </span>
                                    </a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                                        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                            </li>
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
    <script src="{{asset('assets/js/1jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- Core -->
    <script src="/frontend/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Datatables JS -->
    <script src="/frontend/assets/js/datatables.min.js"></script>

    <script src="/frontend/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="/frontend/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
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
