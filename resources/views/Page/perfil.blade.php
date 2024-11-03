@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Perfil')
<link rel="stylesheet" href="{{ asset('js/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-xxl ">

            <div class="row  justify-content-center">
                <div class="col-md-6">
                  
                    <div class="card mb-4">
                        <form action="actualizarperfil" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header">Perfil detalle</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ Session::get('Foto') }}" alt="user-avatar" class="d-block rounded"
                                        height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Subir nueva foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="imagen" class="account-file-input"
                                                hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <p class="text-muted mb-0">Se aceptan JPG, GIF o PNG. Tamaño máximo 800K</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="firstName" class="form-label">Nombre completo</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input class="form-control" type="text" id="firstName" name="name"
                                                    value="{{ Session::get('nombre') }}" autofocus />
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">Correo</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input class="form-control" type="text" id="email" name="correo"
                                                    value="{{ $user->email }}" disabled />
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="password" class="form-label">Nueva contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                                <input class="form-control" type="password" id="password" name="password"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                       
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-success me-2"><i class="bi bi-save"></i>
                                                Guardar cambios</button>
                                            <a href="{{route('home')}}" class="btn btn-outline-danger"><i
                                                    class="bi bi-x-circle"></i>
                                                Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Account -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">Inicios de actividad</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0"></div>

                            <strong>Inicios activos:</strong>
                            <div class="row g-4 mt-2">
                                @foreach ($sessiones as $item)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card bg-light border">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    @if ($item->platform_name == 'Mobile')
                                                        <i class="bi bi-phone-fill fa-2x text-primary"></i>
                                                    @else
                                                        <i class="bi bi-laptop-fill fa-2x text-primary"></i>
                                                    @endif
                                                    <span class="text-muted">{{ $item->platform_name }}
                                                        {{ $item->browser_name }}</span>
                                                </div>
                                                <p class="card-text mb-0">
                                                    <strong>IP:</strong> {{ $item->ip_address }}
                                                    @if ($item->ip_address === request()->ip() && $item->user_agent === request()->header('User-Agent'))
                                                        <span class="badge rounded-pill bg-primary">Esta es la sesión
                                                            actual</span>
                                                    @else
                                                        <strong>Actividad:</strong>
                                                        {{ \Carbon\Carbon::createFromTimeStamp($item->last_activity)->diffForHumans() }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            @if ($sessiones->count() > 1)
                                <form id="formCerrarSesion" action="{{ route('cerrar_sesion_dispositivo') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ session('IdUser') }}">
                                    <!-- Este botón desencadenará el SweetAlert -->
                                    <button type="button" class="btn btn-danger mt-3"
                                        onclick="confirmAction({{ session('IdUser') }})">
                                        <i class="bi bi-x-circle"></i> Cerrar sesión en los otros dispositivos
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row justify-content-center">


        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/select2/js/select2.full.min.js') }}"></script>
    <script>
        async function confirmAction(SessionId) {
            const {
                value: password
            } = await Swal.fire({
                title: "Ingresa tu contraseña",
                input: "password",
                inputLabel: "Contraseña",
                inputPlaceholder: "Ingresa tu contraseña",
                inputAttributes: {
                    maxlength: "10",
                    autocapitalize: "off",
                    autocorrect: "off"
                },
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value.trim() === "") {
                            resolve("Debes ingresar tu contraseña");
                        } else {
                            resolve();
                        }
                    });
                },
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, cerrar todas las sesiones',
                cancelButtonText: 'Cancelar'
            });

            if (password) {
                // Si se ingresó una contraseña, proceder con el envío del formulario
                var form = document.getElementById('formCerrarSesion');
                var passwordInput = document.createElement('input');
                passwordInput.type = 'hidden';
                passwordInput.name = 'current_password';
                passwordInput.value = password;
                form.appendChild(passwordInput);
                form.submit();
            }
        }
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.buscador').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection
