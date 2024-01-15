<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Division;
use App\Models\District;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.pages.order.manage',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if(!is_null($order)){
            $products = Cart::orderBy('id','asc')->where('order_id',$order->id)->get();

            return view('backend.pages.order.details',compact('order','products'));
        }
        else{
            //404
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        if(!is_null($order)){
            $products = Cart::orderBy('id','asc')->where('order_id',$order->id)->get();

            return view('backend.pages.order.edit',compact('order','products'));
        }
        else{
            //404
        }
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
        $order = Order::find($id);
        if(!is_null($order)){
            $order->status = $request->status;

              
            $order->save();
            $notification = array(
                'message'=> 'Order Status Updated',
                'alert-type'=>'success',
            );
            return redirect()->route('order.edit',$order->id)->with($notification);
        }
        else{
            //4040
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
