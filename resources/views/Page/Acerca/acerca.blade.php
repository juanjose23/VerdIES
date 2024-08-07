@extends('Layouts.Page.layout')
@section('title', 'Inicio')
@section('seccion', 'Acerca de nosotros')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
@endpush
@section('content')
    <section class="best-features-area section-padd4">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-8 col-lg-10">
                    <!-- Título de la sección -->
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="section-tittle">
                                <h2>Nuestra Misión, Visión y el Impacto Esperado</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Contenido de la sección -->
                    <div class="row">
                        <!-- Misión -->
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="single-features mb-70">
                                <div class="features-icon">
                                    <span class="flaticon-support"></span>
                                </div>
                                <div class="features-caption">
                                    <h3>Misión</h3>
                                    <p>Promover la cultura del reciclaje en universidades de Nicaragua mediante una
                                        plataforma innovadora que incentiva la participación estudiantil a través de premios
                                        y recompensas.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Visión -->
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="single-features mb-70">
                                <div class="features-icon">
                                    <span class="flaticon-support"></span>
                                </div>
                                <div class="features-caption">
                                    <h3>Visión</h3>
                                    <p>Convertirnos en la principal red de reciclaje universitaria en Nicaragua,
                                        destacándonos por nuestra capacidad para generar impacto positivo en la gestión de
                                        residuos y la educación ambiental.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Shpe -->
            <div class="features-shpae d-none d-lg-block">
                <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1717962322/Verdies/srx3xflk0atk71jzrmdq.png"
                    alt="">
            </div>
    </section>
    <section class="container">
        <div class="section-top-border">
            <h3 class="mb-30">Objetivos del Proyecto</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Promover el Reciclaje</h4>
                        <p>Incentivar la participación en programas de reciclaje en universidades a través de recompensas y
                            premios.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Establecer Relaciones Comerciales</h4>
                        <p>Crear alianzas con recicladoras importantes para asegurar la correcta gestión de los materiales
                            reciclables.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Educar y Concienciar</h4>
                        <p>Aumentar la conciencia sobre la importancia del reciclaje y la economía circular entre los
                            estudiantes universitarios.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Impacto Esperado -->
        <div class="section-top-border">
            <h3 class="mb-30">Impacto Esperado</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Reducción de Residuos</h4>
                        <p>Disminuir la cantidad de residuos generados en las universidades mediante el reciclaje y la
                            reutilización.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Educación Ambiental</h4>
                        <p>Mejorar la educación sobre prácticas sostenibles y reciclaje entre los estudiantes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Modelo Replicable</h4>
                        <p>Crear un modelo que pueda ser adoptado por otras universidades y regiones.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historia -->
        <div class="section-top-border">
            <h3 class="mb-30">Historia</h3>
            <div class="row">
                <div class="col-lg-12">
                    <blockquote class="generic-blockquote">
                        VerdIES nació como una iniciativa de estudiantes de quinto año de Ingeniería en Sistemas en la
                        Universidad Nacional de Ingeniería. Motivados por el creciente problema de los residuos y la falta
                        de incentivos para el reciclaje en el ámbito universitario, un grupo de jóvenes emprendedores
                        decidió desarrollar una solución que combinara tecnología, sostenibilidad y participación
                        estudiantil.
                        <br><br>
                        El proyecto se desarrolló en el marco de un curso de gestión de proyectos, con el objetivo de crear
                        una plataforma que no solo facilitara la recolección y el reciclaje de materiales, sino que también
                        recompensara a los estudiantes por su compromiso con el medio ambiente. Tras meses de investigación,
                        diseño y colaboración con expertos en reciclaje, VerdIES comenzó a tomar forma.
                        <br><br>
                        VerdIES estableció alianzas con recicladoras locales y diseñó un sistema de incentivos para motivar
                        la participación. Hoy en día, VerdIES se presenta como un modelo de integración entre tecnología y
                        sostenibilidad, con la ambición de expandirse a universidades de todo el país y fortalecer su
                        impacto en la gestión de residuos y la conciencia ambiental.
                    </blockquote>
                </div>
            </div>
        </div>
        
    </section>

@endsection
