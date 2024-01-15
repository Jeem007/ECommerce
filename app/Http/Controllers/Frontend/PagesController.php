<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use\App\Models\Brand;
use\App\Models\Category;
use\App\Models\Product;
use\App\Models\User;
use\App\Models\Division;
use\App\Models\District;
use\App\Models\Cart;
use\App\Mail\contactMail;
use Auth;
use File;
use Image;
use Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.homepage');
    }

    //User Auth 
    public function Userlogin()
    {
        return view('frontend.pages.auth-user.login');
    }

    

    public function about()
    {
        return view('frontend.pages.static-pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.static-pages.contact');
    }
    public function contactMail(Request $request)
    {
        $mailData = [
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,

        ];
        // admin mail to see messages
        Mail::to('rakibjeem007@gmail.com')->send(new contactMail($mailData) );
        $notification = array(
            'message'=> 'Thank you.We have received your email ',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);

       
    }



//Products

public function products()
{
    $products = Product::orderBy('id','desc')->where('status','1')->get();

    return view('frontend.pages.product.all-products',compact('products'));
}
public function product_details( $slug)
{
    
        $pdetails = Product :: where ('slug',$slug)->first();
         return view('frontend.pages.product.product-details',compact('pdetails'));

    
}



    //Checkout
    public function checkout()
    {
        $divisions = Division :: orderBy('priority_num', 'asc')->get();
        $districts = District :: orderBy ('name','asc')->get();
        return view('frontend.pages.checkout',compact('divisions','districts') );
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
        //
    }
}
