@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-danger" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" id="request-tab" data-toggle="tab" href="#request" role="tab" aria-controls="request" aria-selected="false">Job Request</a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="p-5 mb-5" style="">

                <h4 class="text-center">Personal Information</h4>
                <section class="confirmation_part section_padding">
                    <div class="container">
                      <div class="row">
                        {{-- <div class="col-lg-12">
                          <div class="confirmation_tittle">
                            <span>Thank you. Your order has been received.</span>
                          </div>
                        </div> --}}
                        <div class="col-lg-6 col-lx-4 m-auto p-4">
                          <div class="single_confirmation_details">
                            <ul>
                              <li>
                                <p>Name</p><span>: {{ Auth::user()->name }}</span>
                              </li>
                              <li>
                                <p>Phone</p><span>: ***********</span>
                              </li>
                              <li>
                                <p>Email</p><span>: {{ Auth::user()->email }}</span>
                              </li>
                              <li>
                                <p>Gender</p><span>: *********</span>
                              </li>
                              <li>
                                <p>Address</p><span>: *********</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-lx-4 m-auto p-4">
                            <img src="{{asset('frontend/assets/img/team/1.png')}}" alt="" height="80%" width="50%" style="">
                        </div>
                      </div>
                    </div>
                  </section>

            </div>

        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            {{-- testing --}}
            <div class="container">
                <div class="text-center pt-5">
                    <button class="btn-primary btn" data-toggle="modal" data-target="#exampleModal">Post A job</button>
                </div>
            </div>

            <table class="table mt-4">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Order Title</th>
                        <th>Date</th>
                        <th>Job Discription</th>
                        <th>Worker Amount</th>
                        <th>Action</th>
                    </tr>
                </tbody>
                <tbody>
                    @php
                        $i=0;
                        $auth_user = Auth::user()->id
                    @endphp
                    @foreach (App\Models\WorkOrder::where( 'users_id',$auth_user)->orderByDesc('expiration_date')->get() as $item )
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->order_title}}</td>
                            <td>{{ $item->expiration_date}}</td>
                            <td>{{ $item->order_description}}</td>
                            <td>{{ $item->worker_amount}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

      </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Post A New Job</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
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
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
{{-- {{ Auth::user()->name }} --}}
@endsection
