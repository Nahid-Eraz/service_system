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
        $user_id = Auth::user()->id;

    @endphp


<div class="row pt-5">
    <div class="col-sm-4" style="height:600px; overflow-y: scroll">
        <div class="card border-0">
            {{-- <div class="border-0"> --}}
                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($workorder as $item  )
                        <a class="btn card-body nav-link" id="v-pills-{{ $item->id }}-tab" data-toggle="pill" href="#v-pills-{{ $item->id }}" role="tab" aria-controls="v-pills-{{ $item->id }}" aria-selected="false">
                            <p class="text-light">{{ ++$i }}. {{ $item->order_title }}</p><br>
                            <small class="text-light">{{ $item->expiration_date }}</small>
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
                    @foreach ($workorder as $item  )
                        <div class="tab-pane fade" id="v-pills-{{ $item->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $item->id }}-tab">
                            <ul id="orderrequest-{{ $item->id }}">
                                <li><h5 class="text-primary">{{ $item->order_title }}</h5></li>
                                <li><span>{{ $item->expiration_date }}</span></li>
                                <li><span><i class="fas fa-map-marker-alt"></i> {{ $item->address }},{{ $item->upazila->name }},{{ $item->district->name }},{{ $item->division->name }} </span></li>
                                <li><span class="text-info">{{ $item->category->name}}</span></li>
                                <li><p>{{ $item->worker_amount }} Person</p></li>
                                <li><p>{{ $item->order_description }}</p></li>
                                {{-- <li><p>{{ $item->orderrequest->id }}</p></li> --}}
                                <li class="text-right">
                                    @guest
                                        @if (Route::has('login'))
                                            <a type="button" class="btn btn-primary" href="{{ route('customer.login') }}">Request</a>
                                        @endif
                                    @else

                                    @php
                                        $orderrequest = App\Models\OrderRequests::select('work_order_id')->where('work_order_id',$item->id)->get();
                                        // $orreq = json_encode($orderrequest);
                                        echo( $orderrequest);
                                        // DB::table('work_odrder')->join('orderrequests', 'work_order.id', '=', 'orderrequests.work_order_id')->select('table1.*', 'table2.*')->get();
                                    @endphp
                                        @if(($item->users_id == $user_id))
                                            <a class="btn btn-md btn-primary disabled" onclick="orderRequest({{ $item->id }})" href="javascript:void(0);" >Request</a>
                                        @else
                                            {{-- @foreach($orderrequest as $item2)
                                                {{-- @if($item2->users_id == $user_id && $item->id == $item2->work_order_id )
                                                    <a class="btn btn-md btn-primary disabled" onclick="orderRequest({{ $item->id }})" href="javascript:void(0);" >Request</a>
                                                    @break
                                                @else
                                                    <a class="btn btn-md btn-primary" href="javascript:void(0);" onclick="orderRequest({{ $item->id }})">Request</a>
                                                    @continue
                                                @endif --}}


                                            {{-- @endforeach --}}
                                            <a class="btn btn-md btn-primary" href="javascript:void(0);" onclick="orderRequest({{ $item->id }})">Request</a>
                                        @endif

                                    @endguest
                                </li>
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
            <ul id="PositionForm_errorlist"></ul>
            <form class="forms-sample" id="OrderRequestform" method="post">
                @csrf
                <div style="display:none">
                    <input type="text" name="order_id" id="order_id">
                </div>
                <div style="display:none">
                    <input type="text" name="order_title" id="order_title">
                </div>
                <div class="form-group">
                  <label for="amount">Price</label>
                  <input type="number" name="amount" class="form-control" id="amount" aria-describedby="emailHelp" placeholder="150.00">
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
            $('#order_id').val(orderid.id);
            $('#order_title').val(orderid.order_title);
            $('#amount').val(orderid.amount);
            // $('#salary_range1').val(position.salary_range);
            // $('#balance').val(bank.balance);
            $('#OrderRequestModal').modal("toggle");
        });
    }



    $('#OrderRequestform').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#OrderRequestform')[0]);
            $.ajax({
                type: "post",
                url: "/order/request",
                data: myformData,
                cache: false,
                //enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if(response.status == 400){
                        $('#PositionForm_errorlist').html("");
                        $.each(response.errors, function (key, err_values) {
                            $("#PositionForm_errorlist").append('<li class="text-danger">'+err_values+'</li>');
                        });
                    }else{

                    $("#OrderRequestform").find('input').val('');
                    $('#OrderRequestModal').modal('hide');
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Position Successfully Added',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    location.reload();
                    }

                },
                error: function(error) {
                    console.log(error);
                    alert("Data Not Save");
                }
            });
        });
  </script>

@endsection
