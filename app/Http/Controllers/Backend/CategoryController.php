<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Validation\Rules\Exists;
use Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','asc')->where('status',1)->where('is_parent',0)->get();
        return view('backend.pages.category.manage', compact('categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $parentCategories =  Category::orderBy('id','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.create',compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name          = $request->name;
        $category->slug          = Str::slug($request->name);
        $category->description   = $request->description;
        $category->is_parent     = $request->is_parent;
        $category->status        = $request->status;
      

        if($request->image){
            $image = $request->file('image');
            $img = time().'-br.' .$image->getClientOriginalExtension();
            $location = public_path('images/category/' . $img);
            Image ::make($image)->save($location);
            $category->image = $img;
        }

        // dd($brand); for checking data

        $category ->save();
        $notification = array(
            'message'=> 'Categoty Created Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('category.manage')->with($notification);
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
        $category = Category::find($id);
        if(!is_null($category)){
            $parentCategories =  Category::orderBy('id','asc')->where('is_parent',0)->get();

            return view('backend.pages.category.edit', compact('parentCategories','category'));
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
        $category = Category::find($id);
        if(!is_null($category)){
            $category->name          = $request->name;
            $category->slug          = Str::slug($request->name);
            $category->description   = $request->description;
            $category->is_parent     = $request->is_parent;
            $category->status        = $request->status;
            if($request->image){

                if(File::exists('images/category/' .$category->image)){
                    File::delete('images/category/' .$category->image);
                }
                
                $image = $request->file('image');
                $img = time().'-br.' .$image->getClientOriginalExtension();
                $location = public_path('images/category/' . $img);
                Image ::make($image)->save($location);
                $category->image = $img;
            }
    
            // dd($brand); for checking data
    
            $category->save();
            $notification = array(
                'message'=> 'Category Information Updated',
                'alert-type'=>'info',
            );
            return redirect()->route('category.manage')->with($notification);
        }else{
            
        }
    }
    
    public function trash(){
        $categories = Category::orderBy('id','asc')->where('status',0)->get();
        return view('backend.pages.category.trash', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!is_null($category)){
            //Image delete

            //$category->delete();
            //soft delete
            $category->status = 0;
            $category->save();
            $notification = array(
                'message'=> 'Category Successfully Removed',
                'alert-type'=>'error',
            );
            return redirect()->route('category.manage')->with($notification);
        }
        else{
            //404
        }
    }
}
