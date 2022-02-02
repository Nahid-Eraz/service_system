<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $categories = Categories::all();
        return view('backend.category.category',compact('categories'));
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
        $service = new Categories;
        $slug = Str::slug($request->name);
        $service -> name = $request->name;
        $service -> env_cat = $request->env_cat;
        $service -> slug = $slug.'/'.date('ymdis').'-'.rand(0,9999);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/service/',$image_name);
            $service->image=$image_name;
        }
        $service->save();
        return response()->json(['success'=> 'Data added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Categories::find($id);
        return view('backend.category.categoryEdit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories=Categories::find($id);
        $categories->name = $request->name;
        $categories->env_cat = $request->env_cat;
        if($request -> hasFile('image')){
            $path = public_path().'/backend/assets/img/service/'.$categories->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/service/',$image_name);
            $categories->image=$image_name;
        }
        $categories->update();
        return redirect()->route('category');
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        if(!is_null($categories)){
            
            if($categories->image == NULL){
                $categories->delete();
                return response()->json(['success'=>'Data deleted successfully']);
            }
            else{
                $image_path = public_path().'/backend/assets/img/service/'.$categories->image;
                unlink($image_path);
                $categories->delete();
                return response()->json(['success'=>'Data deleted successfully']);
            }
            
            
        }
    }
}
