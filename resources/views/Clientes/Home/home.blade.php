@extends('Layouts.Cliente.layouts')
@section('title', 'Inicio_Cliente')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
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