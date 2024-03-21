<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Indek Kinerja UCIC</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo_ucic.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets_admin/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- <!-- Data Table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{ asset('assets_admin/js/datatable.js') }}"></script> --}}

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/components.css') }}">




    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('rektorat.components.header')

            <!-- Sidebar -->
            @include('rektorat.components.sidebar')

            <!-- Content -->
            @yield('content-rektorat')

            <!-- Footer -->
            @include('rektorat.components.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets_admin/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('assets_admin/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('assets_admin/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/stisla.js') }}"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('assets_admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets_admin/js/custom.js') }}"></script>
</body>

</html>
