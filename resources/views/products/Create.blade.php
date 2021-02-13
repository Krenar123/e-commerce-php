@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($user->product_number == 0)
            <div class="alert alert-dark" role="alert">
                <p><i style="font-size:20px; margin-right:10px;" class="fas fa-pepper-hot"></i><b>Keni publikuar gjithsej 15 produkte nese doni te publikoni me shum, duhet te paguani planin mesatar ose te avancuar.</b></p>
            </div>
        @else 
            <div class="alert alert-dark" role="alert">
                <p><i style="font-size:20px; margin-right:10px;" class="fas fa-pepper-hot"></i><b>Ju kane mbetur gjithsej {{ $user->product_number }} produkte per te publikuar.</b></p>
            </div>
        @endif
            <div class="card">
                <div class="card-header" style="font-family: 'Poppins', sans-serif; font-weight:bold;">{{ __('Create a product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus placeholder="Bitolsko Milk">

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                            <div class="col-md-6">
                                <input id="product_description" type="text" class="form-control @error('product_description') is-invalid @enderror" name="product_description" required placeholder="Most required product...">

                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="product_category" class="col-md-4 col-form-label text-md-right">{{ __('Product Category') }}</label>

                            <div class="col-md-6">
                                <select id="product_category" class="form-control" name="product_category" required>
                                    <option value="Drinks">Drinks</option>
                                    <option value="Fast Foods">Fast Foods</option>
                                    <option value="Pastas">Pastas</option>
                                    <option value="Bakeries">Bakeries</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Sweets">Sweets</option>
                                    <option value="Sweets">Fruits</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="product_size" class="col-md-4 col-form-label text-md-right">{{ __('Product Size') }}</label>

                            <div class="col-md-6">
                                <input id="product_size" type="text" class="form-control @error('product_size') is-invalid @enderror" name="product_size" required autocomplete="product_size" placeholder="ex. 1 lt.">

                                @error('product_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" required autocomplete="product_price" placeholder="100$">

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Product Image')}}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" style="border:none;padding-left:0;">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if ($user->product_number == 0)
                                <button disabled type="submit" class="btn btn-danger" style=" background:#ff4747; border:#ff4747;font-family: 'Poppins', sans-serif;">
                                    {{ __('Create Product') }}
                                </button>
                                @else
                                <button type="submit" class="btn btn-danger" style=" background:#ff4747; border:#ff4747;font-family: 'Poppins', sans-serif;">
                                    {{ __('Create Product') }}
                                </button>
                                @endif
                                <a href="{{ route('products.index') }}" type="submit" class="btn btn-light" style="margin-left:10px;font-family: 'Poppins', sans-serif;">
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
