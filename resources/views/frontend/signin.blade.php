@extends('frontend.layouts.master')
@section('content')

<!--================login_part Area =================-->
<section class="login_part p-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome ! <br>
                            Please Sign in now</h3>
                        <form class="row contact_form" action="{{ route('register.submit') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Username" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="tel" class="form-control" name="Mobile" id="mobile" placeholder="Mobile">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group" style="display: none">
                                {{-- <label for="condition">Condition :</label> --}}
                                <select class="custom-select form-control" id="condition" name="user_type">
                                    <option selected value="customer">Customer</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Already Have An Account?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="/loginpage" class="btn_3">Login Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

@endsection
