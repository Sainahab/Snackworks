@extends('layouts.app')

@section('title','Home')

@section('content')

{{-- <section class="section-header" style="background-image: url({{is_null(setting('home.banner'))?'/frontend/img/default.png':Voyager::image(setting('home.banner'))}});">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 style="color:#fd9d3e" class="mb-2">{{setting('home.hero_title')}}</h1>
          <div class="intro-text text-center text-md-left">
            <p style="color:white" class="mb-4">{{setting('home.hero_subtitle')}}</p>
            <p>
              <a href="/menu" style="background-color: #fd9d3e; color:white" class="btn btn-lg ">Shop Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
</section> --}}
<section class="banner">
    <div class="banner-carousel owl-carousel">
        <div class="banner-slide-2">
            <div class="container">
                <div class="banner-box">
                    <div class="banner-text">
                        <div class="banner-center">
                            <h2 class="banner-headding">Delicious <span>Italian Cuisine</span></h2>
                            <p class="banner-sub-hed">Healthy, Fast and Affordable</p>
                        </div>
                    </div>
                    <div class="banner-images">
                        <div class="all-img-banner">
                            <img src="{{asset('assets/images/f4-1.png')}}" alt="banner" class="pizza-img">
                            <img src="{{asset('assets/images/pizza-1.png')}}" alt="banner" class="pizza-it pizza-1">
                            <img src="{{asset('assets/images/pizza-2.png')}}" alt="banner" class="pizza-it pizza-2">
                            <img src="{{asset('assets/images/pizza-3.png')}}" alt="banner" class="pizza-it pizza-3">
                            <img src="{{asset('assets/images/pizza-4.png')}}" alt="banner" class="pizza-it pizza-4">
                            <img src="{{asset('assets/images/pizza-5.png')}}" alt="banner" class="pizza-it pizza-5">
                            <img src="{{asset('assets/images/pizza-6.png')}}" alt="banner" class="pizza-it pizza-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-slide-3">
            <div class="container">
                <div class="banner-box">
                    <div class="banner-images">
                        <div class="all-img-banner">
                            <img src="{{asset('assets/images/f7-1.png')}}" alt="banner" class="pizza-img">
                            <img src="{{asset('assets/images/pizza-7.png')}}" alt="banner" class="pizza-it pizza-1">
                            <img src="{{asset('assets/images/pizza-8.png')}}" alt="banner" class="pizza-it pizza-2">
                            <img src="{{asset('assets/images/pizza-9.png')}}" alt="banner" class="pizza-it pizza-3">
                            <img src="{{asset('assets/images/pizza-10.png')}}" alt="banner" class="pizza-it pizza-4">
                            <img src="{{asset('assets/images/pizza-11.png')}}" alt="banner" class="pizza-it pizza-5">
                            <img src="{{asset('assets/images/pizza-12.png')}}" alt="banner" class="pizza-it pizza-6">
                        </div>
                    </div>
                    <div class="banner-text">
                        <div class="banner-center">
                            <h2 class="banner-headding">Delicious <span>Burgers</span></h2>
                            <p class="banner-sub-hed">Healthy, Fast and Affordable</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-slide">
            <div class="container">
                <div class="banner-box">
                    <div class="banner-text">
                        <div class="banner-center">
                            <h2 class="banner-headding">Delicious <span>Pizzas</span></h2>
                            <p class="banner-sub-hed">Healthy, Fast and Affordable</p>
                        </div>
                    </div>
                    <div class="banner-images">
                        <div class="all-img-banner">
                            <img src="{{asset('assets/images/banner-bg-1.png')}}" alt="banner" class="pizza-img">
                            <img src="{{asset('assets/images/banner-bg-2.png')}}" alt="banner" class="pizza-it pizza-1">
                            <img src="{{asset('assets/images/banner-bg-3.png')}}" alt="banner" class="pizza-it pizza-2">
                            <img src="{{asset('assets/images/banner-bg-4.png')}}" alt="banner" class="pizza-it pizza-3">
                            <img src="{{asset('assets/images/banner-bg-5.png')}}" alt="banner" class="pizza-it pizza-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
<section class="order-section ptb">
    <div class="container">
        <div class="row">
            <div class="order-top"><img src="{{asset('assets/images/order-top.png')}}" alt="layer"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                <img src="{{asset('assets/images/order-1.svg')}}" alt="order" class="order-img">
                <h2 class="order-title text-uppercase">order your Food</h2>
                <p class="order-des">1</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                <img src="{{asset('assets/images/order-2.svg')}}" alt="delivery" class="order-img">
                <h2 class="order-title text-uppercase">delivery or pick up</h2>
                <p class="order-des">2</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 servose-box text-center padding-lf">
                <img src="{{asset('assets/images/order-3.svg')}}" alt="delicious" class="order-img">
                <h2 class="order-title text-uppercase">Eat it with pleasure</h2>
                <p class="order-des">3</p>
            </div>
            <div class="order-bottom"><img src="{{asset('assets/images/order-bottom.png')}}" alt="layer"></div>
        </div>
    </div>
</section>
<section class="speciality ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="headding-part text-center pb-50">
                    <p class="headding-sub">Friend's Fast Food</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">our speciality</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 text-center speciality-box">
                <div class="speciality-img">
                    <div><img src="{{asset('assets/images/o1.jpg')}}" alt="speciality" class="spec-image"></div>
                </div>
                <a href="#" class="ser-title text-uppercase font-weight-bold">Monster Burger</a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 text-center speciality-box">
                <div class="speciality-img">
                    <div><img src="{{asset('assets/images/speciality-2.jpg')}}" alt="speciality" class="spec-image"></div>
                </div>
                <a href="#" class="ser-title text-uppercase font-weight-bold">Double Cheese Pizza</a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 text-center speciality-box">
                <div class="speciality-img">
                    <div><img src="{{asset('assets/images/o2.jpg')}}" alt="speciality" class="spec-image"></div>
                </div>
                <a href="#" class="ser-title text-uppercase font-weight-bold">Tortella veges</a>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                <a href="/menu" class="com-btn">view more</a>
            </div> --}}
        </div>
    </div>
</section>
{{-- <section class="section-header bg-soft">
<div class="site-section site-blocks-2">
    <div class="container">
      <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <a class="block-2-item" href="/shop/category?category={{$category->slug}}">
                    <figure class="image">
                        <img src="{{is_null($category->image)?'/frontend/img/default.png':Voyager::image($category->image)}}" alt="category" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>{{$category->name}}</h3>
                    </div>
                </a>
            </div>
        @endforeach
      </div>
    </div>
</div>
</section> --}}




<section class="special-menu ptb pt-140">
    <div class="menu-top-bg"><img src="{{asset('assets/images/menu-top-bg.png')}}" alt="meu-bg"></div>

    <div class="container section" id="FFmenu">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="headding-part text-center pb-50">
                    <p class="headding-sub">Friend's Fast Food</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">Our Menu</h2>
                </div>
            </div>
        </div>

        <div class="nav-main">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="menu-tabbing" id="category-filter">
            <!-- Tab Nav -->
            <ul class="nav nav-tabs " style="background-color: white" id="category-filter" id="tabs" id="myTab" role="tablist">
                @php
                    $categories=DB::table('categories')->where('status','active')->get();
                    // dd($categories);
                @endphp
                @if($categories->count()>0)
                <button class="btn btn-color category" data-category="all" style="color:rgb(0, 0, 0);">
                    All Menu
                </button>
                {{-- <li role="presentation" class="tab-link current" data-tab="tab-1"><a href="#FFmenu" role="tab" data-toggle="tab" class="active">all</a></li> --}}

                    @foreach($categories as $category)

                    {{-- <li class="tab-link" style="list-style-type: none;"><a href="{{route('shop.category',['category'=>$category->slug,'query'=>request()->input('query')])}}">{{$category->name}}</a></li>    --}}

                    {{-- <li role="presentation" class="tab-link" data-tab="tab-4"><a href="#{{$category->name}}" role="tab" data-toggle="{{$category->name}}">{{$category->name}}</a></li> --}}
                    {{-- data-filter=".{{$category->name}}" --}}
                    <button   data-category="{{$category->id}}" class="btn  category" style="color:rgb(0, 0, 0);">
                        {{$category->name}}
                    </button>

                    @endforeach
                    @else
                        No Category
                @endif

            </ul>
                                <button id="list" class="srt"><i class="fa fa-list"></i></button>
                                <button id="grid" class="srt"><i class="fa fa-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Tab Nav -->
        </div>
        <div class="row" id="product-list" >

            @include('sections.product')
        </div>
 
