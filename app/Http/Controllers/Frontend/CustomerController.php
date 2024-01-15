<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Models\User;
use\App\Models\Division;
use\App\Models\District;

use Illuminate\Support\Str;
use Auth;
use File;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Hash;
use Image;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth :: check()){
           $divisions = Division :: orderBy('priority_num', 'asc')->get();
           $districts = District :: orderBy ('name','asc')->get();
            return view('frontend.pages.Customer-dashboard.myaccount',compact('divisions','districts'));
        }else{
            return redirect()->route('userlogin');
        }
       
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
        $user = User :: find($id);
        if(!is_null($user)){
            $user->name             = $request->name;
            $user->email            = $request->email;
            $user->phone            = $request->phone;
            $user->address_line1    = $request->address_line1;
            $user->address_line2    = $request->address_line2;
            $user->zipCode          = $request->zipCode;
            $user->district_id      = $request->district_id;
            $user->division_id      = $request->division_id;
            $user->country_name     = $request->country_name;
           
            if($request->image){

                if(File::exists('images/user/' .$user->image)){
                    File::delete('images/user/' .$user->image);
                }
                
                $image = $request->file('image');
                $img = time().'-br.' .$image->getClientOriginalExtension();
                $location = public_path('images/user/' . $img);
                Image ::make($image)->save($location);
                $user->image = $img;
            }
   
            $user->save();
            $notification = array(
                'message'=> 'Information Updated Successfully',
                'alert-type'=>'info',
            );
            return redirect()->route('Customer_Dashboard')->with($notification);
        }else{
            //404
        }

        }


        public function password_update(Request $request, $id)
        {
            $user = User :: find($id);
            if(!is_null($user)){  
                
                        if($request->password == $request->password_confirmation){
                            $user->password = Hash::make($request->password);
                            $user->save();
                            $notification = array(
                            'message'=> 'Password Updated Successfully',
                            'alert-type'=>'info',
                        );
                          
                        }else{
                            $notification = array(
                                'message'=> 'Password Dont Match!!',
                                'alert-type'=>'error',
                            ); 
                        }
                        
                    
                   
                
                return redirect()->route('Customer_Dashboard')->with($notification);
                }
                else{
                    //404
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

