<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Provider;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = Provider::get();
        $division = Division::get();
        return view('backend.registration.provider_register',compact('division','provider'));
    }

    public function getdistrict($id){
        $district = District::where('division_id', $id)->get();
        return response()->json($district);
    }

    public function getupazila($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilla);
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
        $users = new User;
        $users->name = $request->name;
        $users->email = $request ->email;
        $users->password = Hash::make($request['password']);
        $users->user_type= 'provider';
        $users->save();

        $provider = new Provider;
        $provider-> user_id = $users->id;
        $provider-> phone_no = $request->phone_num;
        $provider-> email = $request->email;
        $provider-> date_of_birth = $request->date;
        $provider-> gender = $request->gender;
        $provider-> nid = $request->nid;
        $provider-> division_id = $request->division_id;
        $provider-> district_id = $request->district_id;
        $provider-> upazila_id = $request->upazila_id;
        $provider-> address = $request->address;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/provider/',$image_name);
            $provider->photo=$image_name;
        }

        $provider->save();
        return response()->json(['success'=>'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider=Provider::find($id);
        $division = Division::get();
        $district = District::get();
        $upazilla = Upazila::get();
        return view('backend.registration.provider_registerEdit', compact('provider','division','district','upazilla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider=Provider::find($id);
        $provider->name = $request->name;
        $provider-> phone_no = $request->phone_num;
        $provider-> email = $request->email;
        $provider-> date_of_birth = $request->date;
        $provider-> gender = $request->gender;
        $provider-> nid = $request->nid;
        $provider-> division_id = $request->division_id;
        $provider-> district_id = $request->district_id;
        $provider-> upazila_id = $request->upazila_id;
        $provider-> address = $request->address;

        if($request -> hasFile('image')){
            $path = public_path().'/backend/assets/img/provider/'.$provider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/provider/',$image_name);
            $provider->image=$image_name;
        }
        $provider->update();
        return redirect()->route('provider');
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        if(!is_null($provider)){
            
            if($provider->image == NULL){
                $provider->delete();
                return response()->json(['success'=>'Data deleted successfully']);
            }
            else{
                $image_path = public_path().'/backend/assets/img/provider/'.$provider->image;
                unlink($image_path);
                $provider->delete();
                return response()->json(['success'=>'Data deleted successfully']);
            }
        }
    }
}
