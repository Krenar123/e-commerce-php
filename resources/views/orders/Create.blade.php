@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>
                <?php
                    $total_price = 0;
                    $all_products = "";
                ?>
                @foreach ($carts_elem as $product)
                    <?php
                        $tmp = \App\Models\Product::find($product->product_id);
                        $all_products .= $tmp->product_name." ".$tmp->product_price." ->".$product->quantity.";";
                        $total_price += ( (int)preg_replace("/[^0-9.]/", "", $tmp->product_price) * (int)preg_replace("/[^0-9.]/", "", $product->quantity) );
                    ?>
                @endforeach
                <?php
                    if ($total_price < 5){
                        $total_price += 2;
                    }
                ?>
                <div class="card-body">
                    <p style="text-align:center; max-width:330px; margin:0 auto; margin-bottom:30px; color: grey;"><i>Before you do the checkout, be aware that you get free shipping only if you order over <b>USD 5</b></i></p>
                    <form method="POST" action="{{ route('orders.store') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Order Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Sweet candy...">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="someone@example.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city" placeholder="Skopje">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required placeholder="Vizbegovo ul.1 br.92/B">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <input id="price" type="hidden" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price" value="{{ $total_price }}">
                        <input id="products" type="hidden" class="form-control @error('products') is-invalid @enderror" name="products" required autocomplete="price" value="{{ $all_products }}">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger" <?php if ($total_price == 0 ){ ?> disabled <?php   } ?> style=" background:#ff4747; border:#ff4747;">
                                    {{ __('Make the order') }}
                                </button>

                                <a href="{{ route('products.index') }}" type="submit" class="btn btn-light" style="margin-left:10px;">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection