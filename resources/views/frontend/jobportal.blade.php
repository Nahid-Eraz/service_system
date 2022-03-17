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
    {{-- <table class="table display">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Expriation Date</th>
                <th>Category</th>
                <th>Description</th>
                <th>Address</th>
                <th>Total Applied</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
                $today = Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            @foreach (App\Models\WorkOrder::Where('expiration_date','>',$today)->get() as $item )
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{$item->order_title}}</td>
                    <td>{{$item->expiration_date}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{!!$item->order_description !!}</td>
                    <td>{{$item->division->bn_name}}, {{$item->district->bn_name}}, {{$item->upazila->bn_name}}, {{ $item->address }}</td>
                    <td>2</td>
                    <td>
                        @guest
                            @if (Route::has('login'))
                                <a type="button" class="btn btn-primary" href="{{ route('customer.login') }}">Request</a>
                            @endif
                        @else
                            <button class="btn-md btn-primary">Request</button>
                        @endguest

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    @php
    $i=0;
    $today = Carbon\Carbon::now()->format('Y-m-d');
@endphp


<div class="row">
    <div class="col-sm-4">
        <div class="card border-0">
            <div class="card-body border-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach (App\Models\WorkOrder::Where('expiration_date','>',$today)->get() as $item  )
                        <a class="nav-link text-dark" id="v-pills-{{ $item->id }}-tab" data-toggle="pill" href="#v-pills-{{ $item->id }}" role="tab" aria-controls="v-pills-{{ $item->id }}" aria-selected="false">
                            {{ ++$i }}. {{ $item->order_title }}<br>
                            <small>{{ $item->expiration_date }}</small>
                            <hr>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card border-0">
            <div class="card-body border-0">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach (App\Models\WorkOrder::Where('expiration_date','>',$today)->get() as $item  )
                        <div class="tab-pane fade" id="v-pills-{{ $item->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $item->id }}-tab">
                            <ul>
                                <li><h5 class="text-primary">{{ $item->order_title }}</h5></li>
                                <li><span>{{ $item->expiration_date }}</span></li>
                                <li><span><i class="fas fa-map-marker-alt"></i> {{ $item->address }},{{ $item->upazila->name }},{{ $item->district->name }},{{ $item->division->name }} </span></li>
                                <li><span class="text-info">{{ $item->category->name}}</span></li>
                                <li><p>{{ $item->worker_amount }} Person</p></li>
                                <li><p>{{ $item->order_description }}</p></li>
                                <li></li>
                            </ul>






                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- About Details End -->

@endsection
