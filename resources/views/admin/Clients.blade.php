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
                    <h2 style="float:left; font-size:30px; font-weight:bold;">All Clients</h2>
                    <a href="{{ route('admin.index') }}" style="float:right;" class="btn btn-light">Markets</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="row" style="margin-top:50px;">        
                @foreach ($users as $user)
                    <div class="col-md-12 col-sm-12" style="margin-bottom:20px;">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 20px; color:#333; font-weight:bold;"><u>{{$user->name}}</u></h5>
                                <!-- <p class="card-text" style="font-size:14px;"><i>{{ \Illuminate\Support\Str::limit($user->product_description, 25, '...') }}</i></p> -->
                                <p class="card-text"> <span class="is-danger" style="font-size:17px;color:#ff4747;font-weight:bold;"><span style="color:black;">Client:</span> {{$user->email}}</span></p>
                                <hr style="margin: 0.5rem 0;">
                                <h5 class="card-title" style="color:black;margin-top:20px; ">Address: {{$user->client_address}}</h5>
                                <hr>
                                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="text-align:center; height:36px; padding-top:5px;">
                                    <a class="is-primary" href="{{ route('admin.clientedit', $user->id) }}" style="font-size:14px;">Edit</a>

                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" style="border:none; background-color:white;font-size:14px;">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection