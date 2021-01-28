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
        @foreach ($carts as $cart)
            <p>{{ $cart->session_id }}</p>
        @endforeach
    </div>
</div><!-- end container -->
@endsection