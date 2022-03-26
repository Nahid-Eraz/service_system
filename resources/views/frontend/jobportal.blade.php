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
    $today = Carbon\Carbon::now()->format('Y-m-d');
@endphp


<div class="row">
    <div class="col-sm-4">
        <div class="card border-0">
            {{-- <div class="border-0"> --}}
                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach (App\Models\WorkOrder::Where('expiration_date','>',$today)->get() as $item  )
                        <a class="btn card-body nav-link nav-text" id="v-pills-{{ $item->id }}-tab" data-toggle="pill" href="#v-pills-{{ $item->id }}" role="tab" aria-controls="v-pills-{{ $item->id }}" aria-selected="false">
                            {{ ++$i }}. {{ $item->order_title }}<br>
                            <small>{{ $item->expiration_date }}</small>
                            {{-- <hr> --}}
                        </a>
                        <hr>
                    @endforeach
                </div>
            {{-- </div> --}}
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card border-0">
            <div class="card-body border-0">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach (App\Models\WorkOrder::Where('expiration_date','>',$today)->get() as $item  )
                        <div class="tab-pane fade" id="v-pills-{{ $item->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $item->id }}-tab">
                            <ul id="orderrequest-{{ $item->id }}">
                                <li><h5 class="text-primary">{{ $item->order_title }}</h5></li>
                                <li><span>{{ $item->expiration_date }}</span></li>
                                <li><span><i class="fas fa-map-marker-alt"></i> {{ $item->address }},{{ $item->upazila->name }},{{ $item->district->name }},{{ $item->division->name }} </span></li>
                                <li><span class="text-info">{{ $item->category->name}}</span></li>
                                <li><p>{{ $item->worker_amount }} Person</p></li>
                                <li><p>{{ $item->order_description }}</p></li>
                                <li class="text-right">
                                @guest
                                    @if (Route::has('login'))
                                        <a type="button" class="btn btn-primary" href="{{ route('customer.login') }}">Request</a>
                                    @endif
                                @else
                                    <a class="btn btn-md btn-primary" href="javascript:void(0);" onclick="orderRequest({{ $item->id }})">Request</a>
                                @endguest</li>
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


<div class="modal fade" id="OrderRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enter Your Price</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="forms-sample" id="OrderRequestform" method="post">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="150.00">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

  <script>
      function orderRequest(id){
        $.get("/order/request/edit/"+id, function(orderid){
            $('#id').val(orderid.id);
            $('#exampleInputEmail1').val(orderid.id);
            // $('#salary_range1').val(position.salary_range);
            // $('#balance').val(bank.balance);
            $('#OrderRequestModal').modal("toggle");
        });
    }
  </script>

@endsection
