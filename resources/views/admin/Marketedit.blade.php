@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Market') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $user->id ) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                <input id="email" value="{{ $user->email }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="market_name" class="col-md-4 col-form-label text-md-right">{{ __('Market Name') }}</label>

                            <div class="col-md-6">
                                <input id="market_name" value="{{ $user->market_name }}" type="market_name" class="form-control @error('market_name') is-invalid @enderror" name="market_name" required autocomplete="market_name">

                                @error('market_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="market_address" class="col-md-4 col-form-label text-md-right">{{ __('Market Address') }}</label>

                            <div class="col-md-6">
                                <input id="market_address" value="{{ $user->market_address }}" type="market_address" class="form-control @error('market_address') is-invalid @enderror" name="market_address" required autocomplete="market_address">

                                @error('market_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger" style=" background:#ff4747; border:#ff4747;">
                                    {{ __('Update Market') }}
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
