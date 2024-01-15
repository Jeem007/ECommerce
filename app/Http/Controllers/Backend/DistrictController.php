<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('name','asc')->where('status',1)->get();
        return view('backend.pages.district.manage', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::orderBy('priority_num','asc')->where ('status',1)->get();
        return view('backend.pages.district.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district = new District;
        $district->name          = $request->name;
        $district->slug          = Str::slug($request->name);
        $district->division_id   = $request->division_id;
        $district->status        = $request->status;
      

        $district ->save();
        $notification = array(
            'message'=> 'District Added Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('district.manage')->with($notification);
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
        $district = District::find($id);
        $divisions = Division::orderBy('priority_num','asc')->where ('status',1)->get();
        if(!is_null($district)){

            return view('backend.pages.district.edit', compact('district','divisions'));
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
        $district = District::find($id);
        if(!is_null($district)){
            $district->name          = $request->name;
            $district->slug          = Str::slug($request->name);
            $district->division_id   = $request->division_id;
            $district->status        = $request->status;
         

            $district->save();


            $notification = array(
                'message'=> 'District Information Updated',
                'alert-type'=>'info',
            );
            return redirect()->route('district.manage')->with($notification);
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
        $districts = District::orderBy('id','asc')->where('status',0)->get();
        return view('backend.pages.district.trash', compact('districts'));
    }
    public function destroy($id)
    {
        $district = District::find($id);
        if(!is_null($district)){

            //$division->delete();
            //soft delete
            $district->status = 0;
            $district->save();
            $notification = array(
                'message'=> 'District Removed',
                'alert-type'=>'error',
            );
            return redirect()->route('district.manage')->with($notification);
        }
        else{
            //404
        }
    }
}
