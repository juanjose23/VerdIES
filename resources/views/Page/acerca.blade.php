@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Acerca de nosotros')
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <h2>Quiénes somos:</h2>
                    <p>
                        Somos un equipo de estudiantes apasionados por la innovación tecnológica y el desarrollo sostenible,
                        comprometidos en crear soluciones que impulsen la economía circular dentro de nuestra universidad.
                    </p>
                    <ul class="list-unstyled mt-4">
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle me-2 text-success"></i>
                            Innovación tecnológica
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle me-2 text-success"></i>
                            Desarrollo sostenible
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle me-2 text-success"></i>
                            Economía circular
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 pt-4 pt-lg-0 text-center" data-aos="fade-left" data-aos-delay="200">
                    <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1717962322/Verdies/srx3xflk0atk71jzrmdq.png"
                        class="img-fluid rounded" alt="Equipo eCoins">
                </div>
            </div>

        </div>
    </section>
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <h2 class="section-title">Visión y Misión</h2>
                            <div class="col-xl-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class='bx bxs-leaf'></i>
                                    <h4>Visión</h4>
                                    <p>Nuestra visión es convertirnos en líderes en la implementación de tecnologías
                                        sostenibles dentro del ámbito académico, fomentando una comunidad consciente y
                                        comprometida con el medio ambiente.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Misión</h4>
                                    <p>Nuestra misión es desarrollar eCoins, una plataforma que incentive la recolección y
                                        reciclaje de materiales, recompensando a los estudiantes y personal de la UNI por
                                        sus esfuerzos en la gestión de residuos.</p>
                                </div>
                            </div>

                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section>

  
@endsection
