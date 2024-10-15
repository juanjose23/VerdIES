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
                <h5 class="mb-0 card-title">Fleet</h5>
                <!-- Sidebar close button -->
                <i class="bx bx-x bx-xs cursor-pointer close-sidebar d-md-none btn btn-sm btn-icon p-0" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar"></i>
            </div>
            <!-- Sidebar when screen < md -->
            <div class="card-body p-0 logistics-fleet-sidebar-body">
                <!-- Menu Accordion -->
                <div class="accordion py-2 px-1" id="fleet" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar">
                    <!-- Fleet 1 -->
                    <div class="accordion-item border-0 active mb-0 shadow-none" id="fl-1">
                        <div class="accordion-header" id="fleetOne">
                            <div role="button" class="accordion-button shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet1" aria-expanded="true" aria-controls="fleet1">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40"><i class="bx bx-car bx-lg"></i></span>
                                        </div>
                                    </div>
                                    <span class="d-flex flex-column gap-1">
                                        <span class="text-heading">VOL-342808</span>
                                        <span class="text-body">Chelsea, NY, USA</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fleet 2 -->
                    <div class="accordion-item border-0 mt-0 mb-0 shadow-none" id="fl-2">
                        <div class="accordion-header" id="fleetTwo">
                            <div role="button" class="accordion-button collapsed shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet2" aria-expanded="true" aria-controls="fleet2">

                                <div class="d-flex align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40"><i class="bx bx-car bx-lg"></i></span>
                                        </div>
                                    </div>
                                    <span class="d-flex flex-column gap-1">
                                        <span class="text-heading">VOL-954784</span>
                                        <span class="text-body">Lincoln Harbor, NY, USA</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="fleet2" class="accordion-collapse collapse" data-bs-parent="#fleet">
                            <div class="accordion-body pt-4 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-normal mb-1">Delivery Process</h6>
                                    <p class="text-body mb-1">100%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="timeline ps-4 mt-6 mb-2">
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-success text-uppercase">tracking number created</small>
                                            </div>
                                            <h6 class="my-50">Myrtle Ullrich</h6>
                                            <small class="text-body">Sep 01, 7:53 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-success text-uppercase">out for delivery</small>
                                            </div>
                                            <h6 class="my-50">Myrtle Ullrich</h6>
                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 border-transparent">
                                        <span class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                            <i class='bx bx-map mt-1'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-primary text-uppercase fw-medium">arrived</small>
                                            </div>
                                            <h6 class="my-50">Myrtle Ullrich</h6>
                                            <small class="text-body">Sep 04, 8:18 AM</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Fleet 3 -->
                    <div class="accordion-item border-0 mt-0 mb-0 shadow-none" id="fl-3">
                        <div class="accordion-header" id="fleetThree">
                            <div role="button" class="accordion-button collapsed shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet3" aria-expanded="true" aria-controls="fleet3">

                                <div class="d-flex align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40"><i class="bx bx-car bx-lg"></i></span>
                                        </div>
                                    </div>
                                    <span class="d-flex flex-column gap-1">
                                        <span class="text-heading">VOL-342808</span>
                                        <span class="text-body">Midtown East, NY, USA</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="fleet3" class="accordion-collapse collapse" data-bs-parent="#fleet">
                            <div class="accordion-body pt-4 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-normal mb-1">Delivery Process</h6>
                                    <p class="text-body mb-1">60%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="timeline ps-4 mt-6 mb-2">
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-success text-uppercase">tracking number created</small>
                                            </div>
                                            <h6 class="my-50">Barry Schowalter</h6>
                                            <small class="text-body">Sep 01, 7:53 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-success text-uppercase">out for delivery</small>
                                            </div>
                                            <h6 class="my-50">Barry Schowalter</h6>
                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 border-transparent">
                                        <span class="timeline-indicator-advanced timeline-indicator-secondary border-0 shadow-none">
                                            <i class='bx bx-map mt-1'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-secondary text-uppercase fw-medium">arriving</small>
                                            </div>
                                            <h6 class="my-50">Barry Schowalter</h6>
                                            <small class="text-body">Sep 04, 8:18 AM</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Fleet 4 -->
                    <div class="accordion-item border-0 mt-0 mb-4 shadow-none" id="fl-4">
                        <div class="accordion-header" id="fleetFour">
                            <div role="button" class="accordion-button collapsed shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet4" aria-expanded="true" aria-controls="fleet4">

                                <div class="d-flex align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40"><i class="bx bx-car bx-lg"></i></span>
                                        </div>
                                    </div>
                                    <span class="d-flex flex-column gap-1">
                                        <span class="text-heading">VOL-343908</span>
                                        <span class="text-body">Hoboken, NY, USA</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="fleet4" class="accordion-collapse collapse" data-bs-parent="#fleet">
                            <div class="accordion-body pt-4 pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-normal mb-1">Delivery Process</h6>
                                    <p class="text-body mb-1">28%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="timeline ps-4 mt-6">
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-success text-uppercase">tracking number created</small>
                                            </div>
                                            <h6 class="my-50">Helen Jacobs</h6>
                                            <small class="text-body">Sep 01, 7:53 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 pb-3 border-left-dashed">
                                        <span class="timeline-indicator-advanced timeline-indicator-secondary border-0 shadow-none">
                                            <i class='bx bx-check-circle'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-secondary text-uppercase fw-medium">out for delivery</small>
                                            </div>
                                            <h6 class="my-50">Helen Jacobs</h6>
                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                        </div>
                                    </li>
                                    <li class="timeline-item ps-6 border-transparent">
                                        <span class="timeline-indicator-advanced timeline-indicator-secondary border-0 shadow-none">
                                            <i class='bx bx-map mt-1'></i>
                                        </span>
                                        <div class="timeline-event ps-0 pb-0">
                                            <div class="timeline-header">
                                                <small class="text-secondary text-uppercase fw-medium">arriving</small>
                                            </div>
                                            <h6 class="my-50">Helen Jacobs</h6>
                                            <small class="text-body">Sep 04, 8:18 AM</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
<!-- Page JS -->
<script src="{{ asset('Cliente/assets/js/app-logistics-fleet.js') }}"></script>
@endsection