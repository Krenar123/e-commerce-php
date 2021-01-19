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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a style="margin-left:60px;" class="btn btn-light" href="{{ route('products.index') }}">Go back</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-6" style="height:600px; text-align:center;">
            <img style="height:100%; border-radius:10px;" src="/img/milk.jpg" alt="Kodak Brownie Flash B Camera" class="image-responsive"/>
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
                    <h2 class="product-price" style="font-size:18px; font-weight:bold; color:#dc3545;">{{ $product->product_price}}</h2>
                </div>
            </div><!-- end row -->
            
            <div class="row" style="margin-top:40px; margin-bottom:10px;">
                <div class="col-md-12">
                    <p class="description">
                    {{ $product->product_description}}
                    </p>
                </div>
            </div><!-- end row -->
            <hr>
            <div class="row add-to-cart">
                <div class="col-md-5 product-qty">
                    <span class="btn btn-default btn-lg btn-qty">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </span>
                    <input class="btn btn-default btn-lg btn-qty" value="1" />
                    <span class="btn btn-default btn-lg btn-qty">
                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </span>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-lg btn-brand btn-full-width">
                    Add to Cart
                    </button>
                </div>
            </div><!-- end row -->
        </div>
    </div><!-- end row -->
</div><!-- end container -->
@endsection