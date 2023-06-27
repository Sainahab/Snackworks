<!-- team -->
<section class="section-header ">
    <div class="site-section site-blocks-2">
        <div class="container">
            {{-- <div class="row justify-content-center mb-5 mb-md-7">
                <div class="col-12 col-md-8 text-center">
                    <h2 class="h1 font-weight-bolder mb-4">Meet our expert team</h2>
                    <p class="lead">Meet our professional team to execute our work</p>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="headding-part text-center pb-50">
                        <p class="headding-sub">Meet our expert team</p>
                        <h4 style="font-size:40px" class="headding-title text-uppercase font-weight-bold">Meet our professional team to execute our work</h4>
                    </div>
                </div>
            </div>
          <div class="row">
            @foreach ($members as $member)
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <a class="block-2-item" href="">
                        <figure style="height: 500px" class="image">
                            <img src="{{is_null($member->image)?'/frontend/img/default.png':Voyager::image($member->image)}}" alt="category" class="img-fluid">
                        </figure>
                        
                    </a>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="headding-part text-center pb-50">
                                <p  class="headding-sub">{{$member->name}}</p>
                                {{-- <p  class="headding-sub">{{$member->designation}}</p> --}}
                                <h2 style="font-size:20px;" class="headding-title text-uppercase font-weight-bold">{{$member->designation}}</h2>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <h3 style="color:#fd9d3e ;font-size:20px;" class="card-title mt-3">{{$member->name}}</h3>
                        <p style="color:#fd9d3e ;font-size:20px;" class="text-info">{{$member->designation}}</p>
                        </div> --}}
                </div>
           @endforeach
          </div>
        </div>
    </div>
    </section>
{{-- <section class="section section-lg bg-soft">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Meet our expert team</h2>
                <p class="lead">Meet our professional team to execute our work</p>
            </div>
        </div>
        <div class="row">
            @foreach ($members as $member)
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="card shadow-soft border-light">
                    <a class="block-2-item" href="">
                    <div style="height: 500px" class="card-header p-0">
                    <img src="{{is_null($member->image)?'/frontend/img/default.png':Voyager::image($member->image)}}" class="card-img-top rounded-top" alt="image">
                    </div>
                    <div class="card-body">
                    <h3 class="card-title mt-3">{{$member->name}}</h3>
                    <p class="text-info">{{$member->designation}}</p>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}