@extends('backend.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{url('/category/update/'.$categories->id)}}" id="service_type" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Name</label>
                                <input type="text" name="name" value= "{{ $categories->name }}" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Service Type</label>
                                <select class="form-control" name="env_cat" id="env_cat">
                                  <option selected value="{{$categories->env_cat}}">{{$categories->env_cat}}</option>
                                  <option value="indoor">Indoor</option>
                                  <option value="outdoor">Outdoor</option> 
                                </select>
                            </div>

                            <div class="fileinput fileinput-new">
                                <label for="file">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image" >
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <img class="img-fluid" style="height: 150px; width:150px" src="{{url('/backend/assets/img/service/',$categories->image)}}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
