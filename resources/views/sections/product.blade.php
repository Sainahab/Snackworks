<?php $currency=get_current_currency()['symbol'];?>
@foreach ($products as $product)

{{-- <div class="col-md-4"> --}}
    {{-- <div class="card card-product card-plain"> --}}
        <div class="col-xl-6 col-lg-6 col-md-6 product" data-category="{{$product->category_id}}">
            <div class="menu-list-box-2">
                <div class="list-img-2">
                    <a href="/product/{{$product->slug}}"><img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" /></a>
                </div>
                <span class="price-dec"><?php $sum=0; ?>
                    @foreach ($product->reviews as $review)
                        <?php $sum=$sum+$review->rating;?>
                    @endforeach
                    <?php
                    if(count($product->reviews)>0){
                        $average=$sum/count($product->reviews);
                    }
                    else{
                        $average=0;
                    }
                    ?>
                    <?php $review_rate=$average; ?>
                    <?php get_star_rating($review_rate);?></span>
                <div class="menu-detail-2">
                    <div class="iteam-name-list">
                        <a class="iteam-name" href="/product/{{$product->slug}}">{{$product->title}}</a>
                        <span class="iteam-srice">@if ($product->discounted_price>0)
                            <del>{{$product->regular_price}} {{$currency}}</del> {{$product->discounted_price}} {{$currency}}
                        @else
                            {{$product->regular_price}} {{$currency}}
                        @endif</span>
                    </div>
                    <p class="iteam-desc">{{$product->small_description}}</p>

                    {{-- <a href="#" class="iteam-order"> --}}
                        <form class="iteam-order d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                            <input style="background:none; border:none;text-align-last: left;"  type="number" value="1" name="quantity" class="form-control w-25">
                            <input  type="hidden" value="{{$product->id}}" name="id">
                            <button class="iteam-order" style="background:none; border:none; padding: 0 5px;text-align-last: center;"  class="btn btn-dark btn-md my-0 ml-2 p" type="submit">Add to cart
                                <i class="fas fa-shopping-cart ml-1"></i>

                            </button>
                        </form>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-2 col-lg-4 p-b-35 product" data-category="{{$product->category_id}}"> --}}


            {{-- <div class="card-body p-0 m-0">

                <h4 class="mt-3"><a href="/product/{{$product->slug}}">{{$product->title}}</a></h4>
                <p class="text-muted">{{is_null($product->category)?"Uncategorized":$product->category->name}}</p>
                <p> --}}
                    {{-- @if ($product->discounted_price>0)
                        <del>{{$currency}}{{$product->regular_price}}</del> {{$currency}}{{$product->discounted_price}}
                    @else
                        {{$currency}}{{$product->regular_price}}
                    @endif
                </p> --}}
                {{-- <div class="d-flex mb-4">
                    <?php $sum=0; ?>
                    @foreach ($product->reviews as $review)
                        <?php $sum=$sum+$review->rating;?>
                    @endforeach
                    <?php
                    if(count($product->reviews)>0){
                        $average=$sum/count($product->reviews);
                    }
                    else{
                        $average=0;
                    }
                    ?>
                    <?php $review_rate=$average; ?>
                    <?php get_star_rating($review_rate);?>
                </div>
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="card-image">
            <a href="/product/{{$product->slug}}">
                <img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" />
            </a>
        </div> --}}

    {{-- </div> --}}
    <!-- end card -->
{{-- </div> --}}
{{-- <style>
    .product {
        display: block;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
    }
</style> --}}
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
@endforeach
