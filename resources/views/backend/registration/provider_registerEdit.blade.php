@extends('backend.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{url('/provider/update/'.$provider->id)}}" id="provider" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Name</label>
                                <input type="text" name="name" value= "{{ $provider->name }}" readonly class="form-control" >
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Phone</label>
                                <input type="text" name="name" value= "{{ $provider->phone_no }}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Email</label>
                                <input type="email" name="name" value= "{{ $provider->email }}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Date of Birth</label>
                                <input type="date" name="name" value= "{{ $provider->date_of_birth }}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Gender</label>
                                <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                    <option value="{{$provider->gender}}">{{$provider->gender}}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">National ID Card Number</label>
                                <input type="text" name="name" value= "{{ $provider->nid }}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="district_id">Division<span class="text-danger">*</span></label>
                                <select name="division_id" id="division_id" class="form-control">
                                    <option selected  value="{{$provider->division_id}}">{{$provider->division->bn_name}}</option>
                                    @foreach ($division as $item )
                                        <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="district_id">District<span class="text-danger">*</span></label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option selected value="{{$provider->district_id}}">{{$provider->district->bn_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="upazila_id">Upazila<span class="text-danger">*</span></label>
                                <select name="upazila_id" id="upazila_id" class="form-control">
                                    <option selected value="{{$provider->upazila_id}}">{{$provider->upazila->bn_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                                <textarea type="text" name="address" rows="5" class="form-control" value="{{ $provider->address }}" required>{{ $provider->address }}</textarea>
                            </div>

                            <div class="fileinput fileinput-new">
                                <label for="file">Insert Image</label>
                                <input type="file" class="form-control-file" name="image" id="image" >
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <img class="img-fluid" style="height: 150px; width:150px" src="{{url('/backend/assets/img/provider/',$provider->photo)}}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#division_id').change(function() {

    var divisionID = $(this).val();

    if (divisionID) {
        // console.log(divisionID);
        $.ajax({
            type: "GET",
            url: "/provider/district/" + divisionID,
            success: function(res) {
                console.log(res);
                if (res) {

                    $("#district_id").empty();
                    $("#district_id").append('<option>জেলা নির্বাচন করুন</option>');
                    $.each(res, function(key, value) {
                        $("#district_id").append('<option value="' + value.id + '">' + value.bn_name +
                            '</option>');
                            //console.log(value);
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

    var districtID = $(this).val();
    // console.log(positionID);
    if (districtID) {

        $.ajax({
            type: "GET",
            url: "/provider/upazila/" + districtID,
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

@endsection