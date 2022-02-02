@extends('frontend.layouts.master')
@section('content')

      <!-- Hero Area Start-->
      <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Confirmation</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="confirmation_tittle">
              <span>Thank you. Your order has been received.</span>
            </div>
          </div>
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>order info</h4>
              <ul>
                <li>
                  <p>order number</p><span>: 60235</span>
                </li>
                <li>
                  <p>data</p><span>: Oct 03, 2017</span>
                </li>
                <li>
                  <p>total</p><span>: USD 2210</span>
                </li>
                <li>
                  <p>Payment method</p><span>: Check payments</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>Service Provider's Details</h4>
              <ul>
                <li>
                  <p>Name</p><span>: ........</span>
                </li>
                <li>
                  <p>Mobile</p><span>: .......</span>
                </li>
                <li>
                  <p>Category</p><span>: .......</span>
                </li>
                <li>
                  <p>Experience</p><span>: 100 Milestone completed</span>
                </li>
                <li>
                  <p>Rating</p><span>: 4 out of 5</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>Service Location</h4>
              <ul>
                <li>
                  <p>Appartment No: </p><span>: .......</span>
                </li>
                <li>
                  <p>Street</p><span>: .......</span>
                </li>
                <li>
                  <p>city</p><span>: ........</span>
                </li>
                <li>
                  <p>Devision</p><span>: .........</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="order_details_iner">
              <h3>Order Details</h3>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Service</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                    <th>x02</th>
                    <th> <span>$720.00</span></th>
                  </tr>
                  <tr>
                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                    <th>x02</th>
                    <th> <span>$720.00</span></th>
                  </tr>
                  <tr>
                    <th colspan="2"><span>Pixelstore fresh Blackberry</span></th>
                    <th>x02</th>
                    <th> <span>$720.00</span></th>
                  </tr>
                  <tr>
                    <th colspan="3">Subtotal</th>
                    <th> <span>$2160.00</span></th>
                  </tr>
                  <tr>
                    <th colspan="3">Visiting Charge</th>
                    <th><span>flat rate: $50.00</span></th>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="col" colspan="3">Service Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ confirmation part end =================-->


@endsection