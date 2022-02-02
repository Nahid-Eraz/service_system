@extends('backend.layout.master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="card">
          <div class="card-body">
            <a type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#provider_modal">
                New provider
            </a>
              @php
                  $i=0;
              @endphp
              <table id='table1'class="table">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th> 
                        <th>Phone</th>
                        <th>Email</th>
                        <th>NID</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($provider as $single_provider)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$single_provider->name}}</td>
                        <td>
                            <img class="img-fluid" style="height: 100px; width:100px" src="{{url('/backend/assets/img/provider/',$single_provider->photo)}}" alt="">
                        </td>
                        <td>{{$single_provider->phone_no}}</td>
                        <td>{{$single_provider->email}}</td>
                        <td>{{$single_provider->nid}}</td>
                        {{--/ <td>{{$single_provider->status}}</td> --}}
                        <td>
                            <a type="button" class="btn btn-sm btn-outline-primary"><i class="material-icons">visibility</i></a>
                            <a type="button" href={{route('provider.edit', $single_provider->id)}} class="btn btn-sm btn-outline-warning"><i class="material-icons">edit</i></a>
                            <a type="button" href="javascript:void(0)" data-id="{{ $single_provider->id}}" class="btn btn-sm btn-outline-danger deletebtn"><i class="material-icons">delete</i></a>
                        </td>
                      </tr>
                      @endforeach
                      
                  </tbody>
              </table>
          </div>
      </div>
    </div>
</div>

    {{-- Add Modal --}}
<div class="modal fade" id="provider_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Provider Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_provider" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone_num" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Date of Birth</label>
                            <input type="date" class="form-control" id="date" name="date" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Gender</label>
                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">National ID Card Number</label>
                            <input type="number" class="form-control" id="nid" name="nid" required >
                        </div>
                        <div class="fileinput fileinput-new ">
                            <label for="file">Insert Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>

                        <div class="form-group">
                            <label for="division_id">Division<span class="text-danger">*</span></label>
                            <select name="division_id" id="division_id" class="form-control">
                                <option selected disabled>Select Division</option>
                                @foreach ($division as $item )
                                        <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id">District<span class="text-danger">*</span></label>
                            <select name="district_id" id="district_id" class="form-control">
                                <option selected disabled>Select District</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="upazila_id">Upazila<span class="text-danger">*</span></label>
                            <select name="upazila_id" id="upazila_id" class="form-control">
                                <option selected disabled>Select Upazila</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Address<span class="text-danger">*</span></label>
                            <textarea type="text" name="address" rows="5" class="form-control" required></textarea>
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div> --}}
                        <div class="float-right">
                            <button type="submit" class="btn  btn-sm btn-gradient-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
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

<script>
    $('#add_provider').on('submit', function (e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } 
            });
            var formData = new FormData($('#add_provider')[0]);

            $.ajax({
            type: "post",
            url: "{{route('provider.add')}}",
            data: formData,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);

                $('#add_provider').find('input').val('');
                $('#provider_modal').modal('hide');
                alert("Data Save");
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert("Data not Save");
            }
            });
        });

    // delete option
    $('body').on('click', '.deletebtn', function(){
        let id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr('content');
        if(confirm("Do you want to delete this !!")){
            $.ajax({
                type: 'DELETE',
                url: 'provider/' + id,
                data: {
                    'id':id,
                    '_token': token,
                },
                success: function(data){
                    location.reload();
                },
                error: function(data){
                    console.log('Error:', data);
                }
            })
        }
    })

</script>

@endsection