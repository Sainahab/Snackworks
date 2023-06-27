@extends('layouts.app')

@section('title','About')

@section('content')
<!-- Hero -->
<section class="page-banner" style="background: #121619 url({{ asset('assets/images/big.jpg') }}) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="headding-part text-center pb-50">
                            <h1  class="page-headding">Know more about us</h1>
                            <p class="headding-sub">Know about us how we started our journey.</p>
                            {{-- <h2 class="headding-title text-uppercase font-weight-bold">Our Menu</h2> --}}
                        </div>
                    </div>
                    {{-- <h1  class="page-headding">MENU</h1> --}}
                    {{-- <p style="color:white" class="lead">This is your dashboard</p> --}}
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section section-lg pt-0">
    <div class="container mt-n7 mt-lg-n13 z-2">
        <div class="row justify-content-center">
            <div class="card bg-white border-light shadow-soft flex-md-row no-gutters p-4">
                <a class="col-md-6 col-lg-6"><img src="{{is_null(setting('home.about_image'))?'/frontend/img/default.png':Voyager::image(setting('home.about_image'))}}" alt="img" class="card-img-top" /></a>
                <div class="card-body d-flex flex-column justify-content-between col-auto py-4 p-lg-5">
                    <div class="headding-part">
                        <p class="headding-sub">Best snack around</p>
                        <h2 style="font-size:50px;" class="headding-title text-uppercase font-weight-bold">about Friend´s Fast Food</h2>
                    </div>

                    {!!clean(setting('home.about'))!!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-story pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="headding-part text-center">
                    <p class="headding-sub">Discover</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">OUR STORY</h2>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="story text-center">
                    <p class="story-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful</p>
                    <img src="{{asset('assets/images/story.png')}}" alt="story">
                </div>
            </div>
        </div>
    </div>
</section>
@include('sections.member')
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

{{-- @include('sections.testimonial') --}}
@include('sections.brand')
@endsection
