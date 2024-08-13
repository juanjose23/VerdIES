<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VerdIES @yield('titulo')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://res.cloudinary.com/dxtlbsa62/image/upload/v1717962322/Verdies/srx3xflk0atk71jzrmdq.png"
        rel="icon">
    <link href="https://res.cloudinary.com/dxtlbsa62/image/upload/v1717962322/Verdies/srx3xflk0atk71jzrmdq.png"
        rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/themify-icons.css') }}">
    @stack('styles')

</head>

<body>
    @include('landingpage::layouts.navbar')
    <main>
        @yield('content')
    </main>

    @include('landingpage::layouts.footer')
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif
            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ Session::get('error') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif
        });
    </script>


</body>

</html>