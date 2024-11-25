<!DOCTYPE html>
<html lang="en">
@include('website.layouts.head')
<body>
  <!--================Header Menu Area =================-->
 @include('website.layouts.nav')
  <!--================Header Menu Area =================-->
  
 @yield('contact')

  <!--================ Start Footer Area =================-->
@include('website.layouts.footer')
  <!--================ End Footer Area =================-->

 @include('website.layouts.script')
</body>
</html>