</section>

{{-- <section class="section section-lg pt-6">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Latest products</h2>
                <p class="lead">See our variety range of products</p>
            </div>
        </div>
        <div class="row">
            @include('sections.product')
        </div>
    </div>
</section> --}}

{{-- <section class="section section-lg pt-6">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Featured products</h2>
                <p class="lead">See our featured products</p>
            </div>
        </div>
        <div class="row">
            <?php $products=$featured_products;?>
            @include('sections.product')
        </div>
    </div>
</section> --}}
<section class="about-shop ptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="max-w-390">
                    <div class="headding-part">
                        <p class="headding-sub">best Snack in the area</p>
                        <h2 class="headding-title text-uppercase font-weight-bold">about Friend's Fast Food</h2>
                    </div>
                    <p class="online-des">Fast casual restaurant concepts offer the convenience of fast food without the full service of fine dining. Fast casual dining consists of a more inviting</p>
                    <a href="" class="about-more-z com-btn">view more</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about-shop-img">
                    <img src="{{ asset('assets/images/about-img.png') }}" alt="about" class="shop-ab">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="customer ptb">
    <div class="container">
        <div class="customer-inner">
            <div class="customer-top-bg"><img src="{{ asset('assets/images/customer-top-bg.png') }}" alt="customer"></div>
            <div class="headding-part pb-50 text-center">
                <p class="headding-sub">What Say Our Clients</p>
                <h2 class="headding-title text-uppercase font-weight-bold">Customer Reviews</h2>
            </div>
            <div class="customer-slide owl-carousel">
                <div class="customer-detail">
                    <div class="customer-img">
                        <div class="customer-img-in">
                            <img src="{{ asset('assets/images/customer-1.png') }}" alt="customer" class="customer-image">
                            <p class="customer-name">hamida</p>
                        </div>
                    </div>
                    <div class="customer-reviews">
                        <p class="review-cus">The one day when the lady met this fellow and they knew it was much more than a hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much more than a
                            hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much </p>
                        <label class="post-name">john doe - <span>Designer</span></label>
                    </div>
                </div>
                <div class="customer-detail">
                    <div class="customer-img">
                        <div class="customer-img-in">
                            <img src="{{ asset('assets/images/comment-2.jpg') }}" alt="customer" class="customer-image">
                            <p class="customer-name">John travolta</p>
                        </div>
                    </div>
                    <div class="customer-reviews">
                        <p class="review-cus">The one day when the lady met this fellow and they knew it was much more than a hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much more than a
                            hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much </p>
                        <label class="post-name">john doe - <span>Designer</span></label>
                    </div>
                </div>
                <div class="customer-detail">
                    <div class="customer-img">
                        <div class="customer-img-in">
                            <img src="{{ asset('assets/images/client1.jpg') }}" alt="customer" class="customer-image">
                            <p class="customer-name">Saraha lbisara</p>
                        </div>
                    </div>
                    <div class="customer-reviews">
                        <p class="review-cus">The one day when the lady met this fellow and they knew it was much more than a hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much more than a
                            hunch the first mate and his Skipper too will do their comforta The one day when the lady met this fellow and they knew it was much </p>
                        <label class="post-name">john doe - <span>Designer</span></label>
                    </div>
                </div>
            </div>
            <div class="customer-bottom-bg"><img src="{{ asset('assets/images/customer-bottom-bg.png') }}" alt="customer"></div>
        </div>
    </div>
</section>

{{-- @include('sections.testimonial') --}}
@include('sections.brand')
<section class="contact-map">
    <iframe class="map-shop" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.8407846849427!2d-5.811776288687919!3d35.77928717244136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c7f4fdee5753b%3A0x45f439765e387698!2sSignworks%20%3A%20Creative%20Media!5e0!3m2!1sen!2sma!4v1670857675906!5m2!1sen!2sma"
        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
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


@endsection
