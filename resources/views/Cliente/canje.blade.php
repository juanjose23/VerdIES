@extends('cliente.layouts.master')

@section('title', 'Canje')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/mapbox-gl/mapbox-gl.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/css/pages/app-logistics-fleet.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />


<style>
    .accordion-button {
        display: block !important;
    }

    .img-fluid {
        max-width: 10% !important;
    }
</style>

<div class="title">
    <h2 style="font-weight: 900;" class="mb-20">Centros de <span>acopio</span> </h2>
</div>


<button type="button" class="btn btn-success" id="type-success">
    Success
</button>

<input type="text" value="{{Session::get('IdUser') }}" name="id_usuario" id="id_usuario" hidden>
<input type="text" value="{{Session::get('nombre') }}" name="nombre_usuario" id="nombre_usuario" hidden>

<!-- Modal de información del centro de acopio -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Lugar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <!-- Aquí aparecerán los detalles del lugar -->
                <p id="modal-description">Descripción del lugar</p>
                <img id="modal-image" src="" alt="Imagen del lugar" class="img-fluid">
            </div>
            <div class="modal-footer">
                <!-- Botón para abrir Google Maps con la ruta -->
                <div class="d-grid gap-2 col-lg-6 mx-auto mt-5">
                    <a id="" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createApp">Canjear aquí</a>
                    <a id="maps-link" href="#" class="btn btn-primary" target="_blank">Ver ruta en Google Maps</a>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="card overflow-hidden">

    <!-- Map Menu Wrapper -->
    <div class="d-flex app-logistics-fleet-wrapper">

        <!-- Map Menu Button when screen is < md -->
        <div class="flex-shrink-0 position-fixed m-6 d-md-none w-auto z-1">
            <button class="btn btn-icon btn-white btn-white-dark-variant z-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar"><i class='bx bx-menu'></i></button>
        </div>

        <!-- Map Menu -->
        <div class="app-logistics-fleet-sidebar col h-100" id="app-logistics-fleet-sidebar">
            <!-- Sidebar when screen < md -->
            <div class="card-body p-0 logistics-fleet-sidebar-body">
                <!-- Menu Accordion -->
                <livewire:ListaAcopios />

            </div>
        </div>

        <!-- Mapbox Map container -->
        <div class="col h-100 map-container">
            <!-- Map -->
            <div id="map" class="w-100 h-100"></div>
        </div>

        <!-- Overlay Hidden -->
        <div class="app-overlay d-none"></div>
    </div>
</div>


<!-- Modal pasos QR -->
<!-- Create App Modal -->
<div class="modal fade" id="createApp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-simple modal-upgrade-plan">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- App Wizard -->
                <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                    <div class="bs-stepper-header border-0 p-1 pb-0" hidden>
                        <div class="step" data-target="#details">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-home"></i></span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Details</span>
                                    <span class="bs-stepper-subtitle">Enter Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#frameworks">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-box"></i></span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Frameworks</span>
                                    <span class="bs-stepper-subtitle">Select Framework</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#database">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-data"></i></span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Database</span>
                                    <span class="bs-stepper-subtitle">Select Database</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#billing">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-credit-card"></i></span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Billing</span>
                                    <span class="bs-stepper-subtitle">Payment Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#submit">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-check"></i></span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title text-uppercase">Submit</span>
                                    <span class="bs-stepper-subtitle">Submit</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content p-1 pb-0">
                        <form onsubmit="return false">
                            <!-- Details -->
                            <div id="details" class="content pt-4 pt-lg-0">
                                <div class="text-center">
                                    <h4 class="mb-2">Primer paso</h4>
                                    <p class="mb-6">Dirigite a la pantalla del centro de acopio y presiona <b>"Iniciar reciclaje"</b></p>
                                </div>

                                <!--  Create App -->
                                <div class="img_instrucction d-flex justify-content-center">
                                    <div class="col-12 col-sm-6 col-lg-4 mb-6">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <i class='mb-6 bx bx-36px bx-cube'></i>
                                                <h5>VerdIES</h5>
                                                <button type="button" class="btn btn-primary" disabled> Iniciar reciclaje</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                </ul>
                                <div class="d-grid gap-2 col-lg-6 mx-auto mt-5">
                                    <button class="btn btn-primary btn-lg btn-next" id="siguiente-camara" type="button">Siguiente</button>
                                </div>
                            </div>

                            <!-- Frameworks -->
                            <div id="frameworks" class="content pt-4 pt-lg-0">
                                <button class="btn btn-label-secondary btn-prev" style="
    max-width: 1%;
    position: absolute;
    top: 45px;
    left: 15px;
    /* margin-bottom: 0px; */
