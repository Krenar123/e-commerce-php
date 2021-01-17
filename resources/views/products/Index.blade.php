@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="pull-left">
            <h2>All products</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-danger" href="{{ route('products.create') }}">Create new product</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card-deck">
        @foreach ($products as $product)
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text">{{$product->product_description}}</p>
                    <p class="card-text"><small class="text-muted">{{$product->product_price}} {{$product->product_size}}</small></p>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show product</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit product</a>

                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        </div>
        </div>
    </div>
</div>
@endsection