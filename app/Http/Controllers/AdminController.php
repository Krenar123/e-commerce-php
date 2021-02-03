<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Cart;
use App\Models\User;
use Session;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->role = Auth::user()->role;
            if($this->role != "Admin"){
                return redirect("/products");
            }
            return $next($request);
        });
    }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function client()
    {
        $users = User::where('role', "Client")->get();

        return view('admin.Clients', compact('users'));
    }

    public function index()
    {
        $users = User::where('role', "Market owner")->get();

        return view('admin.Index', compact('users'));
    }

    public function login()
    {
        return view('admin.Login');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request["username"] == "ad" && $request["password"] == "adminKorN"){
            $users = User::where('role', "Market owner")->get();
            session(['username' => $request["username"]]);
            return view('admin.Index', compact('users'));
        }
        else {
            return redirect()->route('admin.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function marketedit($id)
    {   
        $user = User::find($id);
        return view('admin.Marketedit',compact('user'));
    }

    public function clientedit($id)
    {
        $user = User::find($id);
        return view('admin.Clientedit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $products = Product::where('user_id', $id);
        foreach($products as $product){
            Cart::where('product_id', $product->id)->delete();
        }
        
        Product::where('user_id', $id)->delete();
        $user->delete();

        return redirect()->route('admin.index');
    }
}
