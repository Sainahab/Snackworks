@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

  <!-- Hero -->
  
  <section class="page-banner" style="background: #121619 url({{ asset('assets/images/check-out.png') }}) no-repeat center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="page-title">
						<h1  class="page-headding">Checkout</h1>
						<p style="color:white" class="lead">Please checkout with the items</p>
					</div>
				</div>
			</div>
		</div>
	</section>
  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-12 text-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>	
            <strong>{{ $message }}</strong>
        </div>
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

  <div class="container my-5">
    @if (!Auth::user())
      <div class="row mb-5">
        <div class="col-12 col-md-12">
          <div style="background-color: #fd9d3e; color:white" class="alert alert" role="alert">
            Returning customer? <a href="#" id="click_to_login"  class="alert-link">click here to login</a>
          </div>

          <div class="card border-light d-none" id="checkout_login">
            <div class="card-body">
              <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
              </p>
              <form action="{{route('checkout.login')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="email">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                  </div>
                </div>
                
                <button type="submit" style="background-color: #fd9d3e; color:white " class="btn btn-lg ">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div> 
    @endif
    <div class="row">  
      <?php 
      $currency=get_current_currency()['symbol'];
      if(!$customer){
        $billing_country='';
        $billing_address='';
        // $billing_phone= '';
        $billing_city='';
        $billing_state='';
        $billing_zip='';
        $shipping_country='';
        $shipping_address='';
        $shipping_city='';
        $shipping_state='';
        $shipping_zip='';
      }
      else{
        $billing_country=$customer->billing_country;
        $billing_address=$customer->billing_address;
        // $billing_phone=$customer->billing_phone;
        $billing_city=$customer->billing_city;
        $billing_state=$customer->billing_state;
        $billing_zip=$customer->billing_zip;
        $shipping_country=$customer->shipping_country;
        $shipping_address=$customer->shipping_address;
        $shipping_city=$customer->shipping_city;
        $shipping_state=$customer->shipping_state;
        $shipping_zip=$customer->shipping_zip;
      }

      if(Auth::user()){
        $name=auth()->user()->name;
        $email=auth()->user()->email;
        $phone=auth()->user()->phone;
        // $address=Auth()->user()->address:
      }
      else{
        $name=old('name');
        $email=old('email');
        $email=old('phone');
        // $address=old('address');
      }
                 
      ?>
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{Cart::getTotalQuantity()}}</span>
        </h4>
        <ul class="list-group mb-3">
          <?php $sum=0;?>
          @foreach (Cart::getContent() as $row)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$row->name}} ({{$row->quantity}})</h6>
              </div>
              <span class="text-muted">
                @if ($row->getPriceWithConditions()!=$row->price)
                  <del>{{$row->price}} {{$currency}} </del> {{$row->getPriceWithConditions()}} {{$currency}}
                @else
                {{$row->price}} {{$currency}}
                @endif
              </span>
            </li>
            <?php $sum=$sum+$row->getPriceSumWithConditions();?>
          @endforeach
          
          @if(count(Cart::getConditionsByType('coupon'))!=0)          
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code (<a href="/cart/discountremove">remove</a>)</h6>
              <small>{{Cart::getConditionsByType('coupon')->first()->getName()}}</small>
            </div>
            <span class="text-success">-{{$currency}}{{two_decimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum))}}</span>
          </li>
          @endif
          <li class="list-group-item d-flex justify-content-between">
            <span>Subtotal</span>
            <strong>{{Cart::getSubTotal()}} {{$currency}}</strong>
          </li>
          <?php $cartConditions = Cart::getConditions(); ?>
          @if (count($cartConditions)>0)
            @foreach($cartConditions as $condition)
              @if ($condition->getType()!='coupon')
                  <li class="list-group-item d-flex justify-content-between">
                    <span>{{$condition->getName()}}</span>
                    <strong>{{two_decimal($condition->getCalculatedValue(Cart::getSubTotal()))}} {{$currency}}</strong>
                  </li>
              @endif
            @endforeach
          @endif
          
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>{{Cart::getTotal()}} {{$currency}}</strong>
          </li>
        </ul>

        <form class="card p-2" action="{{route('cart.add-discount')}}" method="get">
          @csrf
          <div class="input-group">
            <input type="text" class="form-control" name="discount" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-8 order-md-1">
        <form id="myForm" id="billing-form" action="{{route('checkout.process')}}" method="post">
          @csrf
          <h4 class="mb-3">Billing Information</h4>
          <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="name" class="form-control" name="name" id="name" value="{{$name}}" placeholder="John Doe">
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$email}}" placeholder="you@example.com">
          </div>

          <div class="mb-3">
            <label for="number">Phone Number</label>
            {{-- <input type="number" class="form-control" name="number" value="" id="number" placeholder="066666666"> --}}
            <input type="tel" class="form-control" name="number" value="" id="number" id="phone" name="phone" maxlength="10" placeholder="0673545423" pattern="[0-9]{10}" required>
            <p id="error" style="color: red; display: none;">Phone number should start with zero.</p>

          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$billing_address}}" placeholder="1234 Main St">
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                {{-- <label class="form-control-label" for="country">Billing city</label>
                <select name="country" id="country">
                  <option class="form-control" name="city" id="city" value="{{$billing_city}}">Tangier</option>
                  @foreach ($countries as $country)
                    <option value="{{$country}}" {{$billing_country==$country?'selected':''}}>{{$country}}</option>
                  @endforeach
                </select> --}}
              </div>
            </div>
          </div>

          {{-- <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city" value="{{$billing_city}}" placeholder="">
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <input type="text" class="form-control" name="state" id="state" value="{{$billing_state}}" placeholder="">
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip">Zip</label>
              <input type="number" class="form-control" name="zip" id="zip" value="{{$billing_zip}}" placeholder="">
            </div>
          </div> --}}
          
          <hr class="mb-4">

          {{-- <div class="row mb-4">
            <div class="col-md-12">
              <input id="same-address" name="shipping_address_different" type="checkbox">
              <label class="custom-control-label" for="same-address">Shipping address different?</label>
            </div>
          </div>
          
          @include('sections.shipping')
          <hr class="mb-4">
          <div class="row"></div> --}}
          
          <button type="submit" style="background-color: #fd9d3e; color:white " class="btn btn-lg btn-block">Proceed</button>
        </form>
          
        </div>
      </div>
    </div>
  </div>
 
  
@stop

@section('javascript')

  <script src="/frontend/assets/js/checkout.js"></script>
  <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
      var numberInput = document.getElementById("number");
      var inputValue = numberInput.value;
      var errorText = document.getElementById("error");
      
      if (inputValue.length > 0 && inputValue.charAt(0) !== "0") {
        event.preventDefault(); // Prevent the form from being submitted
        errorText.style.display = "block";
      } else {
        errorText.style.display = "none";
      }
    });
  </script>
@endsection