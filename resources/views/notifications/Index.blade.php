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
                    <h2 style="float:left; font-size:30px; font-weight:bold;">All notifications</h2>
                    <a href="{{ route('products.index') }}" style="float:right;" class="btn btn-light">Go back</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="row" style="margin-top:50px;">        
                @foreach ($notifications as $notification)
                    <div class="col-md-12 col-sm-12" style="margin-bottom:20px;">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 20px; color:#333; font-weight:bold;"><u>{{$notification->product_name}}</u></h5>
                                <!-- <p class="card-text" style="font-size:14px;"><i>{{ \Illuminate\Support\Str::limit($notification->product_description, 25, '...') }}</i></p> -->
                                <p class="card-text"> <span class="is-danger" style="font-size:17px;color:#ff4747;font-weight:bold;"><span style="color:black;">Price:</span> $ {{ $notification->price }}</span> <span style="float:right;font-size:14px;color:black;font-weight:400;">{{ $notification->quantity }} pc.</span></p>
                                <hr style="margin: 0.5rem 0;">
                                <h5 class="card-title" style="color:black; ">Address: {{$notification->address}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection