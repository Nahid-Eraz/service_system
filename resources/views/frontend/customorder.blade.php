@extends('frontend.layouts.master')
@section('content')
<div class="p-5 mb-5" style="background-color: #F08080">

    <div class="container" >
        <!-- Section tittle -->

        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle m-4 text-center">
                    <h2 style="color: white">Custom Order</h2>
                </div>
            </div>
        </div>

        <h3 class="text-center mb-3">Service Form</h3>

        <div class="d-flex">     
            <form id="custom_order_add" method="POST" enctype="multipart/form-data">
                @csrf
             <div class="row">

                <div class="form-group col-sm-6"> 
                    <label for="">Category Name</label>
                    <select name="category_id" id="category_id" class="form-control w-100">
                        <option selected disabled>Select Category</option>
                        @foreach (App\Models\Categories::get() as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6"> 
                    <label for="">Service Title</label>
                    <input type="text" id="" name="order_title" class="form-control" placeholder="Make a service title" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="division_id">Division<span class="text-danger">*</span></label>
                        <select name="division_id" id="division_id" class="form-control w-100">
                            <option selected disabled>Select Division</option>
                            @foreach ($division as $item )
                                <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="district_id">District<span class="text-danger">*</span></label>
                    <select name="district_id" id="district_id" class=" form-control w-100">
                        <option selected disabled>Select District</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="upazila_id">Upazila<span class="text-danger">*</span></label>
                    <select name="upazila_id" id="upazila_id" class="form-control w-100">
                        <option selected disabled>Select Upazila</option>
                    </select>
                </div>
    
                <div class="form-group col-sm-6"> 
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Add address" required>
                </div>

                <div class="form-group col-sm-6"> 
                    <label>Time and Date</label>
                    <input type="date" class="form-control" name="expiration_date"required>
                </div>
    
                  {{-- <div class="form-group col-sm-6">
                      <label>Enviornment Status</label>
                      
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                            <label class="form-check-label" for="gridRadios1">
                            Indoor
                            </label>
                        </div>
                        <div class="form-check col-sm-6">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                            Outdoor
                            </label>
                        </div>
                        <div class="form-check col-sm-6">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                            Both
                            </label>
                        </div>
    
                  </div> --}}
    
                <div class="form-group col-sm-6">
                    <label for="umur">Workers</label>
                    <input type="number" name="worker_amount" min= 0 id="" class="form-control" placeholder="Select Worker amount" required>
                </div>
              
                <div class="form-group col-sm-6">
                    <label for="alamat">Description</label>
                    <textarea class="form-control" name="order_description" id="alamat" rows="3" placeholder="Brief about the service"></textarea>
                </div>   
             </div>
             @guest
                 @if (Route::has('login'))
                    <a type="button" class="btn btn-primary" href="{{ route('customer.login') }}">Login</a>
                 @endif
            @else
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
            @endguest
             

            </form>
        </div>

    </div>

</div>

<script>
    $('#division_id').change(function() {

    let divisionID = $(this).val();
    // console.log(divisionID);

    if (divisionID) {
        // console.log(divisionID);
        $.ajax({
            type: "GET",
            url: "/custom/order/district/" + divisionID,
            success: function(res) {
                
                if (res) {
                    // console.log(res);
                    $("#district_id").empty();
                    $("#district_id").append('<option>জেলা নির্বাচন করুন</option>');
                    $.each(res, function(key, value) {
                        $("#district_id").append('<option value="' + value.id + '">' + value.bn_name +
                            '</option>');
                            // console.log(value);
                    });

                } else {

                    $("#district_id").empty();
                }
            }
        });
    } else {

        $("#district_id").empty();
        $("#upazila_id").empty();
    }
    });

    $('#district_id').on('change', function() {

    let districtID = $(this).val();
    // console.log(positionID);
    if (districtID) {

        $.ajax({
            type: "GET",
            url: "/custom/order/upazila/" + districtID,
            success: function(res) {
                // console.log(res);
                if (res) {
                    $("#upazila_id").empty();
                    $("#upazila_id").append('<option>উপজেলা নির্বাচন করুন</option>');
                    $.each(res, function(key, value) {
                        $("#upazila_id").append('<option value="' + value.id + '">' + value.bn_name +
                            '</option>');

                    });

                } else {

                    $("#upazila_id").empty();
                }
            }
        });
    } else {

        $("#upazila_id").empty();
    }
    });
</script>

<script>
    
    $('#custom_order_add').on('submit', function (e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } 
            });
            var formData = new FormData($('#custom_order_add')[0]);

            $.ajax({
            type: "post",
            url: "{{route('customorder.add')}}",
            data: formData,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);

                $('#custom_order_add').find('input').val('');
                // $('#provider_modal').modal('hide');
                alert("Data Save");
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert("Data not Save");
            }
            });
        });
</script>

@endsection