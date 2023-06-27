@extends('layouts.app')

@section('title', 'Menu')

@section('content')

    <!-- Hero -->
    	<!-- Breadcrumbs -->
		{{-- <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-1.jpg') }}) no-repeat center / cover;">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="page-title">
							@if (request()->input('query') && !request()->input('category'))
                    <h1 class="page-headding" class="display-2 mb-3"> Search results for: {{request()->input('query')}}</h1>
                @elseif(!request()->input('query') && request()->input('category'))
                    <h1 class="page-headding" class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                @elseif(request()->input('query') && request()->input('category'))
                    <h1 class="page-headding" class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                    <h2>Search results for: {{request()->input('query')}}</h2>
                @else
                    <h1 class="page-headding" class="display-2 mb-3">Menu</h1>
                @endif    
						</div>
					</div>
				</div>
			</div>
		</section> --}}
        <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-1.jpg') }}) no-repeat center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="page-title">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="headding-part text-center pb-50">
                                    <p class="headding-sub">Friend's Fast Food</p>
                                    {{-- <h2 class="headding-title text-uppercase font-weight-bold">Our Menu</h2> --}}
                                </div>
                            </div>
                            <h1  class="page-headding">MENU</h1>
                            {{-- <p style="color:white" class="lead">This is your dashboard</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        
<script>
    $(document).ready(function(){
        $(".category").click(function(){
            var category = $(this).data("category");
            if (category === "all") {
                $(".product").show();
            } else {
                $(".product[data-category='" + category + "']").show();
                $(".product").hide();
                
            }
        });
    });
</script>
<section class="special-menu ptb pt-140">
    <div class="menu-top-bg"><img src="{{asset('assets/images/menu-top-bg.png')}}" alt="meu-bg"></div>

    <div class="container section" id="FFmenu">
       

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
	
    {{-- <section class="order-section ptb">
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
        
    </section> --}}
    
@stop
