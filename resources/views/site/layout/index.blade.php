@include('site.layout.header')
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('site.layout.slide')
  <!-- Slider End-->
  
  <!-- Section Start-->

  @yield('content')
  

<!-- Footer -->
@include('site.layout.footer')