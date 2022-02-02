@include('frontend.include.head')
    <!--? Preloader Start -->
    @include('frontend.include.preloader')
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('frontend.include.header')
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start -->
       @yield('content')
    </main>
@include('frontend.include.footer')
    <!--? Search model Begin -->

    <!-- Search model end -->

    <!-- JS here -->

    @include('frontend.include.script')
