@extends('layouts.app')

@section('content')
<style>
    .add-to-cart .btn-qty {
        width: 52px;
        height: 46px;
    }
    .add-to-cart .btn { border-radius: 0; }
    #shoppingbasket{
        text-decoration:none;
    }
</style>
<div class="container" id="product-section">
    <div class="row" style="margin-top:20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="float:left;">
                <a  class="btn btn-light" href="{{ route('products.index') }}">Go back</a>
            </div>
            <div style="display:flex; align-items:center;font-size:25px;margin-right:10px; color: #ff4747; float:right;">
                <a href="/cart" id="shoppingbasket">
                <i class="fas fa-shopping-basket"></i>
                <span style="font-size:15px; font-weight:bold; position:relative;top:-10px; left:-5px;">{{ $carts_count }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-6" style="height:600px; text-align:center;">
            <img style="height:100%; border-radius:10px;" src="{{asset('/storage/images/products/'.$product->image)}}" alt="Kodak Brownie Flash B Camera" class="image-responsive"/>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-size:30px;">{{ $product->product_name }}</h1>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                    <i><span>{{ $product->product_category }}</span></i>
                </div>
            </div><!-- end row -->
            <div class="row" style="margin-top:10px; margin-bottom:10px;">
                <div class="col-md-3">
                    <span class="sr-only">Four out of Five Stars</span>
                    <span style="color:#1266f1;" class="fas fa-star" aria-hidden="true"></span>
                    <span style="color:#1266f1;" class="fas fa-star" aria-hidden="true"></span>
                    <span style="color:#1266f1;" class="fas fa-star" aria-hidden="true"></span>
                    <span style="color:#1266f1;" class="fas fa-star" aria-hidden="true"></span>
                    <span style="color:#1266f1;" class="far fa-star" aria-hidden="true"></span>
                </div>
            </div><!-- end row -->
            <div class="row" style="margin-top:10px; margin-bottom:10px;">
                <div class="col-md-12 bottom-rule">
                    <h2 class="product-price" style="font-size:25px; font-weight:bold; color:#ff4747;"><span style="color:black;">US</span> {{ $product->product_price}}</h2>
                </div>
            </div><!-- end row -->
            <hr>
            <p style="font-weight:bold;font-size:18px;margin-bottom:10px;">Description</p>
            <div class="row" style=" margin-bottom:10px;">
                <div class="col-md-12">
                    <p class="description">
                    {{ $product->product_description}}
                    </p>
                </div>
            </div><!-- end row -->
            <hr>
            <p style="font-weight:bold;font-size:18px;margin-bottom:10px;">Shipping</p>
            <div class="row" style=" margin-bottom:10px;">
                <div class="col-md-12">
                    <p class="description">
                        Free shipping on orders over <b>MKD 300</b>
                    </p>
                </div>
            </div><!-- end row -->
            <hr>
            <style>
                #minus:hover, #plus:hover {
                    cursor:pointer;
                }
            </style>
            <script>
                function minusValue(){
                    var value = parseInt(document.getElementById("shopvalue").value);
                    if (value > 1){
                        value -= 1;
                        document.getElementById("shopvalue").value = "" + value;
                        document.getElementById("addtocart").value = "" + value;
                    }
                }
                function plusValue(){
                    var value = parseInt(document.getElementById("shopvalue").value);
                    
                    value += 1;
                    document.getElementById("shopvalue").value = "" + value;
                    document.getElementById("addtocart").value = "" + value;
                }
            </script>
            <div class="row add-to-cart">
                <div class="col-md-5 product-qty">
                    <span class="btn btn-default btn-lg btn-qty">
                    <span class="fa fa-minus-circle" id="minus" onclick="minusValue()" aria-hidden="true" style="color:#1266f1;"></span>
                    </span>
                    <input class="btn btn-default btn-lg btn-qty" value="1" id="shopvalue" />
                    <span class="btn btn-default btn-lg btn-qty">
                    <span class="fa fa-plus-circle" id="plus" onclick="plusValue()" aria-hidden="true" style="color:#1266f1;"></span>
                    </span>
                </div>
                <div class="col-md-4">
                    <form action="{{ url('add-to-cart') }}" method="post" >
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                        <input type="hidden" name="quantity" value="1" id="addtocart"/>
                        <button type="submit" class="btn btn-lg btn-brand btn-full-width" style="background:#ff4747; color:white; border-radius:5px; width:100%; font-size:17px;">
                        Add to Cart
                        </button>
                    </form>
                </div>
            </div><!-- end row -->
        </div>
    </div><!-- end row -->
</div><!-- end container -->
@endsection