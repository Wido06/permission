<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
        <title>Permission</title>
    
        <!-- Favicon -->
        <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
        <!-- FancyBox -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- Livewire styles -->
        @livewireStyles
    
        <!-- Template & vendor styles -->
        <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('style')



       

    </head>
<body>
    
    <!-- Layout partials -->
    @include('panel.layouts.header')
    @include('panel.layouts.sidebar')

    <main id="main" class="main" style="height:100%;">
        @yield('content')
    </main>

    @include('panel.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS -->
    <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>


   
    <!-- Livewire scripts -->
    @livewireScripts

    <!-- SweetAlert Toast Message -->
    @if(session('toast_message'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('toast_message') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    <!-- Custom Scripts -->
    <script>
        function addRole() {
            fetch("{{ url('panel.role.add') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById("roleModalContent").innerHTML = html;
                })
                .catch(error => {
                    console.error("Erreur lors du chargement de la page :", error);
                });
        }
    </script>

    @yield('script')
</body>

</html>
