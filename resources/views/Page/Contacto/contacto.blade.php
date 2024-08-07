@extends('Layouts.Page.layout')
@section('title', 'Inicio')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
@endpush

@section('content')
    <div class="services-area">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>¿Cómo contactarnos?​</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Ponte en Contacto</h2>

                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu mensaje'" placeholder="Ingresa tu mensaje"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu nombre'"
                                        placeholder="Ingresa tu nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu correo electrónico'"
                                        placeholder="Correo electrónico">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa el asunto'"
                                        placeholder="Ingresa el asunto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Enviar</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Nicaragua, Managua.</h3>
                            <p>Código postal, NI 15000 </p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+505 4556 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@verdies.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
