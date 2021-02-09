@extends('layouts.app')

@section('content')
<script
    src="https://www.paypal.com/sdk/js?client-id=ASuUe09wtr5-aH16L_m7NZLgvYoCubqDI-2JsWKKcUd91-ySyZwZlwssirJY7lIIVjWKBOYCoeA8qhdI"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-family: 'Poppins', sans-serif; font-weight:bold;" class="card-header">{{ __('Checkout') }}</div>
                <?php
                    if($user->plan == "Fillestar"){
                        $total_price = 0;
                    }
                    else if($user->plan == "Mesatar"){
                        $total_price = 7;
                    }
                    else if($user->plan == "Avancuar"){
                        $total_price = 11;
                    }
                ?>
                <div class="card-body">
                    <p style="font-family: 'Poppins', sans-serif; text-align:center; max-width:330px; margin:0 auto; margin-bottom:30px; color: grey;"><i>Per te vazhduar me tutje duhet qe te paguani tatimin mujor prej <b>USD {{ $total_price }}.</b></i></p>
                    <form method="POST" action="{{ route('products.paymentstore') }}" id="myForm">
                        @csrf
                        
                        <input id="paid" type="hidden" class="form-control @error('price') is-invalid @enderror" name="paid" required autocomplete="price" value="">
                    </form>
                        <input id="price_paid" type="hidden" class="form-control @error('price') is-invalid @enderror" name="price_paid" required autocomplete="price" value="{{ $total_price }}">
                    <div class="row" style="margin-top:20px;">
                    <div class="offset-md-3 col-md-6">
                        <div id="paypal-button-container" ></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const pay_price = document.getElementById("price_paid");
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: pay_price.value
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        console.log(details);
        document.getElementById("paid").value = "true";
        document.getElementById("myForm").submit();
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

@endsection
