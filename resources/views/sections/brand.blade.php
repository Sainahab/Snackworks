<!-- brand -->
<section class="section section-lg pb-5 ">
    <div class="container">
        <div class="row"> 
            <div class="col-12 text-center mb-5">
                <div class="headding-part pb-50 text-center">
                    <p class="headding-sub">Brands</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">Brands we sell</h2>
                </div>
                {{-- <h1 class="display-3 mb-4 mb-lg-5">Brands</h1>
                <p class="lead mb-5">Brands we sell</p> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-brand owl-carousel">
                            @foreach ($brands as $brand)
                            <div class="card border-light">
                                <div class="card-body text-center p-5">
                                    <img class="img-fluid" src="{{is_null($brand->image)?'/frontend/img/default.png':Voyager::image($brand->image)}}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>    
</section>