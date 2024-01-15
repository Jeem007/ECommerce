<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use File;
use Image;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->where('status','1')->get();
        return view('backend.pages.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name','asc')->where('status',1)->get();
        $pcategories = Category::orderBy('name','asc')->where('is_parent',0)->get();
        return view('backend.pages.product.create',compact('brands','pcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product = new Product();
         $product->title                = $request->title;
         $product->slug                 = Str::slug($request->title);
         $product->brand_id             = $request->brand_id;
         $product->category_id          = $request->category_id;
         $product->is_featured          = $request->is_featured;
         $product->regular_price        = $request->regular_price;
         $product->offer_price          = $request->offer_price;
         $product->quantity             = $request->quantity;
         $product->status               = $request->status;                 
         $product->short_desc           = $request->short_desc;
         $product->long_desc            = $request->long_desc;

        $product ->save();
        $notification = array(
            'message'=> 'Product Added Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('product.manage')->with($notification);
         
         
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
        $product = Product::find($id);
        if(!is_null($product)){

            $brands = Brand::orderBy('name','asc')->where('status',1)->get();
            $pcategories = Category::orderBy('name','asc')->where('is_parent',0)->get();

            return view('backend.pages.product.edit', compact('product','brands','pcategories'));
        }else{
            //404 data not found
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
        $product = Product::find($id);
        if(!is_null($product)){
           
         $product->title                = $request->title;
         $product->slug                 = Str::slug($request->title);
         $product->brand_id             = $request->brand_id;
         $product->category_id          = $request->category_id;
         $product->is_featured          = $request->is_featured;
         $product->regular_price        = $request->regular_price;
         $product->offer_price          = $request->offer_price;
         $product->quantity             = $request->quantity;
         $product->status               = $request->status;                 
         $product->short_desc           = $request->short_desc;
         $product->long_desc            = $request->long_desc;

    
            // dd($brand); for checking data
    
            $product->save();
            $notification = array(
                'message'=> 'Product Information Updated',
                'alert-type'=>'info',
            );
            return redirect()->route('product.manage')->with($notification);
        }else{
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function trash(){
        $products = Product::orderBy('id','asc')->where('status',0)->get();
        return view('backend.pages.product.trash', compact('products'));
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
           
            $product->status = 0;
            $product->save();
            $notification = array(
                'message'=> 'Product Successfully Removed',
                'alert-type'=>'error',
            );
            return redirect()->route('product.manage')->with($notification);
        }
        else{
            //404
        }
    }
}
