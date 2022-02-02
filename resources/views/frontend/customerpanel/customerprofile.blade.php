@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-danger" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Status</a>
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
                Status
            </div>
        </div>

      </div>
</div>
{{-- {{ Auth::user()->name }} --}}
@endsection
