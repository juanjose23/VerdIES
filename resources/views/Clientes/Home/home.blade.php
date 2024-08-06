@extends('Layouts.Cliente.layouts')
@section('title', 'Inicio_Cliente')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
<style>
    .blog-slider {
        width: 95%;
        position: relative;
        max-width: 800px;
        margin: auto;
        background: #fff;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
        padding: 25px;
        border-radius: 25px;
        height: 400px;
        transition: all 0.3s;
    }

    @media screen and (max-width: 992px) {
        .blog-slider {
            max-width: 680px;
            height: 400px;
        }
    }

    @media screen and (max-width: 768px) {
        .blog-slider {
            min-height: 500px;
            height: auto;
            margin: 180px auto;
        }
    }

    @media screen and (max-height: 500px) and (min-width: 992px) {
        .blog-slider {
            height: 350px;
        }
    }

    .blog-slider__item {
        display: flex;
        align-items: center;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__item {
            flex-direction: column;
        }
    }

    .blog-slider__item.swiper-slide-active .blog-slider__img img {
        opacity: 1;
        transition-delay: 0.3s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>* {
        opacity: 1;
        transform: none;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(1) {
        transition-delay: 0.3s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(2) {
        transition-delay: 0.4s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(3) {
        transition-delay: 0.5s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(4) {
        transition-delay: 0.6s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(5) {
        transition-delay: 0.7s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(6) {
        transition-delay: 0.8s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(7) {
        transition-delay: 0.9s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(8) {
        transition-delay: 1s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(9) {
        transition-delay: 1.1s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(10) {
        transition-delay: 1.2s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(11) {
        transition-delay: 1.3s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(12) {
        transition-delay: 1.4s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(13) {
        transition-delay: 1.5s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(14) {
        transition-delay: 1.6s;
    }

    .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(15) {
        transition-delay: 1.7s;
    }

    .blog-slider__img {
        width: 300px;
        flex-shrink: 0;
        height: 300px;
        background-image: linear-gradient(147deg, #6ab218 0%, #6ab218 74%);
        box-shadow: 4px 13px 30px 1px #6ab218;
        border-radius: 20px;
        transform: translateX(-80px);
        overflow: hidden;
    }

    .blog-slider__img:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 20px;
        opacity: 0.8;
    }

    .blog-slider__img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        opacity: 0;
        border-radius: 20px;
        transition: all 0.3s;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__img {
            transform: translateY(-50%);
            width: 90%;
        }
    }

    @media screen and (max-width: 576px) {
        .blog-slider__img {
            width: 95%;
        }
    }

    @media screen and (max-height: 500px) and (min-width: 992px) {
        .blog-slider__img {
            height: 270px;
        }
    }

    .blog-slider__content {
        padding-right: 25px;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__content {
            margin-top: -80px;
            text-align: center;
            padding: 0 30px;
        }
    }

    @media screen and (max-width: 576px) {
        .blog-slider__content {
            padding: 0;
        }
    }

    .blog-slider__content>* {
        opacity: 0;
        transform: translateY(25px);
        transition: all 0.4s;
    }

    .blog-slider__code {
        color: #7b7992;
        margin-bottom: 15px;
        display: block;
        font-weight: 500;
    }

    .blog-slider__title {
        font-size: 24px;
        font-weight: 700;
        color: #0d0925;
        margin-bottom: 20px;
    }

    .blog-slider__text {
        color: #4e4a67;
        margin-bottom: 30px;
        line-height: 1.5em;
    }

    .blog-slider__button {
        display: inline-flex;
        background-image: linear-gradient(147deg, #6ab218 0%, #6ab218 74%);
        padding: 15px 35px;
        border-radius: 50px;
        color: #fff;
        box-shadow: 0px 14px 80px 6ab218;
        text-decoration: none;
        font-weight: 500;
        justify-content: center;
        text-align: center;
        letter-spacing: 1px;
    }

    @media screen and (max-width: 576px) {
        .blog-slider__button {
            width: 100%;
        }
    }

    .blog-slider .swiper-container-horizontal>.swiper-pagination-bullets,
    .blog-slider .swiper-pagination-custom,
    .blog-slider .swiper-pagination-fraction {
        bottom: 10px;
        left: 0;
        width: 100%;
    }

    .blog-slider__pagination {
        position: absolute;
        z-index: 21;
        right: 20px;
        width: 11px !important;
        text-align: center;
        left: auto !important;
        top: 50%;
        bottom: auto !important;
        transform: translateY(-50%);
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination {
            transform: translateX(-50%);
            left: 50% !important;
            top: 205px;
            width: 100% !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
        margin: 8px 0;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 0 5px;
        }
    }

    .blog-slider__pagination .swiper-pagination-bullet {
        width: 11px;
        height: 11px;
        display: block;
        border-radius: 10px;
        background: #062744;
        opacity: 0.2;
        transition: all 0.3s;
    }

    .blog-slider__pagination .swiper-pagination-bullet-active {
        opacity: 1;
        background: #6ab218;
        height: 30px;
        box-shadow: 0px 0px 20px #6ab218;
    }

    @media screen and (max-width: 768px) {
        .blog-slider__pagination .swiper-pagination-bullet-active {
            height: 11px;
            width: 30px;
        }

    }

    @media (max-width: 768px) {
        .container-consejos {
            margin-top: 170px;
        }
    }

    @media screen and (max-width: 768px) {
        .blog-slider {
            margin-top: 50px;
        }

    }
</style>
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