@extends('backend.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{url('/banner/update/'.$banners->id)}}" id="banner_type" method="POST" enctype="multipart/from-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ $banners->title}}" class="form-control">
                            </div>

                            <div class="fform-group">
                                <input type="hidden" name="summary" id="summary">
                                <label for="summary">Summary</label>
                                <textarea type="text" name="summary" value="" class="form-control" cols="30" rows="5">{{ $banners->summary}}</textarea>
                            </div>

                            <div class="fform-group">
                                <input type="hidden" name="price" id="price">
                                <label for="price">Price</label>
                                <input type="text" name="price" value="{{ $banners->price}}" class="form-control">
                            </div>

                            <div class="fileinput fileinput-new">
                                <label for="file">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image" >
                            </div>

                            <div class="mform-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <img class="img-fluid" style="height: 150px; width:150px" src="{{url('/backend/assets/img/banner/',$banners->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection