@extends('backend.layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_banner_modal">
                        Add Banner
                    </a>
                    @php
                        $i=0;
                    @endphp
                    <table id="table1" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $advertisement)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$advertisement->title}}</td>
                                    <td>{{$advertisement->summary}}</td>
                                    <td>
                                        <img class="img-fluid" style="height: 100px; width:100px" src="{{url('/backend/assets/img/banner/',$advertisement->image)}}" alt="">
                                    </td>
                                    <td>{{$advertisement->price}}</td>
                                    <td><a href="{{$advertisement->url}}" target="_blank" rel="noopener noreferrer">See More</a></td>
                                    <td>{{$advertisement->status}}</td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-primary"><i class="material-icons">visibility</i></a>
                                        <a type="button" href={{route('banner.edit', $advertisement->id)}} class="btn btn-sm btn-outline-warning"><i class="material-icons">edit</i></a>
                                        <a type="button" href="javascript:void(0)" data-id="{{ $advertisement->id}}" class="btn btn-sm btn-outline-danger deletebtn"><i class="material-icons">delete</i></a>
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
    <div class="modal fade" id="add_banner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_banner" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Summary</label>
                            <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
                        </div>
                        <div class="fileinput fileinput-new ">
                            <label for="file">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required >
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
        $('#add_banner').on('submit', function (e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } 
            });
            var formData = new FormData($('#add_banner')[0]);

            $.ajax({
            type: "post",
            url: "{{route('advertisement.add')}}",
            data: formData,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);

                $('#add_banner').find('input').val('');
                $('#add_banner_modal').modal('hide');
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
                    url: 'banner/' + id,
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