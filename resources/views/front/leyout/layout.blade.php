<!DOCTYPE html>
<html lang="en">
  @include('front.components.head')

  <body>

    <a href="#" class="scroll-to-top" id="scroll-to-top">
      <i class="fas fa-angle-up"></i>
    </a>

    @include('front.components.header')

    <!-- ===================================== -->

      @yield('content')

    <!-- ===================================== -->
    @include('front.components.footer')

    @include('front.components.script')
  </body>
</html>
