<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\District;
use App\Models\Division;
use App\Models\OrderRequests;
use App\Models\Upazila;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FrontpageController extends Controller
{
    public function allservices()
    {
        $category=Categories::get();
        return view('frontend.allservices',compact('category'));
    }

    public function getdivision(){
        $division = Division::get();
        return view('frontend.customorder',compact('division'));
    }

    public function getdistrict($id){
        $district = District::where('division_id', $id)->get();
        return response()->json($district);
    }

    public function getupazila($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilla);
    }

    public function custom_order_store(Request $request){

        $workorder = new WorkOrder;


        $workorder->users_id = Auth::user()->id;
        $workorder->category_id = $request->category_id;
        $workorder->division_id = $request->division_id;
        $workorder->district_id = $request->district_id;
        $workorder->upazila_id = $request->upazila_id;
        $workorder->order_title = $request->order_title;
        $workorder->order_description = $request->order_description;
        $workorder->address = $request->address;
        $workorder->expiration_date = $request->expiration_date;
        $workorder->worker_amount = $request->worker_amount;
        $workorder->status = 0;
        $workorder->move_to_trash = 0;
        $workorder->slug = Str::slug($request->order_title);;

        $workorder->save();
        return response()->json(['success' => 'Data added successfully']);
    }
    public function request_order($id)
    {
        $workorder = WorkOrder::find($id);
        return response()->json($workorder);
    }
    public function request_order_store(Request $request){

        $workorder = new OrderRequests;
        $workorder->users_id = Auth::user()->id;
        $workorder->order_title = $request->order_title;
        $workorder->order_description = $request->order_description;
        $workorder->address = $request->address;
        $workorder->expiration_date = $request->expiration_date;
        $workorder->worker_amount = $request->worker_amount;
        $workorder->status = 0;
        $workorder->move_to_trash = 0;
        $workorder->slug = Str::slug($request->order_title);;

        $workorder->save();
        return response()->json(['success' => 'Data added successfully']);
    }


}
