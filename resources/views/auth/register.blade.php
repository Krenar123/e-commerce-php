@extends('layouts.app')

<style>
    #client {
        display:none;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-family: 'Poppins', sans-serif; font-weight:bold;" class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-family: 'Poppins', sans-serif;" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  style="font-family: 'Poppins', sans-serif;" for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" onchange="changeFields()" name="role" required>
                                    <option value="Market owner">Market owner</option>
                                    <option value="Client">Client</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="market_na">
                            <label style="font-family: 'Poppins', sans-serif;" for="role" class="col-md-4 col-form-label text-md-right">{{ __('Market Name') }}</label>

                            <div class="col-md-6">
                            <input id="market_name" type="text" class="form-control" name="market_name">
                            </div>
                        </div>

                        <div class="form-group row" id="market_add">
                            <label style="font-family: 'Poppins', sans-serif;" for="role" class="col-md-4 col-form-label text-md-right">{{ __('Market Address') }}</label>

                            <div class="col-md-6">
                            <input id="market_address" type="text" class="form-control" name="market_address">
                            </div>
                        </div>

                        <div class="form-group row" id="client">
                            <label style="font-family: 'Poppins', sans-serif;" for="role" class="col-md-4 col-form-label text-md-right">{{ __('Client Address') }}</label>

                            <div class="col-md-6">
                            <input id="client_address" type="text" class="form-control" name="client_address">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="font-family: 'Poppins', sans-serif;" type="submit" class="btn btn-danger">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function changeFields() {
        const client = document.getElementById("client");
        const market_address = document.getElementById("market_add");
        const market_name = document.getElementById("market_na");

        if (document.getElementById("role").value == "Client"){
            market_address.style.display = "none";
            market_name.style.display = "none";
            client.style.display = "flex";
        }
        else {
            market_address.style.display = "flex";
            market_name.style.display = "flex";
            client.style.display = "none";
        }
    }
</script>