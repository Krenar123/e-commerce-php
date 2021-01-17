@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="product_name" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus placeholder="Bitolsko Milk">

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                            <div class="col-md-6">
                                <input id="product_description" type="product_description" class="form-control @error('product_description') is-invalid @enderror" name="product_description" required placeholder="Most required product...">

                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>

                            <div class="col-md-6">
                                <select id="product_category" class="form-control" name="product_category" required>
                                    <option value="Drinks">Drinks</option>
                                    <option value="Fast Foods">Fast Foods</option>
                                    <option value="Pastas">Pastas</option>
                                    <option value="Bakeries">Bakeries</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Sweets">Sweets</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_size" class="col-md-4 col-form-label text-md-right">{{ __('Product Size') }}</label>

                            <div class="col-md-6">
                                <input id="product_size" type="product_size" class="form-control @error('product_size') is-invalid @enderror" name="product_size" required autocomplete="product_size" placeholder="ex. 1 lt.">

                                @error('product_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="product_price" class="form-control @error('product_price') is-invalid @enderror" name="product_price" required autocomplete="product_price" placeholder="100$">

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Create Product') }}
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
