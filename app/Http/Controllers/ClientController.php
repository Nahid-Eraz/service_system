<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profileview()
    {
        $division = Division::get();
        return view('frontend.customerpanel.customerprofile',compact('division'));
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
    // public function create()
    // {
    //     //
    // }

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
    protected $redirectTo = RouteServiceProvider::user_HOME;
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'user_type' => ['string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
    public function userregister( Request $request){
        // return User::create([
        //     'name' => $data['name'],
        //     'user_type' => $data['user_type'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),

        // ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request ->email;
        $users->password = Hash::make($request['password']);
        $users->user_type= 'customer';
        $users->save();
        // return redirect()->RouteServiceProvider::user_HOME;
        return redirect()->route('homepage');
    }
    public function login(){
        // return view('frontend.login');
        return back()->withInput();

    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'user_type'=> 'customer'])){
            $request->session()->put('user', $data['email']);
            request()->session()->flash('success','Successfully login');
            return view('frontend.customerpanel.customerprofile');;
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }
    public function logout(){
        Session()->forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return redirect()->route('homepage');
    }
    public function register(){
        return view('frontend.signin');
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'user_type'=>'required',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        $request->session()->put('user', $data['email']);

        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('login.form');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }

    public function create(array $data){
        // if(request()->has('image')){
        //     $image = request()->file('image');
        //     $image_name = time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path().'/backend/assets/images/users/',$image_name);

        //     return User::create([
        //         'name'=>$data['name'],
        //         'email'=>$data['email'],
        //         'role'=>$data['role'],
        //         'address'=>$data['address'],
        //         'phone'=>$data['phone'],
        //         'password'=>Hash::make($data['password']),
        //         'image'=>$image_name,
        //         ]);
        // }

        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'user_type'=>$data['user_type'],
            // 'address'=>$data['address'],
            // 'phone'=>$data['phone'],
            'password'=>Hash::make($data['password']),
            ]);
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
