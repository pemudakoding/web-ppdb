<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administrator SMPN 15 PALU">
    <meta name="author" content="">
    <link href="{{$webInformation->favicon}}" rel="icon">
    <title>{{$webInformation->name}} - @yield('title')</title>
    <link href="https://smp15palu.sch.id/css/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://smp15palu.sch.id/css/admin/css/fontAwesome.all.min.css" rel="stylesheet">
    <link href="https://smp15palu.sch.id/css/admin/css/style.css" rel="stylesheet">



</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('components.admin.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('components.admin.navbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('sub-page')</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        @yield('content')
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{$webInformation->name}} <script>
                                document.write(new Date().getFullYear());

                            </script> - Developed by
                            <b>Roatech</b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://smp15palu.sch.id/js/admin/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    @stack('scripts')
</body>

</html>
