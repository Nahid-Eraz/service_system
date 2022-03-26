@extends('frontend.layouts.master')
@section('content')

<!--? Contact Us  Start-->
<div class="m-3 p-2" id="contact">

    <div class="container">

        <div class="section-tittle m-4 text-center">
            <h2 class="m-3" style="color:">Contact Us</h2>
            <h4 class="mb-5" style="color:red">We'd Love To Hear From You</h4>
        </div>

        <div class="col">

            <div class="row">

                <div class="col-md-7 m-auto p-4">
    
                    <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                          </div>
    
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile</label>
                            <input type="tel" class="form-control" id="inputMobile" placeholder="Mobile">
                          </div>
                        </div>
    
                        <div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
    
                        <div class="form-group">
                            <label for="alamat">Your Message</label>
                            <textarea class="form-control" id="alamat" col="5" rows="5" placeholder="Send Your Thoughts"></textarea>
                        </div>
    
                        <button type="submit" class="btn btn-primary"><i class="ti-email"></i> Send Mail</button>
                      </form>
    
                </div>
    
                <div class="col-md-5 m-auto p-4">
                    <img src="{{asset('frontend/assets/img/contact_us/contact.jpg')}}" alt="" height="75%" width="100%" style="border-radius: 10px">
                </div>
    
            </div>

            <div class="section-tittle mt-5 text-center">
                <h3 class="mb-5" style="color:red">Additional Contact Number For Get In Touch</h3>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6 text-center">

                    <h4>Can't find your desire service? Let us know in</h4>
                    <button onclick="window.open('tel:111222');" class="btn view-btn1"><i class="ti-headphone-alt"></i> 111222</button>
                    <button onclick="window.open('tel:123456789');" class="btn view-btn1"><i class="ti-headphone-alt"></i> 123456789</button>
                    <button onclick="window.open('tel:02123456');" class="btn view-btn1"><i class="ti-headphone-alt"></i> 02123456</button>
                    
                </div>
            </div>

        </div>

    </div>

</div>
<!-- Contact Us  End-->

@endsection