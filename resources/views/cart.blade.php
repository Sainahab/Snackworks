@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <!-- Hero -->
    	<!-- Breadcrumbs -->
		<section class="page-banner" style="background: #121619 url({{ asset('assets/images/AAA.jpg') }}) no-repeat center / cover ;with:100%;>
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="page-title">
							<h1 class="page-headding">CART</h1>

                             <p style="color: #ffffff; " class="lead">See your cart items</p>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Breadcrumbs -->


    <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12 text-center">
            <?php $messages = Session::get('custom_errors'); ?>
            @if (!is_null($messages))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <ul>
                    @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
          </div>
        </div>
    </div>
    @if ( Cart::isEmpty())

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">No Items to show</h2>
                <a href="/menu" style="background-color: #fd9d3e; color:white" class="btn btn-lg mt-3">Return to menu</a>
            </div>
        </div>
    </div>
    @else

    <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <!-- Shopping cart table -->
                        <div class="table-responsive" >
                            <table class="table">
                                <thead >
                                    <tr >
                                        <th  scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Image</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Subtotal</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    $currency=get_current_currency()['symbol'];
                                    $sum=0;
                                    ?>
                                    <?php foreach(Cart::getContent() as $row) :?>
                                        <?php $i++;?>
                                        <tr>
                                            <td class="border-0 align-middle"><strong>

                                                <img src="{{is_null($row->model->primary_image)?'/frontend/img/default.png':Voyager::image($row->model->primary_image)}}" width="100px" height="100px" class="cart-image">
                                            </td>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="/product/{{$row->model->slug}}" class="text-dark d-inline-block align-middle"><?php echo $row->name; ?></a></h5>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>
                                                @if ($row->getPriceWithConditions()!=$row->price)
                                                    <del>{{$row->price}} {{$currency}} </del> {{$row->getPriceWithConditions()}} {{$currency}}
                                                @else
                                                    {{$row->price}} {{$currency}}
                                                @endif
                                                </strong>
                                            </td>
                                            <td class="border-0 align-middle">
                                                <strong>
                                                    <input type="number" id="qty{{$i}}" value="<?php echo $row->quantity;?>">
                                                </strong>
                                            </td>
                                            <td class="border-0 align-middle">
                                                <strong>
                                                    <?php echo $currency.$row->getPriceSumWithConditions();?>
                                                </strong>
                                            </td>
                                            <td class="border-0 align-middle"><a href="{{ url('/cart/removerowitem/'.$row->id) }}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        <tr>
                                        <input type="hidden" id="id{{$i}}" value="{{$row->id}}">
                                        <?php $sum=$sum+$row->getPriceSumWithConditions();?>
                                    <?php endforeach;?>
                                    <input type="hidden" id="val_i" value="{{$i}}">
                                </tbody>

                            </table>
                        </div>
                        <!-- End -->
                        <div class="row">
                            <div class="col-12 col-md-3 ml-3 mt-3">
                                <a href="{{ route('cart.removeall') }}" style="background-color: #fd9d3e; color:white" class="btn  py-2 btn-block">Remove all</a>
                            </div>
                            <div class="col-12 col-md-3 ml-3 mt-3">
                                <button id="updatecart" style="background-color: #fd9d3e; color:white" class="btn  py-2 btn-block">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="bg-light  px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>

                                <form action="{{route('cart.add-discount')}}" method="get">
                                    @csrf
                                    <div class="input-group mb-4 border  p-2">
                                        <input type="text" name="discount" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                        <div class="input-group-append border-0">
                                            <button type="submit" style="background-color: #fd9d3e; color:white" class="btn px-4 "><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light  px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                            <div class="p-4">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal</strong><strong>{{$row->price}} {{$currency}}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom">
                                        <strong class="text-muted">Discount
                                            @if(count(Cart::getConditionsByType('coupon'))!=0)
                                            ({{Cart::getConditionsByType('coupon')->first()->getName()}}) <a href="/cart/discountremove">remove</a>
                                            @endif
                                        </strong>
                                        <strong>{{count(Cart::getConditionsByType('coupon'))==0?'0':two_decimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum))}} {{$currency}}</strong>
                                    </li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal (after discount)</strong><strong>{{Cart::getSubTotal()}} {{$currency}}</strong></li>
                                    <?php $cartConditions = Cart::getConditions(); ?>
                                    @if (count($cartConditions)>0)
                                        @foreach($cartConditions as $condition)
                                            @if ($condition->getType()!='coupon')
                                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">{{$condition->getName()}}</strong><strong>{{two_decimal($condition->getCalculatedValue(Cart::getSubTotal()))}} {{$currency}}</strong></li>
                                            @endif
                                        @endforeach
                                    @endif
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">{{Cart::getTotal()}} {{$currency}}</h5>
                                    </li>
                                </ul>
                                <a href="/checkout" style="background-color: #fd9d3e; color:white" class="btn py-2 btn-block">Procceed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@section ('javascript')
    <script src="/frontend/assets/js/cart.js"></script>
@stop
