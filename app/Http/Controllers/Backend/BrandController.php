<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Validation\Rules\Exists;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','asc')->where('status',1)->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name          = $request->name;
        $brand->slug          = Str::slug($request->name);
        $brand->description   = $request->description;
        $brand->status        = $request->status;
      

        if($request->image){
            $image = $request->file('image');
            $img = time().'-br.' .$image->getClientOriginalExtension();
            $location = public_path('images/brand/' . $img);
            Image ::make($image)->save($location);
            $brand->image = $img;
        }

        // dd($brand); for checking data

        $brand ->save();
        $notification = array(
            'message'=> 'Brand Created Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('brand.manage')->with($notification);
        
        




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
        $brand = Brand::find($id);
        if(!is_null($brand)){

            return view('backend.pages.brand.edit', compact('brand'));
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
        $brand = Brand::find($id);
        if(!is_null($brand)){
            $brand->name          = $request->name;
            $brand->slug          = Str::slug($request->name);
            $brand->description   = $request->description;
            $brand->status        = $request->status;
            if($request->image){

                if(File::exists('images/brand/' .$brand->image)){
                    File::delete('images/brand/' .$brand->image);
                }
                
                $image = $request->file('image');
                $img = time().'-br.' .$image->getClientOriginalExtension();
                $location = public_path('images/brand/' . $img);
                Image ::make($image)->save($location);
                $brand->image = $img;
            }
    
            // dd($brand); for checking data
    
            $brand->save();
            $notification = array(
                'message'=> 'Brand Information Updated',
                'alert-type'=>'info',
            );
            return redirect()->route('brand.manage')->with($notification);
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
        $brands = Brand::orderBy('id','asc')->where('status',0)->get();
        return view('backend.pages.brand.trash', compact('brands'));
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(!is_null($brand)){
            //Image delete

            //$brand->delete();
            //soft delete
            $brand->status = 0;
            $brand->save();
            $notification = array(
                'message'=> 'Brand Successfully Removed',
                'alert-type'=>'error',
            );
            return redirect()->route('brand.manage')->with($notification);
        }
        else{
            //404
        }
        
    }
}
