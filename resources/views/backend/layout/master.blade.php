@include('backend.include.head')
  <div class="wrapper ">

    @include('backend.include.sidebar')

    <div class="main-panel">
      <!-- Navbar -->
      @include('backend.include.navbar')
      <!-- End Navbar -->
      @yield('content')

      @include('backend.include.footer')

    </div>
  </div>

  {{-- @include('backend.include.setting') --}}
  <!--   Core JS Files   -->
  @include('backend.include.script')