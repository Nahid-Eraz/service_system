@extends('frontend.layouts.master')
@section('content')

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Job opening</h2>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- Hero Area End-->

<!-- About Details Start -->
<div class='container-fluid'>
    @php
            $i=0;
    @endphp
    <table class="table display">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\WorkOrder::get() as $item )
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{$item->order_title}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{!!$item->order_description !!}</td>
                    <td>{{$item->division->bn_name}}, {{$item->district->bn_name}}, {{$item->upazila->bn_name}}, {{ $item->address }}</td>
                    <td>
                        <button class="btn-md btn-primary">Request</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- About Details End -->

@endsection