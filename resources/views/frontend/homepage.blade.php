@extends('frontend.layouts.master')
@section('content')

<!-- slider Area Start-->
<div class="slider-area ">
    <div class="slider-active">
        <!-- Single Slider -->
        @foreach (App\Models\Banners::get() as $item )
            <div class="single-slider slider-height d-flex align-items-center slide-bg">
            <div class="container">
                
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">{{$item->title}}</h1>
                            <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">{{$item->summary}}</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                <a href="{{$item->url}}" class="btn hero-btn">Start Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="{{url('/backend/assets/img/banner/'.$item->image)}}" alt="" class="img-fluid heartbeat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Single Slider -->
        
    </div>
</div>
<!-- slider Area End-->

<!-- ? Tranding Start -->
<section class="new-product-area section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle mb-70">
                    <h2>Trending</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-new-pro mb-30 text-center">
                    <div class="product-img">
                        <img src="{{asset('frontend/assets/img/gallery/new_product1.png')}}" alt="">
                    </div>
                    <div class="product-caption">
                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                        <span>$ 45,743</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-new-pro mb-30 text-center">
                    <div class="product-img">
                        <img src="{{asset('frontend/assets/img/gallery/new_product2.png')}}" alt="">
                    </div>
                    <div class="product-caption">
                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                        <span>$ 45,743</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-new-pro mb-30 text-center">
                    <div class="product-img">
                        <img src="{{asset('frontend/assets/img/gallery/new_product3.png')}}" alt="">
                    </div>
                    <div class="product-caption">
                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                        <span>$ 45,743</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Tranding End -->

<!--? All Service Area Start -->
<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Our Services</h2>
                    {{-- <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p> --}}
                </div>
            </div>
        </div>


        <div class="row">
            @foreach (App\Models\Categories::get()->slice(0, 3) as $item )
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="{{asset('/backend/assets/img/service/'.$item->image)}}" alt="" style="height: 250px">
                            <div class="img-cap">
                                <span>Select Now</span>
                            </div>
                        </div>
                        <div class="favorit-items">
                            <h3 class="">{{$item->name}}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>


        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="{{route('allservices')}}" class="btn view-btn1">View More Services</a>
            </div>
        </div>
    </div>
</div>
<!-- All Service Area End -->



<!--? About Us Start-->
<div class="p-3 mb-5">
    <div class="shop-method-area">
        <div class="container">
            <h5 class="text-center mb-3" style="color: red">Why You Choose Us</h5>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle m-4 text-center">
                        <h3>Because We Care About Safety & Security</h3>
                    </div>
                </div>
            </div>
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-headphone-alt"></i>
                            <h6>24/7 Service</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium esse recusandae fuga rem in ex.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-hand-open"></i>
                            <h6>Ensuring Gloves & Masks</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium esse recusandae fuga rem in ex.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-settings"></i>
                            <h6>Provide High Tech Equipment</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium esse recusandae fuga rem in ex.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us End-->

<!--? Testimonials Start-->

<!--? Testimonials End-->

<!--? Contact Us  Start-->
<div class="m-3 p-2" id="contact_us">

    <div class="container">

        <div class="section-tittle m-4 text-center">
            <h2 class="m-3" style="color:">Contact Us</h2>
            <h4 class="mb-5" style="color:red">We'd Love To Hear From You</h4>
        </div>

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

    </div>

</div>
<!-- Contact Us  End-->

@endsection