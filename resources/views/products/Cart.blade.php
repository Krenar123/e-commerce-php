@extends('layouts.app')

@section('content')
<style>
    .add-to-cart .btn-qty {
        width: 52px;
        height: 46px;
    }
    .add-to-cart .btn { border-radius: 0; }
</style>
<div class="container" id="product-section">
    <div class="row" style="margin-top:20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="float:left;">
                <a  style="font-family: 'Poppins', sans-serif;" class="btn btn-light" href="{{ route('products.index') }}">Go back</a>
            </div>
        </div>
    </div>
    <?php
        $shipping_price = 2;
        $total_price = 0;
    ?>
    <div class="row" style="margin-top:60px;"> 
        <div class="col-md-8 col-lg-8">
            <div class="row">
                @foreach ($carts_elem as $product)
                    <div class="col-md-12">
                        <?php
                            $tmp = \App\Models\Product::find($product->product_id);
                            $total_price += ( (int)preg_replace("/[^0-9.]/", "", $tmp->product_price) * (int)preg_replace("/[^0-9.]/", "", $product->quantity) );
                        ?>
                        <div class="card mb-3" >
                            <div class="row g-0">
                                <div class="col-md-3" style="padding-right:0;">
                                @if ($tmp->image == "")
                                <img  style="height:100%;" src="{{asset('/storage/images/empty.png')}}" alt="Card image cap">
                            @else 
                                <img style="height:100%; width:100%; object-fit:cover;" src="{{ asset('/storage/images/products/'.$tmp->image) }}" alt="Card image cap">
                            @endif
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body" style="height:100%; display:flex; align-items:center;">
                                        <div style="width:100%;">
                                        <h5 class="card-title" style="font-weight:bold; font-size:20px;font-family: 'Poppins', sans-serif;">{{ $tmp->product_name }}</h5>
                                        <p class="card-text" style="font-family: 'Poppins', sans-serif;"><i>{{ $tmp->product_description }}</i></p>
                                        <p class="card-text"> <span class="is-danger" style="font-size:14px;color:#ff4747;font-weight:bold;font-family: 'Poppins', sans-serif;">{{ $tmp->product_price }}</span> / <span style="font-size:13px; font-weight:bold;font-family: 'Poppins', sans-serif;">{{ $tmp->product_size }}</span>
                                            <span style="float:right;">
                                                <form action="{{ url('/deletecart/' . $product->id) }}" method="POST" style="float:right;position:relative;top:-20px">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button style="border:none;background:none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>    
                                            </span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <?php
            $subtotal = $total_price;
            if( ($total_price >= 5) || ($total_price == 0) ){
                $shipping_price = 0;
            }
            else {
                $total_price += $shipping_price;
            }
        ?>
        <div class="col-md-4 col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title" style="font-size:25px;font-weight:bold;font-family: 'Poppins', sans-serif;">Order Summary</h2>
                            <p class="card-text">Subtotal <span id="subtotal" style="float:right;font-family: 'Poppins', sans-serif;">$ {{ $subtotal }}</span></p>
                            <p class="card-text">Shipping <span id="shipping" style="float:right;font-family: 'Poppins', sans-serif;">$ {{ $shipping_price }}</span></p>
                            <hr>
                            <p class="card-text" style="margin-bottom:25px;"><b>Total <span id="total" style="float:right;font-family: 'Poppins', sans-serif;">$ {{ $total_price }}</span><b></p>
                            <a href="{{ route('orders.create') }}" class="btn btn-primary" style="width:100%;background:#ff4747;border:#ff4747;font-family: 'Poppins', sans-serif;">Checkout</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><!-- end container -->

@endsection