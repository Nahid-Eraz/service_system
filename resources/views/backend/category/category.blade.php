@extends('backend.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="card">
          <div class="card-body">
            <a type="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_service_modal">
                Add Services Category
            </a>
              @php
                  $i=0;
              @endphp
              <table id='table1'class="table">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Service Type</th>
                        <th>Name</th>
                        <th>Image</th> 
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $item)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>
                        @if ($item->env_cat=='indoor')
                            Indoor
                        @elseif ($item->env_cat=='outdoor')
                            Outdoor
                        @endif
                        </td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img class="img-fluid" style="height: 100px; width:100px" src="{{url('/backend/assets/img/service/',$item->image)}}" alt="">
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a type="button" class="btn btn-sm btn-outline-primary"><i class="material-icons">visibility</i></a>
                            <a type="button" href={{route('service.edit', $item->id)}} class="btn btn-sm btn-outline-warning"><i class="material-icons">edit</i></a>
                            <a type="button" href="javascript:void(0)" data-id="{{ $item->id}}" class="btn btn-sm btn-outline-danger deletebtn"><i class="material-icons">delete</i></a>
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
<div class="modal fade" id="add_service_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="service_type" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Service Type</label>
                    <select class="form-control" name="env_cat" id="env_cat">
                      <option selected disabled>Please Select One</option>
                      <option value="indoor">Indoor</option>
                      <option value="outdoor">Outdoor</option> 
                    </select>
                  </div>
                  <div class="fileinput fileinput-new">
                    <label for="file">Image</label>
                    <input type="file" class="form-control-file" name="image" id="image" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
</div>


<script>
    $('#service_type').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }           
        });
        var formData = new FormData($('#service_type')[0]);

        $.ajax({
            type: "post",
            url: "{{route('service.add')}}",
            data: formData,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);

                $('#service_type').find('input').val('');
                $('#add_service_modal').modal('hide');
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
                url: 'category/' + id,
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