"> <i class="bx bx-left-arrow-alt bx-sm me-sm-2 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                <div class="text-center">
                                    <h4 class="mb-2">Segundo paso</h4>
                                    <p class="mb-6">En la pantalla del centro de acopio escanea <b>Código QR</b></p>
                                </div>

                                <div id="reader" width="600px"></div>

                                </ul>

                                <div class="col-12 d-flex justify-content-between mt-6" style="display: none !important;">
                                    <button class="btn btn-label-secondary btn-prev"> <i class="bx bx-left-arrow-alt bx-sm me-sm-2 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span> <i class="bx bx-right-arrow-alt bx-sm"></i></button>
                                </div>
                            </div>

                            <!-- Database -->
                            <div id="database" class="content pt-4 pt-lg-0">
                                <div class="mb-6">
                                    <label for="exampleInputEmail2" class="form-label">Database Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Database Name">
                                </div>
                                <h5>Select Database Engine</h5>
                                <ul class="p-0 m-0">
                                    <li class="d-flex align-items-start mb-4">
                                        <div class="badge bg-label-danger p-2 me-3 rounded"><i class="bx bxl-firebase bx-30px"></i></div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-1">Firebase</h6>
                                                <small>Cloud Firestone</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input name="database-radio" class="form-check-input" type="radio" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start mb-4">
                                        <div class="badge bg-label-warning p-2 me-3 rounded"><i class="bx bxl-amazon bx-30px"></i></div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-1">AWS</h6>
                                                <small>Amazon Fast NoSQL Database</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input name="database-radio" class="form-check-input" type="radio" value="" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <div class="badge bg-label-info p-2 me-3 rounded"><i class="bx bx-data bx-30px"></i></div>
                                        <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-1">MySQL</h6>
                                                <small>Basic MySQL database</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input name="database-radio" class="form-check-input" type="radio" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="col-12 d-flex justify-content-between mt-6">
                                    <button class="btn btn-label-secondary btn-prev"> <i class="bx bx-left-arrow-alt bx-sm me-sm-2 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span> <i class="bx bx-right-arrow-alt bx-sm"></i></button>
                                </div>
                            </div>

                            <!-- billing -->
                            <div id="billing" class="content">
                                <h5 class="mb-6">Payment Details</h5>
                                <div id="AppNewCCForm" class="row g-6 mb-6" onsubmit="return false">
                                    <div class="col-12">
                                        <label for="modalAppCardNumber" class="form-label">Card Number</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control app-credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="modalAppAddCard" id="modalAppCardNumber">
                                            <span class="input-group-text cursor-pointer" id="modalAppAddCard"><span class="app-card-type"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="modalAppUserName" class="form-label">Name on Card</label>
                                        <input type="text" class="form-control" placeholder="John Doe" id="modalAppUserName">
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="modalAppExpiry" class="form-label">Expiry</label>
                                        <input type="text" class="form-control app-expiry-date-mask" placeholder="MM/YY" id="modalAppExpiry">
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="modalAppAddCardCvv" class="form-label">CVV</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="modalAppAddCardCvv" class="form-control app-cvv-code-mask" maxlength="3" placeholder="654">
                                            <span class="input-group-text cursor-pointer" id="modalAppAddCardCvv2"><i class="text-muted bx bx-help-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check form-switch my-2 ms-2">
                                            <input type="checkbox" class="form-check-input" id="appFutureAddress" checked="">
                                            <label for="appFutureAddress" class="switch-label">Save card for future billing?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between mt-6">
                                    <button class="btn btn-label-secondary btn-prev"> <i class="bx bx-left-arrow-alt bx-sm me-sm-2 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-2">Next</span> <i class="bx bx-right-arrow-alt bx-sm"></i></button>
                                </div>
                            </div>

                            <!-- submit -->
                            <div id="submit" class="content text-center pt-4 pt-lg-0">
                                <h5 class="mb-1">Submit</h5>
                                <p class="small">Submit to kick start your project.</p>
                                <!-- image -->
                                <img src="../../assets/img/illustrations/man-with-laptop.png" alt="Create App img" width="163" class="img-fluid">
                                <div class="col-12 d-flex justify-content-between mt-6">
                                    <button class="btn btn-label-secondary btn-prev"> <i class="bx bx-left-arrow-alt bx-sm me-sm-2 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                    <button class="btn btn-success btn-next btn-submit" data-bs-dismiss="modal" aria-label="Close"> <span class="align-middle">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/ App Wizard -->
        </div>
    </div>
