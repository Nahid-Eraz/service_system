@extends('frontend.layouts.master')
@section('content')

<!--================login_part Area =================-->
<section class="login_part p-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Service?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="/signinpage" class="btn_3">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome Back ! <br>
                            Please Log in now</h3>

                        <form class="row contact_form" action="{{ route('login.submit') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="name" name="email"
                                    placeholder="Username Or Email">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    log in
                                </button>
                                <a class="lost_pass" href="#">forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

@endsection
