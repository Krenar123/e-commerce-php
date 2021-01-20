@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2 style="float:left; font-size:30px; font-weight:bold;">All products</h2>
                    @if ( Auth::check() && Auth::user()->role == "Market owner" )
                        <div class="pull-right">
                            <a style="float:right;" class="btn btn-danger" href="{{ route('products.create') }}">Create new product</a>
                        </div>
                    @endif
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="row" style="margin-top:60px;">        
                @foreach ($products as $product)
                    <div class="col-md-4 col-sm-12" style="margin-bottom:20px;">
                        <div class="card">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="color:black; font-weight:bold;">{{$product->product_name}}</h5>
                                <p class="card-text" style="font-size:14px;"><i>{{ \Illuminate\Support\Str::limit($product->product_description, 25, '...') }}</i></p>
                                <p class="card-text"> <span class="is-danger" style="font-size:14px;color:#dc3545;font-weight:bold;">{{ $product->product_price }}</span> / <span style="font-size:13px; font-weight:bold;">{{ $product->product_size }}</span></p>
                                <hr style="margin: 0.5rem 0;">
                                @if ( Auth::check() && Auth::user()->role == "Market owner" )
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a class="is-primary" href="{{ route('products.edit', $product->id) }}">Edit product</a>

                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @else
                                    <a class="is-info" href="{{ route('products.show', $product->id) }}">Show product</a>
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