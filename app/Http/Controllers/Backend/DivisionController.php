<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('priority_num','asc')->where('status',1)->get();
        return view('backend.pages.division.manage', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = new Division;
        $division->name          = $request->name;
        $division->slug          = Str::slug($request->name);
        $division->priority_num   = $request->priority_num;
        $division->status        = $request->status;
      
        $notification = array(
            'message'=> 'Division Added Successfully',
            'alert-type'=>'success',
        );
        $division ->save();
        return redirect()->route('division.manage')->with(($notification));
        
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
        $division = Division::find($id);
        if(!is_null($division)){

            return view('backend.pages.division.edit', compact('division'));
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
        $division = Division::find($id);
        if(!is_null($division)){
            $division->name          = $request->name;
            $division->slug          = Str::slug($request->name);
            $division->priority_num  = $request->priority_num;
            $division->status        = $request->status;
         


            $division->save();
            $notification = array(
                'message'=> 'Division Information Updated',
                'alert-type'=>'info',
            );

            return redirect()->route('division.manage')->with($notification);
        }else{
            
        }
    }
    public function trash(){
        $divisions = Division::orderBy('id','asc')->where('status',0)->get();
        return view('backend.pages.division.trash', compact('divisions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
        if(!is_null($division)){

            //$division->delete();
            //soft delete
            $division->status = 0;
            $division->save();
            $notification = array(
                'message'=> 'Division Removed',
                'alert-type'=>'error',
            );
            return redirect()->route('division.manage')->with($notification);
        }
        else{
            //404
        }
    }
}