</div>
<!--/ Create App Modal -->


<!-- / Content -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>


<!-- Vendors JS -->
<script src="{{ asset('Cliente/assets/vendor/libs/mapbox-gl/mapbox-gl.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/html5qr/html5qr.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/@form-validation/popular.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>




<!-- Vendors JS -->




<!-- Page JS -->
<script src="{{ asset('Cliente/assets/js/extended-ui-sweetalert2.js') }}"></script>

<script src="{{ asset('Cliente/assets/js/pages-pricing.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-create-app.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-add-new-cc.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-add-new-address.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-edit-user.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-enable-otp.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-share-project.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/modal-two-factor-auth.js') }}"></script>

<script>
    $(document).ready(function() {
        // Código QR
        let siguienteCamara = document.getElementById('siguiente-camara');
        let html5QrcodeScanner;

        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Código escaneado: ${decodedText}`, decodedResult);

            try {
                // Parsear el JSON del código QR
                let data = JSON.parse(decodedText);

                console.log('Datos del código QR:', data);

                if (data && data.success) {
                    // Extraer el id del centro de acopio
                    let idCentroAcopio = data.centroacopios.id;

                    // Obtener los valores de los inputs ocultos
                    let idUsuario = $('#id_usuario').val();
                    let nombre_usuario = $('#nombre_usuario').val();

                    // Crear el JSON con los datos obtenidos
                    let jsonFabricado = {
                        id_centro_acopio: idCentroAcopio,
                        id_user: idUsuario,
                        nombre_user: nombre_usuario,
                    };

                    

                    // Detener el escáner antes de hacer el POST
                    html5QrcodeScanner.clear().then(() => {
                        console.log("Escáner detenido");
                    }).catch(err => {
                        console.error("No se pudo detener el escáner", err);
                    });

                    console.log('JSON fabricado:', JSON.stringify(jsonFabricado));

                    // Hacer el POST con el JSON fabricado
                    $.ajax({
                        url: 'https://qq37ws9m-8002.use.devtunnels.ms/inicio_sesion',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(jsonFabricado),
                        success: function(response) {
                            console.log('Respuesta del servidor:', response);

                            // Mostrar SweetAlert2 de éxito
                            Swal.fire({
                                title: "Sesión iniciada correctamente",
                                text: "Has iniciado sesión en el centro de acopio inteligente.",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Recargar la página después de cerrar el modal
                                    location.reload();
                                }
                            });
                        },
                        error: function(error) {
                            console.error('Error en la solicitud:', error);

                            // Mostrar SweetAlert2 de error y reactivar el escáner
                            Swal.fire({
                                title: "Error",
                                text: "Hubo un error al iniciar sesión. Intenta nuevamente.",
                                icon: "error",
                                confirmButtonText: "Reintentar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Volver a activar el escáner
                                    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "El formato del código QR es incorrecto.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            } catch (error) {
                console.error('Error al parsear el JSON: ', error);
                Swal.fire({
                    title: "Error",
                    text: "El código QR no contiene un JSON válido.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }

        function onScanFailure(error) {
            console.warn(`Error al escanear el código: ${error}`);
        }

        siguienteCamara.addEventListener('click', function() {
            html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });
    });
</script>


@endsection