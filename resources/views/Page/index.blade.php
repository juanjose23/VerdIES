@extends('Layouts.layout')
@section('title', 'Inicio')

@section('content')
    <section id="clients" class="clients">
        <livewire:carruselareas />
    </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <h2>Compromiso Social</h2>
                   
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                    <p>
                        En VerdIES, estamos comprometidos con la construcción de un futuro más sostenible y responsable en la Universidad Nacional de Ingeniería. Creemos firmemente en la importancia de promover prácticas ambientales responsables y en el poder de la comunidad universitaria para generar un impacto positivo en nuestro entorno.

                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Nuestra plataforma no solo busca facilitar el proceso de reciclaje, sino que también promueve una cultura de conciencia ambiental y responsabilidad social entre los estudiantes, profesores y personal administrativo de la universidad.</li>
                        <li><i class="ri-check-double-line"></i> Creemos que cada acción cuenta y que juntos podemos marcar la diferencia.</li>
                    </ul>
                    
                    <p class="fst-italic">
                        ¡Únete a nosotros y sé parte del cambio hacia un futuro más verde y sostenible en la Universidad Nacional de Ingeniería!
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="counts" class="counts" style="background-color: #2D6244;">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Hours Of Support</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Hard Workers</p>
                </div>

            </div>

        </div>
    </section>
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right" style="background-color: #2D6244;">
                    <div class="content" style="background-color: #2D6244;">
                        <h3>Why Choose Bethany for your company website?</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                            optio ad corporis.
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class='bx bxs-leaf' ></i>
                                    <h4>Corporis voluptates sit</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Ullamco laboris ladore pan</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Labore consequatur</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section>
    <section id="cta" class="cta">
        <div class="container">

            <div class="text-center" data-aos="zoom-in">
                <h3>¿Cómo reciclar de manera efectiva?</h3>
                <p>El reciclaje es una acción fundamental para reducir nuestra huella ambiental. Al reciclar, contribuimos a la conservación de los recursos naturales y al cuidado del medio ambiente. Aunque pueda parecer un pequeño gesto, cada acción cuenta en la lucha por un futuro más sostenible.</p>
                <a class="cta-btn" href="{{ route('educacion-ambiental') }}">Leer más</a>
            </div>
            

        </div>
    </section>

@endsection
