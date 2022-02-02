<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
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
        $banners = Banners::all();
        return view('backend.banner.banner',compact('banners'));
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
        $advertisement = new Banners;
        $advertisement -> title = $request->title;
        $advertisement -> summary = $request->summary;
        $advertisement -> price = $request->price;
        $advertisement -> url = $request->url;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/banner/',$image_name);
            $advertisement->image=$image_name;
        }

        $advertisement->save();
        return response()->json(['success' => 'Data added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners=Banners::find($id);
        return view('backend.banner.bannerEdit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banners=Banners::find($id);
        $banners->title = $request->title;
        $banners->summary = $request->summary;
        $banners->price = $request->price;
        if($request -> hasFile('image')){
            $path = public_path().'/backend/assets/img/banner/'.$banners->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/backend/assets/img/banner/',$image_name);
            $banners->image=$image_name;
        }
        $banners->update();
        return redirect()->route('banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banners = Banners::find($id);
        if(!is_null($banners)){
            $image_path = public_path().'/backend/assets/img/banner/'.$banners->image;
            unlink($image_path);
            $banners->delete();
            return response()->json(['success'=>'Data deleted successfully']);
        }
    }
}
