
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $setting->company_name}} - @yield('title')</title>

  <link rel="icon" href="{{ $setting->path_image}}" type="image/*">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> --}}

  {{-- <link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css')}}">

  
  @stack('css_vendor')
  <style>
    .note-editor{
      margin-bottom: 0;
    }
    .note-editor.is-invalid{
      border-color: var(--danger);
    }
    .nav-sidebar .nav-header {
      font-size: .6rem;
      font-weight: bold;
      color: #888;
    }
  </style>
  @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @section('breadcrumb')
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              @show
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/backend/plugins/chart.js/Chart.min.js')}}"></script>


{{-- <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/backend/dist/js/pages/dashboard2.js')}}"></script>

@stack('scripts_vendor')

<script src="{{ asset('assets/backend/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
{{-- <x-toast /> --}}
{{-- <script>
  function format_uang(input) {
    a = input.value;
    if (a == undefined) {
        a = input.toString();
    }
    b = a.replace(/[^\d]/g, "");
    c = "";
    length = b.length;

    j = 0;
    for (i = length; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + "." + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }
    if (input.value == undefined) {
        return c;
    }

    input.value = c;
}
</script> --}}
@stack('scripts')
</body>
</html>
