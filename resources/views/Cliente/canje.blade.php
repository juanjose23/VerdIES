@extends('cliente.layouts.master')

@section('title', 'Canje')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/mapbox-gl/mapbox-gl.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/pages/app-logistics-fleet.css') }}">

<!-- Modal de información del centro de acopio -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Lugar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí aparecerán los detalles del lugar -->
                <p id="modal-description">Descripción del lugar</p>
                <img id="modal-image" src="" alt="Imagen del lugar" class="img-fluid">
            </div>
            <div class="modal-footer">
                <!-- Botón para abrir Google Maps con la ruta -->
                <a id="maps-link" href="#" class="btn btn-primary" target="_blank">Ver ruta en Google Maps</a>
                <a id="maps-link" href="#" class="btn btn-primary" target="_blank">Canjear aquí</a>
            </div>
        </div>
    </div>
</div>


<div class="card overflow-hidden">

    <!-- Map Menu Wrapper -->
    <div class="d-flex app-logistics-fleet-wrapper">

        <!-- Map Menu Button when screen is < md -->
        <div class="flex-shrink-0 position-fixed m-6 d-md-none w-auto z-1">
            <button class="btn btn-icon btn-white btn-white-dark-variant z-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar"><i class="bx bx-menu bx-md"></i></button>
        </div>

        <!-- Map Menu -->
        <div class="app-logistics-fleet-sidebar col h-100" id="app-logistics-fleet-sidebar">
            <div class="card-header border-0 pt-6 pb-1 d-flex justify-content-between">
                <h5 class="mb-0 card-title">Centros de acopio</h5>
                <!-- Sidebar close button -->
                <i class="bx bx-x bx-xs cursor-pointer close-sidebar d-md-none btn btn-sm btn-icon p-0" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar"></i>
            </div>
            <!-- Sidebar when screen < md -->
            <div class="card-body p-0 logistics-fleet-sidebar-body">
                <!-- Menu Accordion -->
                 <livewire:ListaAcopios/>

            </div>
        </div>

        <!-- Mapbox Map container -->
        <div class="col h-100 map-container">
            <!-- Map -->
            <div id="map" class="w-100 h-100"></div>
        </div>

        <!-- Overlay Hidden -->
        <div class="app-overlay d-none"></div>
    </div>
</div>


<!-- / Content -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>


<!-- Vendors JS -->
<script src="{{ asset('Cliente/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('Cliente/assets/vendor/libs/mapbox-gl/mapbox-gl.js') }}"></script>

@endsection