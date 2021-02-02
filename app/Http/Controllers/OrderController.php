<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Client');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(5);
        return view('orders.Index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts_elem = Cart::where(['user_id' => auth()->id()])->paginate(5);
        return view('orders.Create', compact('carts_elem'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        $carts = Cart::where('user_id', auth()->id())->get();
        foreach($carts as $cart) {
            $product = Product::find($cart->product_id);
            Product::find($cart->product_id)->increment('ordered' , $cart->quantity);
            Notification::insert(['market_id' => $product->user_id, 'order_id' => $order->id,'product_name' => $product->product_name,'address' => $request['city'].', '.$request['address'], 'email' => $request['email'], 'shipping_price' => '','quantity' => $cart->quantity, 'price' => $product->product_price, 'order_created' => $order->created_at]);
        }
        
        Cart::where('user_id', auth()->id())->delete();

        $message = "The order was received successfully!";
        session::flash('success_message', $message);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
