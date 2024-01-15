<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use\App\Models\Product;
use\App\Models\User;
use\App\Models\Cart;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Checking if the product is already in cart or not
        if(Auth::check()){
            $cart = Cart :: where ('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('order_id', NULL)->first();
        }else{
            $cart = Cart :: where ('ip_address',request()->ip())->where('product_id',$request->product_id)->where('order_id', NULL)->first();
        }
        //If already exist
        if(!is_null($cart)){
           $cart->increment('quantity');

        }else{
            $cart = new Cart;
            if(Auth::check()){
                $cart->user_id     = Auth::user()->id;
            }else{
                $cart->ip_address  = request()->ip();
            }
            $cart->product_id      = $request->product_id;
            $cart->quantity        = $request->quantity;
            $cart->unit_price      = $request->unit_price;
            $cart->save();
        }
        $notification = array(
            'message'=> 'Item Added to Cart',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
       
       
      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart :: find ($id);
        if(!is_null($cart)){
            $cart ->delete();
            $notification = array(
                'message'=> 'Item Removed Successfully',
                'alert-type'=>'warning',
            );
            return redirect()->back()->with($notification);
        }
    }
}
