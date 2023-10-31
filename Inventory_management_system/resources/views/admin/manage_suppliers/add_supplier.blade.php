
<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <base href="../../public"> --}}
    <!-- include css file -->
         @include('admin.css')
    <!-- End css file -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sideber')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
            @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div>Hi I'm add supplier</div>

          </div>
          <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.js')
  </body>
</html>
