@extends('Layouts.Cliente.layouts')
@section('title', 'Inicio_Cliente')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
@section('customCSS')
<link rel="stylesheet" href="{{ asset('scss/v_cliente/home/home.css') }}">



@endsection

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

<!-- Vehicles overview -->
<div class="col-xxl-6">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="card-title mb-0">
                <h5 class="m-0 me-2">Residuos <span class="span-enphasisWord">reciclados</span></h5>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="vehiclesOverview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="vehiclesOverview">
                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="d-none d-lg-flex vehicles-progress-labels mb-6">
                <div class="vehicles-progress-label on-the-way-text" style="width: 39.7%;">On the way</div>
                <div class="vehicles-progress-label unloading-text" style="width: 28.3%;">Unloading</div>
                <div class="vehicles-progress-label loading-text" style="width: 17.4%;">Loading</div>
                <div class="vehicles-progress-label waiting-text text-nowrap" style="width: 14.6%;">Waiting</div>
            </div>
            <div class="vehicles-overview-progress progress rounded-3 mb-6 bg-transparent overflow-hidden" style="height: 46px;">
                <div class="progress-bar fw-medium text-start shadow-none bg-lighter text-heading px-4 rounded-0" role="progressbar" style="width: 39.7%" aria-valuenow="39.7" aria-valuemin="0" aria-valuemax="100">39.7%</div>
                <div class="progress-bar fw-medium text-start shadow-none bg-primary px-4" role="progressbar" style="width: 28.3%" aria-valuenow="28.3" aria-valuemin="0" aria-valuemax="100">28.3%</div>
                <div class="progress-bar fw-medium text-start shadow-none text-bg-info px-2 px-sm-4" role="progressbar" style="width: 17.4%" aria-valuenow="17.4" aria-valuemin="0" aria-valuemax="100">17.4%</div>
                <div class="progress-bar fw-medium text-start shadow-none snackbar text-paper px-1 px-sm-3 rounded-0 px-lg-4" role="progressbar" style="width: 14.6%" aria-valuenow="14.6" aria-valuemin="0" aria-valuemax="100">14.6%</div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-border-top-0">
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="me-2">
                                        <i class='bx bx-car bx-lg text-heading'></i>
                                    </div>
                                    <h6 class="mb-0 fw-normal">On the way</h6>
                                </div>
                            </td>
                            <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">2hr 10min</h6>
                            </td>
                            <td class="text-end pe-0">
                                <span>39.7%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="me-2">
                                        <i class='bx bx-down-arrow-circle bx-lg text-heading'></i>
                                    </div>
                                    <h6 class="mb-0 fw-normal">Unloading</h6>
                                </div>
                            </td>
                            <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">3hr 15min</h6>
                            </td>
                            <td class="text-end pe-0">
                                <span>28.3%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="me-2">
                                        <i class='bx bx-up-arrow-circle bx-lg text-heading'></i>
                                    </div>
                                    <h6 class="mb-0 fw-normal">Loading</h6>
                                </div>
                            </td>
                            <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">1hr 24min</h6>
                            </td>
                            <td class="text-end pe-0">
                                <span>17.4%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="me-2">
                                        <i class='bx bx-time-five bx-lg text-heading'></i>
                                    </div>
                                    <h6 class="mb-0 fw-normal">Waiting</h6>
                                </div>
                            </td>
                            <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">5hr 19min</h6>
                            </td>
                            <td class="text-end pe-0">
                                <span>14.6%</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Vehicles overview -->



<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">

            <div class="d-flex align-items-end row">
                <div class="col-sm-7">

                    <div class="card-body">
                        <h5 class="card-title text-primary">¡Bienvenido, {{Session::get('nombre') }}! 🎉</h5>
                        <p class="mb-4">
                            Te damos la bienvenida a nuestra plataforma. Estamos emocionados de tenerte con nosotros.
                            ¡Prepárate para una experiencia increíble!
                        </p>



                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1718344031/Verdies/Page/cdj5z5xxxmov0ep3qh04.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>





<script>
    var swiper = new Swiper('.blog-slider', {
        spaceBetween: 30,
        effect: 'fade',
        loop: true,
        mousewheel: {
            invert: false,
        },
        // autoHeight: true,
        pagination: {
            el: '.blog-slider__pagination',
            clickable: true,
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.blog-slider__button').click(function(e) {
            e.preventDefault();

            // Obtener el texto del div asociado al botón
            var text = $(this).closest('.blog-slider__content').find('.blog-slider__text').text();

            // Agregar el prefijo al texto
            var prefixedText = "Puedes hablarme más acerca de este consejo: " + text;

            // Guardar el texto en localStorage
            localStorage.setItem('ecoChatMessage', prefixedText);

            // Redirigir a la otra URL
            window.location.href = '/ecochatbot';
        });
    });
</script>
@endsection