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
                <a  class="btn btn-light" href="{{ route('products.index') }}">Go back</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:60px;"> 
        <div class="col-md-8 col-lg-8">
            <div class="row">
                @foreach ($carts_elem as $product)
                    <div class="col-md-12">
                        <?php
                            $tmp = \App\Models\Product::find($product->product_id);
                        ?>
                        <div class="card mb-3" >
                            <div class="row g-0">
                                <div class="col-md-3" style="padding-right:0;">
                                    <img style="width:100%;" src="{{asset('/storage/images/empty.png')}}" alt="empty">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body" style="height:100%; display:flex; align-items:center;">
                                        <div style="width:100%;">
                                        <h5 class="card-title" style="font-weight:bold; font-size:20px;">{{ $tmp->product_name }}</h5>
                                        <p class="card-text"><i>{{ $tmp->product_description }}</i></p>
                                        <p class="card-text"> <span class="is-danger" style="font-size:14px;color:#ff4747;font-weight:bold;">{{ $tmp->product_price }}</span> / <span style="font-size:13px; font-weight:bold;">{{ $tmp->product_size }}</span>
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
        <div class="col-md-4 col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title" style="font-size:25px;font-weight:bold;">Order Summary</h2>
                            <p class="card-text">Subtotal <span id="subtotal" style="float:right;">$</span></p>
                            <p class="card-text">Shipping <span id="shipping" style="float:right;">$</span></p>
                            <hr>
                            <p class="card-text" style="margin-bottom:25px;"><b>Total <span id="total" style="float:right;">$</span><b></p>
                            <a href="#" class="btn btn-primary" style="width:100%;background:#ff4747;border:#ff4747;">Checkout</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><!-- end container -->
@endsection