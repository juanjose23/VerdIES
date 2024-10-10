@extends('cliente.layouts.master')

@section('title', 'Inicio')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/home/home.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">





<div class="row">
    <div class="title">
        <h2 style="font-weight: 900;" class="mb-20">Bienvenido<span style="color: #6ab218;"> {{Session::get('nombre') }}!</span> </h2>
    </div>

    <div class="container-consejos">
        <div class="blog-slider mt-5">
            <div class="blog-slider__wrp swiper-wrapper">

                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="https://www.comercialaviles.com/wp-content/uploads/2019/06/8-bolsas-ecologicas-1.jpg" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <div class="blog-slider__title">Usa Bolsas Reutilizables:</div>
                        <div class="blog-slider__text">
                            Lleva siempre tus propias bolsas reutilizables cuando vayas de compras para reducir el uso de plástico.
                        </div>
                        <a href="#" class="blog-slider__button">Preguntale a EcoChat</a>
                    </div>
                </div>

                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="https://ecoinventos.com/wp-content/uploads/2019/04/cascara-huevo-compost.jpg" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <div class="blog-slider__title">Composta los Residuos Orgánicos:</div>
                        <div class="blog-slider__text">
                            Transforma los restos de comida y residuos de jardín en abono natural para tus plantas.
                        </div>
                        <a href="#" class="blog-slider__button">Preguntale a EcoChat</a>
                    </div>
                </div>

                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="https://energiahoy.com/wp-content/uploads/2023/01/agua.jpg" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <div class="blog-slider__title">Ahorra Agua y Energía</div>
                        <div class="blog-slider__text">
                            Cierra los grifos cuando no los uses y apaga las luces y dispositivos electrónicos para conservar recursos.
                        </div>
                        <a href="#" class="blog-slider__button">Preguntale a EcoChat</a>
                    </div>
                </div>

            </div>
            <div class="blog-slider__pagination"></div>
        </div>

    </div>

    <!-- Topic and Instructors -->
    <div class="row mb-6 g-6">
        <div class="col-12 col-xl-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Residuos <span class="span-enphasisWord">almacenados</span></h5>
                    <div class=" dropdown">
                            <button class="btn p-0" type="button" id="topic" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topic">
                                <a class="dropdown-item" href="javascript:void(0);">Highest Views</a>
                                <a class="dropdown-item" href="javascript:void(0);">See All</a>
                            </div>
                </div>
            </div>
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <div id="horizontalBarChart"></div>
                </div>
                <div class="col-md-4 d-flex justify-content-around align-items-center">
                    <div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-primary me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Botellas de plástico</p>
                                <h5>35%</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline my-12">
                            <span class="text-success me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Tapas de botellas</p>
                                <h5>14%</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-danger me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Bolsas</p>
                                <h5>10%</h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-info me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Cajas</p>
                                <h5>20%</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline my-12">
                            <span class="text-secondary me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Vidrio</p>
                                <h5>12%</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-warning me-2"><i class='bx bxs-circle bx-12px'></i></span>
                            <div>
                                <p class="mb-0">Composta</p>
                                <h5>9%</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Topic Interested -->




</div>


@include('cliente.layouts.ecochat')

</div>
<!-- / Content -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="{{ asset('Cliente/assets/js/home/index.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('Cliente/assets/js/app-academy-dashboard.js') }}"></script>
@endsection