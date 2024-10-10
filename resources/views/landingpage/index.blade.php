@extends('landingpage.layouts.master')
@section('title', 'Inicio')
@push('styles')
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('Landingpage/assets/css/nice-select.css') }}">
@endpush

@section('content')


    <section class="slider-area">
        <div class="slider-active">
            <article class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 col-md-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay=".4s" class="hero__subtitle">¡Recicla con
                                    Impacto!</span>
                                <h1 data-animation="fadeInUp" data-delay=".6s" class="hero__title">Transforma tu
                                    campus<br>con VerdIES</h1>
                                <p data-animation="fadeInUp" data-delay=".8s" class="hero__description">
                                    Únete a la revolución verde en Nicaragua. Participa en nuestro programa de reciclaje,
                                    gana premios y ayuda a construir un futuro más sostenible.
                                </p>

                                <div class="slider-btns">

                                    <a data-animation="fadeInLeft" data-delay="1.0s" href=""
                                        class="btn radius-btn">Participar Ahora</a>

                                    <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn ani-btn"
                                        href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <figure class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight"
                                data-delay="1s">
                                <img src="{{ asset('Landingpage/assets/img/hero/hero_right.png') }}" alt="Hero Image">
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
            <article class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 col-md-9">
                            <div class="hero__caption">
                                <span data-animation="fadeInUp" data-delay=".4s" class="hero__subtitle">¡Haz la Diferencia
                                    Hoy!</span>
                                <h1 data-animation="fadeInUp" data-delay=".6s" class="hero__title">Transforma Tu
                                    Comunidad<br>con VerdIES</h1>
                                <p data-animation="fadeInUp" data-delay=".8s" class="hero__description">
                                    Únete a VerdIES y marca la diferencia en el reciclaje universitario. Participa, gana
                                    premios y contribuye a un futuro más verde para Nicaragua.
                                </p>


                                <div class="slider-btns">

                                    <a data-animation="fadeInLeft" data-delay="1.0s" href=""
                                        class="btn radius-btn">Download</a>

                                    <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn ani-btn"
                                        href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <figure class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight"
                                data-delay="1s">
                                <img src="{{ asset('Landingpage/assets/img/hero/hero_right.png') }}" alt="Hero Image">
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <!-- Slider Area End -->
    <section class="best-features-area section-padd4">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-8 col-lg-10">
                    <!-- Section Title -->
                    <header class="section-header">
                        <h2>Características Destacadas de VerdIES</h2>
                    </header>
                    <!-- Section Content -->
                    <div class="row">
                        <article class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature-item mb-70">
                                <div class="feature-icon">
                                    <span class="flaticon-recycle" aria-hidden="true"></span>
                                    <span class="sr-only">Icono de reciclaje</span>
                                </div>
                                <div class="feature-description">
                                    <h3>Incentivos Atractivos</h3>
                                    <p>Motivamos a los estudiantes con recompensas por su participación activa en el
                                        reciclaje.</p>
                                </div>
                            </div>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature-item mb-70">
                                <div class="feature-icon">
                                    <span class="flaticon-partnership" aria-hidden="true"></span>
                                    <span class="sr-only">Icono de asociación</span>
                                </div>
                                <div class="feature-description">
                                    <h3>Alianzas Estratégicas</h3>
                                    <p>Colaboramos con recicladoras locales para garantizar una gestión efectiva de los
                                        materiales.</p>
                                </div>
                            </div>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature-item mb-70">
                                <div class="feature-icon">
                                    <span class="flaticon-education" aria-hidden="true"></span>
                                    <span class="sr-only">Icono de educación</span>
                                </div>
                                <div class="feature-description">
                                    <h3>Educación y Conciencia</h3>
                                    <p>Fomentamos la conciencia ambiental mediante la educación sobre reciclaje y economía
                                        circular.</p>
                                </div>
                            </div>
                        </article>
                        <article class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature-item mb-70">
                                <div class="feature-icon">
                                    <span class="flaticon-technology" aria-hidden="true"></span>
                                    <span class="sr-only">Icono de tecnología</span>
                                </div>
                                <div class="feature-description">
                                    <h3>Plataforma Digital</h3>
                                    <p>Desarrollamos una aplicación donde los estudiantes pueden registrar sus actividades y
                                        canjear recompensas.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shpe -->
        <div class="features-shpae d-none d-lg-block">
            <img src="{{ asset('Landingpage/assets/img/shape/best-features.png') }}" alt="">
        </div>
    </section>
    <section class="service-area sky-blue section-padding2">
        <div class="container">
            <!-- Section Title -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2>¿Cómo Puede Ayudarte VerdIES<br>Con el Reciclaje Universitario?</h2>
                    </div>
                </div>
            </div>
            <!-- Section Features -->
            <div class="row">
                <article class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Gestión Eficiente del Reciclaje</a></h4>
                            <p>Facilitamos la participación en programas de reciclaje con una plataforma que premia tu
                                compromiso ambiental.</p>
                        </div>
                    </div>
                </article>
                <article class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption active text-center mb-30">
                        <div class="service-icon">
                            <span class="flaticon-reward"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Recompensas y Premios</a></h4>
                            <p>Ofrecemos incentivos atractivos para motivar la participación en actividades de reciclaje.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services-caption text-center mb-30">
                        <div class="service-icon">
                            <span class="flaticon-partnership"></span>
                        </div>
                        <div class="service-cap">
                            <h4><a href="#">Alianzas Estratégicas</a></h4>
                            <p>Colaboramos con recicladoras locales para asegurar una gestión efectiva de los materiales
                                reciclables.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="applic-apps section-padding2">
        <div class="container-fluid">
            <div class="row">
                <!-- Slider Heading -->
                <div class="col-xl-4 col-lg-4 col-md-8">
                    <article class="single-cases-info mb-30">
                        <h3>Capturas de Pantalla de la Aplicación</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse gravida. Risus commodo viverra maecenas
                            lacus vel facilisis.</p>
                    </article>
                </div>
                <!-- Carousel -->
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="app-active owl-carousel">
                        <figure class="single-cases-img">
                            <img src="{{ asset('Landingpage/assets/img/gallery/App1.png') }}" alt="Captura de Pantalla 1">
                        </figure>
                        <figure class="single-cases-img">
                            <img src="{{ asset('Landingpage/assets/img/gallery/App2.png') }}" alt="Captura de Pantalla 2">
                        </figure>
                        <figure class="single-cases-img">
                            <img src="{{ asset('Landingpage/assets/img/gallery/App3.png') }}" alt="Captura de Pantalla 3">
                        </figure>
                        <figure class="single-cases-img">
                            <img src="{{ asset('Landingpage/assets/img/gallery/App2.png') }}" alt="Captura de Pantalla 4">
                        </figure>
                        <figure class="single-cases-img">
                            <img src="{{ asset('Landingpage/assets/img/gallery/App1.png') }}" alt="Captura de Pantalla 5">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="best-pricing pricing-padding" data-background="Landingpage/assets/img/gallery/best_pricingbg.jpg">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section-tittle section-tittle2 text-center">
                        <h2>Cómo Participar en VerdIES</h2>
                        <p class="text-white">Descubre cómo puedes involucrarte en nuestro programa de reciclaje
                            universitario y hacer una diferencia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="pricing-card-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="single-card text-center mb-30 flex-grow-1">
                        <div class="card-top">
                            <span>Registro Básico</span>
                            <h4><span>¡Gratis!</span></h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>Acceso a la plataforma VerdIES</li>
                                <li>Participación en campañas de reciclaje</li>
                                <li>Materiales educativos sobre reciclaje</li>
                            </ul>
                            <a href="" class="btn option-btn">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="single-card text-center mb-30 flex-grow-1">
                        <div class="card-top">
                            <span>Colaboración Avanzada</span>
                            <h4><span>¡Contáctanos!</span></h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>Colaboraciones con recicladoras locales</li>
                                <li>Proyectos conjuntos de reciclaje</li>
                                <li>Impacto ambiental y social positivo</li>
                            </ul>
                            <a href="" class="btn option-btn">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="single-card text-center mb-30 flex-grow-1">
                        <div class="card-top">
                            <span>Alianzas Estratégicas</span>
                            <h4><span>¡Explora Con Nosotros!</span></h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>Colaboraciones con recicladoras locales</li>
                                <li>Proyectos conjuntos de reciclaje</li>
                                <li>Impacto ambiental y social positivo</li>
                            </ul>
                            <a href="" class="btn option-btn">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-customer section-padd-top30">
        <div class="container-fluid">
            <div class="our-customer-wrapper">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-tittle text-center">
                            <h2>Lo Que Dicen Los Profesionales<br> Sobre VerdIES</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="customar-active dot-style d-flex dot-style">
                            <div class="single-customer mb-100">
                                <div class="what-img">
                                    <img src="Landingpage/assets/img/shape/man1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">Profesor Juan Pérez</a></h4>
                                    <p>“VerdIES ha transformado la forma en que nuestros estudiantes se involucran en el reciclaje. La plataforma no solo educa, sino que también motiva a participar en iniciativas comunitarias.”</p>
                                </div>
                            </div>

                            <div class="single-customer mb-100">
                                <div class="what-img">
                                    <img src="Landingpage/assets/img/shape/man2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">Rector Ana Martínez</a></h4>
                                    <p>“La colaboración con VerdIES ha sido una excelente oportunidad para nuestra universidad. Los proyectos conjuntos han demostrado ser muy efectivos en la promoción de prácticas sostenibles.”</p>
                                </div>
                            </div>

                            <div class="single-customer mb-100">
                                <div class="what-img">
                                    <img src="Landingpage/assets/img/shape/man3.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">Colaborador Luis Gómez</a></h4>
                                <p>“Trabajar con VerdIES ha fortalecido nuestras iniciativas de reciclaje. La red de contactos y la formación proporcionada son invaluables para mejorar nuestra eficacia y alcance.”</p>
                                </div>
                            </div>

                            <div class="single-customer mb-100">
                                <div class="what-img">
                                    <img src="Landingpage/assets/img/shape/man2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">Profesora Marta Rodríguez</a></h4>
                                    <p>“La plataforma VerdIES es una herramienta esencial en la educación sobre reciclaje. Nos ha proporcionado recursos valiosos y ha fomentado un mayor compromiso entre los estudiantes y la comunidad.”</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="say-something-aera pt-90 pb-90 fix">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="offset-xl-1 offset-lg-1 col-xl-5 col-lg-5">
                    <div class="say-something-cap">
                        <h2>Únete al Hub de Colaboración y Reciclaje de VerdIES en Nicaragua</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="say-btn">
                        <a href="#" class="btn radius-btn">Contáctanos</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- shape -->
        <div class="say-shape">
            <img src="Landingpage/assets/img/shape/say-shape-left.png" alt="" class="say-shape1 rotateme d-none d-xl-block">
            <img src="Landingpage/assets/img/shape/say-shape-right.png" alt="" class="say-shape2 d-none d-lg-block">
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('Landingpage/assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/contact.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('Landingpage/assets/js/main.js') }}"></script>
@endpush