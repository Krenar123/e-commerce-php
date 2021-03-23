<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        $carts_count = Cart::where(['user_id' => auth()->id()])->count();
        return view('products.Index', compact(['products', 'carts_count']))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function payment(){
        return view('products.Payment');
    }
     
    public function paymentstore(){
        $user = User::find(auth()->id());
        $user->paid = "true";
        $user->save();

        return view('products.Create', compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(auth()->id());
        if ( (($user->plan == "Mesatar") && ($user->product_number == 100) && ($user->paid != "true" ) ) || (($user->plan == "Avancuar") && ($user->product_number == 15000) && ($user->paid != "true" )) ){
            return view('products.Payment', compact(['user']));
        }
        return view('products.Create', compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_category' => 'required',
            'product_size' => 'required',
            'product_price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image'))
        {
            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $image_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
        }
        
        $request->merge([
            'image' => $request->file('image')->getClientOriginalName(),
        ]);
        $user = User::find(auth()->id());
        if($user->product_number > 0){
            $product = Product::create($request->all());
            Product::find($product->id)->update(['image' => $request->file('image')->getClientOriginalName()]);
            $user->product_number -= 1;
            $user->save();
        }
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $carts_count = Cart::where(['user_id' => auth()->id()])->count();
        return view('products.Show',compact(['product', 'carts_count']));
    }

    public function addtocart(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $getProductPrice = Product::where(['id' => $data['product_id']])->first();

            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }

            /*
            Ktu nese implementohet per sa produkte jan edhe nuk ka produkte mos lejo mu bo add
            $countProducts = Cart::where(['product_id' => $data['product_id'], 'quantity' => $data['quantity']])->count();
            if( $countProducts > 0){
                $message = "No more of these products!";
                session::flash('error_message', $message);
                return redirect()->back();
            }   
            */
            Cart::insert(['session_id' => $session_id, 'user_id' => auth()->id(), 'product_id' => $data['product_id'], 'quantity' => $data['quantity']]);
            $message = "Product added to the cart";
            session::flash('success_message', $message);
            return redirect()->back();
        }
    }

    public function cart(){
        $carts_elem = Cart::where(['user_id' => auth()->id()])->paginate(5);
        return view('products.Cart', compact('carts_elem'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function deletecart($id){
        Cart::where(['id' => $id])->first()->delete();

        return redirect()->route('products.Cart');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.Edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_size' => 'required',
            'product_category' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $cart_products = Cart::where('product_id', $product->id)->delete();

        $product->delete();

        return redirect()->route('products.index');
    }
}
