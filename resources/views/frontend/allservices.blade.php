@extends('frontend.layouts.master')
@section('content')

<div class="popular-items p-5">
    <div class="container">
        <div class="row">
            @foreach ( $category as $item )
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="{{asset('/backend/assets/img/service/'.$item->image)}}" alt="" style="height: 250px">
                        <div class="img-cap">
                            <span>Select Now</span>
                        </div>
                    </div>
                    <div class="favorit-items">
                        <h3 class="">{{$item->name}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    

@endsection