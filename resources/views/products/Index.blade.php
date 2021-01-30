@extends('layouts.app')

@section('content')
<style>
    #shoppingbasket{
        text-decoration:none;
    }
</style>
<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2 style="float:left; font-size:30px; font-weight:bold;">All products</h2>
                    @if ( Auth::check() && Auth::user()->role == "Market owner" )
                        <div class="pull-right">
                            <a style="float:right;color: #ff4747;" class="btn btn-light" href="{{ route('products.create') }}">Create new product</a>
                            <a style="margin-right: 10px; float:right;color: #ff4747;" class="btn btn-light" href="{{ route('products.create') }}">Orders</a>
                        </div>
                    @else
                    <div style="display:flex; align-items:center;font-size:25px;margin-right:10px; color: #ff4747; float:right;">
                        <a href="/cart" id="shoppingbasket">
                        <i class="fas fa-shopping-basket"></i>
                        <span style="font-size:15px; font-weight:bold; position:relative;top:-10px; left:-5px;">{{ $carts_count }}</span>
                        </a>
                    </div>
                    @endif
                    
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="row" style="margin-top:50px;">        
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-12" style="margin-bottom:20px;">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('/storage/images/empty.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="color:black; font-weight:bold;">{{$product->product_name}}</h5>
                                <!-- <p class="card-text" style="font-size:14px;"><i>{{ \Illuminate\Support\Str::limit($product->product_description, 25, '...') }}</i></p> -->
                                <p class="card-text"> <span class="is-danger" style="font-size:14px;color:#ff4747;font-weight:bold;">{{ $product->product_price }}</span> / <span style="font-size:13px; font-weight:bold;">{{ $product->product_size }}</span></p>
                                <hr style="margin: 0.5rem 0;">
                                @if ( Auth::check() && Auth::user()->role == "Market owner" && Auth::user()->id == $product->user_id)
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a class="btn btn-danger" href="{{ route('products.show', $product->id) }}" style="padding-left:10px;padding-right:10px; background:#ff4747; border:#ff4747;">Shop Product</a>
                                        <a class="is-primary" href="{{ route('products.edit', $product->id) }}" style="font-size:13px;">Edit product</a>

                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" style="border:none; background-color:white;font-size:13px;">Delete</button>
                                    </form>
                                @else
                                    <a class="btn btn-danger" href="{{ route('products.show', $product->id) }}" style="padding-left:10px;padding-right:10px; background:#ff4747; border:#ff4747;">Shop Product</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection