@extends('cliente.layouts.master')

@section('title', 'Residuos')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/home/home.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">

<style>
    /* From Uiverse.io by Samalander0 */
    .card-widget {
        width: 320px;
        height: 320px;
        background: #fff480;
        color: black;
        position: relative;
        border-radius: 2.5em;
        padding: 2em;
        transition: transform 0.4s ease;
    }

    .card-widget .card-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 5em;
        height: 100%;
        transition: transform 0.4s ease;
    }

    .card-widget .card-top,
    .card .card-bottom {
        display: flex;
        justify-content: space-between;
    }

    .card-widget .card-top p,
    .card .card-top .card-title,
    .card .card-bottom p,
    .card .card-bottom .card-title {
        margin: 0;
    }

    .card-widget .card-title {
        font-weight: bold;
    }

    .card-widget .card-top p,
    .card .card-bottom p {
        font-weight: 600;
    }

    .card-widget .card-bottom {
        align-items: flex-end;
    }

    .card-widget .card-image {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: grid;
        place-items: center;
        pointer-events: none;
    }

    .card-widget .card-image svg {
        width: 4em;
        height: 4em;
        transition: transform 0.4s ease;
    }

    .card-widget:hover {
        cursor: pointer;
        transform: scale(0.97);
    }

    .card-widget:hover .card-content {
        transform: scale(0.96);
    }

    .card-widget:hover .card-image svg {
        transform: scale(1.05);
    }

    .card-widget:active {
        transform: scale(0.9);
    }
</style>




<div class="card mb-6">
    <div class="card-header d-flex flex-wrap justify-content-between gap-4">
        <div class="card-title mb-0 me-1">
            <h5 class="mb-0">Selecciona una opción</h5>
            <!-- <p class="mb-0">Total 6 course you have purchased</p> -->
        </div>

    </div>
    <div class="card-body">
        <div class="row gy-6 mb-6">
            <div class="col-sm-6 col-lg-4">
                <div class="card-widget">
                    <div class="card-content">
                        <div class="card-top">
                            <span class="card-title">01.</span>
                            <p>Lightning.</p>
                        </div>
                        <div class="card-bottom">
                            <p>Hover Me?</p>
                            <svg width="32" viewBox="0 -960 960 960" height="32" xmlns="http://www.w3.org/2000/svg">
                                <path d="M226-160q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19ZM226-414q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19ZM226-668q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-image">
                        <svg width="48" viewBox="0 -960 960 960" height="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="m393-165 279-335H492l36-286-253 366h154l-36 255Zm-73 85 40-280H160l360-520h80l-40 320h240L400-80h-80Zm153-395Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card-widget">
                    <div class="card-content">
                        <div class="card-top">
                            <span class="card-title">01.</span>
                            <p>Lightning.</p>
                        </div>
                        <div class="card-bottom">
                            <p>Hover Me?</p>
                            <svg width="32" viewBox="0 -960 960 960" height="32" xmlns="http://www.w3.org/2000/svg">
                                <path d="M226-160q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19ZM226-414q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19ZM226-668q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Zm254 0q-28 0-47-19t-19-47q0-28 19-47t47-19q28 0 47 19t19 47q0 28-19 47t-47 19Z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-image">
                        <svg width="48" viewBox="0 -960 960 960" height="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="m393-165 279-335H492l36-286-253 366h154l-36 255Zm-73 85 40-280H160l360-520h80l-40 320h240L400-80h-80Zm153-395Z"></path>
                        </svg>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
<!-- / Content -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="{{ asset('Cliente/assets/js/home/index.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('Cliente/assets/js/app-academy-dashboard.js') }}"></script>
@endsection