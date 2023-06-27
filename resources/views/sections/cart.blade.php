
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
    <?php
    $i=0;
    $currency=get_current_currency()['symbol'];
    $sum=0;
    ?>
    <?php foreach(Cart::getContent() as $row) :?>
        <?php $i++;?>
<li>
    {{-- <a href="{{ url('/cart/removerowitem/'.$row->id) }}" class="text-dark" style="text-align:right" ><i class="fa fa-times-circle"></i></a> --}}
    {{-- <a class="close-cart"><i class="fa fa-times-circle"></i></a> --}}
    <div class="media">
    {{-- <a href="#" class="pull-left"> <img alt="shop" src="images/f7.png"></a> --}}
    <a href="#" class="pull-left"><img src="{{is_null($row->model->primary_image)?'/frontend/img/default.png':Voyager::image($row->model->primary_image)}}" class="cart-image">
    </a>
    <div class="media-body"> <span><a href="/product/{{$row->model->slug}}" class="text-dark d-inline-block align-middle"><?php echo $row->name; ?></a></span>

        <p class="cart-price"><strong>
            <?php echo $row->getPriceSumWithConditions()." ".$currency;?>
        </strong></p>
        <div class="product-qty">

            <div class="custom-qty">
                <label>Qty:</label>
                <strong >
                    <input  class="input-text qty" type="number" id="qty{{$i}}" value="<?php echo $row->quantity;?>">
                </strong>
            </div>
        </div>

    </div>
    <a href="{{ url('/cart/removerowitem/'.$row->id) }}" class="text-dark" style="text-align:right">
        <i class="fa fa-times-circle"></i>
    </a>
    </div>

</li>
<input type="hidden" id="id{{$i}}" value="{{$row->id}}">
<?php $sum=$sum+$row->getPriceSumWithConditions();?>
<?php endforeach;?>
<input type="hidden" id="val_i" value="{{$i}}">


@endif

@section ('javascript')
    <script src="/frontend/assets/js/cart.js"></script>


@stop
