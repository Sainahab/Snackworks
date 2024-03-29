@extends('layouts.app')

@section('title', 'Order')

@section('content')

    <!-- Hero -->
    <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-7.jpg') }}) no-repeat center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="page-title">
						<h1  class="page-headding" >Order Details</h1>
						<p style="color:white" class="lead">See your order details here</p>
					</div>
				</div>
			</div>
		</div>
	</section>
    {{-- <section class="bg-primary text-white pt-7 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">Order Details</h1>
                <p class="lead">See your order details here</p>
                </div>
            </div>
        </div>
    </section> --}}

   
    <div class="section py-5 bg-soft">
        <div class="container">
            <div class="row justify-content-center">

                @include('partials.dashboardsidebar')

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="color:#fd9d3e">Order Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <h4 style="color:#fd9d3e"><b> Invoice No. #{{$order->invoice_id}}</b></h4>
                                    {{-- <h4>Shipping Info</h4> --}}
                                    {{-- <p><strong>Shipping name: </strong>{{$order->billing_name}}</p>
                                    <p><strong>Shipping email: </strong>{{$order->billing_email}}</p>
                                    <p><strong>Shipping phone: </strong>{{$order->billing_phone}}</p>
                                    <p><strong>Billing address: </strong>{{$order->billing_address}}</p>
                                    <p><strong>Payment method: </strong>{{$order->payment_method}}</p> --}}
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4><b>Shipping Info</b> </h4>
                                    {{-- <p><strong>Billing country: </strong>{{$order->billing_country}}</p> --}}
                                    <strong>Shipping name: </strong>{{$order->billing_name}}</p>
                                    <strong>Shipping phone: </strong>{{$order->billing_phone}}</p>
                                    <strong>Shipping email: </strong>{{$order->billing_email}}</p>
                                    <strong>Shipping address: </strong>{{$order->billing_address}}</p>
                                    <strong>Payment method: </strong>{{$order->payment_method}}</p>
                                    {{-- <p><strong>Billing city: </strong>{{$order->billing_city}}</p>
                                    <p><strong>Billing state: </strong>{{$order->billing_state}}</p>
                                    <p><strong>Billing zip: </strong>{{$order->billing_zip}}</p> --}}
                                </div>
                                <div class="col-12 col-md-6">
                                    {{-- <h4>Shipping Info</h4> --}}
                                    
                                    {{-- <p><strong>Billing address: </strong>{{$order->billing_address}}</p> --}}

                                    {{-- <p><strong>Shipping country: </strong>{{is_null($order->shipping_country)?'N/A':$order->shipping_country}}</p>
                                    <p><strong>Shipping address: </strong>{{is_null($order->shipping_address)?'N/A':$order->shipping_address}}</p>
                                    <p><strong>Shipping city: </strong>{{is_null($order->shipping_city)?'N/A':$order->shipping_city}}</p>
                                    <p><strong>Shipping state: </strong>{{is_null($order->shipping_state)?'N/A':$order->shipping_state}}</p>
                                    <p><strong>Shipping zip: </strong>{{is_null($order->shipping_zip)?'N/A':$order->shipping_zip}}</p> --}}
                                </div>
                            </div>
                            <h4 style="color:#fd9d3e"><b> Ordered Items</b> </h4>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="table-responsive-sm">
                                        <?php $currency=get_current_currency()['symbol'];
                                        if(!is_null($order->ordered_items)){
                                            $ordered_items=unserialize(base64_decode($order->ordered_items));
                                        }
                                        else{
                                            $ordered_items=NULL;
                                        }
                                        ?>
                                        @if (!is_null($ordered_items))
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody>
                                                    <?php $sum=0;?>
                                                    <?php foreach($ordered_items as $row) :?>
                                                        <tr>
                                                        @include('sections.order_summery')
                                                        </tr>
                                                        <?php $sum=$sum+$row->getPriceSumWithConditions();?>
                                                    <?php endforeach;?>
                                            
                                                </tbody>
                                                
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Subtotal</td>
                                                        <td><?php echo $currency.$sum; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Discount</td>
                                                        <td><?php echo $currency.$order->discount; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Subtotal after discount</td>
                                                        <td><?php echo $currency.($sum-$order->discount<0?'0':$sum-$order->discount); ?></td>
                                                    </tr>
                                                    <?php 
                                                    $cartConditions = unserialize(base64_decode($order->conditions)); 
                                                    ?>
                                                    @if (count($cartConditions)>0)
                                                        @foreach($cartConditions as $condition)
                                                            @if ($condition->getType()!='coupon')
                                                            <tr>
                                                                <td colspan="2">&nbsp;</td>
                                                                <td>{{$condition->getName()}}</td>
                                                                <td>{{two_decimal($condition->getCalculatedValue($order->total_amount))}} {{$currency}}</td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Total</td>
                                                        <td>{{$order->total_amount}} {{$currency}}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        @endif 
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="/dashboard/orders" style="background-color:#fd9d3e; color:white" class="btn">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@stop

