@extends('Layouts.Page.layout')
@section('title', 'Inicio')
@section('seccion', 'Recepción de materiales')
@section('content') 

<livewire:recepcion-materiales :id="$id"/>

@endsection
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.css') }}"></script>
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