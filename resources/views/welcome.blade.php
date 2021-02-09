
@extends('layouts.landing')

@section('content')

<!--       
            <div class="card">
            <img src="/img/fruit.jpg" alt="cover">
                <div class="card-header">Online Shopping Market</div>

                <div class="card-body"> -->
               
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <header class="masthead mb-auto">
    <div class="inner">
      <div class="masthead-brand"> <img src="/img/logo.png" alt="logo" style="width:180px;" class="img-responsive" /></div>
      <nav class="nav nav-masthead justify-content-center">
                         @guest                                  
                                        <a style="font-family: 'Poppins', sans-serif;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                           
                                        <a style="font-family: 'Poppins', sans-serif;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endguest
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading" style="font-size:50px;font-weight:bold;font-family: 'Poppins', sans-serif;">Do your Grocery Online!</h1>
    <p class="lead" style="font-family: 'Poppins', sans-serif;"></p>Per ju oferta dhe sherbime shtes vetem ne Speci i Kuq</p>
    <a href="/speci-info">Kliko per me shum informacion</a>
  </main>

  <footer class="mastfoot mt-auto">

  </footer>
</div>          
           
        
@endsection
