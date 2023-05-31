<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA ALMACEN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller" id="app">
        <!-- partial:../../partials/_sidebar.html -->
        {{-- SIDEBAR --}}
        {{-- verificar aqui el ancho --}}
        @include('plantilla/sections/sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            {{-- NAVBAR --}}
            @include('plantilla/sections/navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper my-0" id="app">
                    <App></App>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                {{-- FOOTER --}}
                @include('plantilla/sections/footer')
                <!-- main-panel ends -->
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    {{-- CONEXION CON JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>     --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/assets/js/misc.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>
