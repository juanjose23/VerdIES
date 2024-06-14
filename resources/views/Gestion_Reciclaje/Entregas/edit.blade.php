@extends('Layouts.layouts')
@section('title', 'Verficar entregas')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('entregas.update', $entrega->id) }}" method="POST" class="d-md-flex w-100">
            @csrf
            @method('PUT')
            <!-- Columna principal -->
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Verificar Entrega</h5>
                        <small class="text-muted float-end">Campos requeridos *</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nombre" class="form-label text-dark">Nombre *</label>
                                    <input type="text" id="nombre" name="nombre"
                                           placeholder="Escribe el nombre de la categoría"
                                           class="form-control @error('nombre') is-invalid @enderror"
                                           value="{{ old('nombre', $entrega->users->name) }}">
                                    @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Correo -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="correo" class="form-label text-dark">Correo *</label>
                                    <input type="text" id="correo" name="correo"
                                           placeholder="Escribe el correo"
                                           class="form-control @error('correo') is-invalid @enderror"
                                           value="{{ old('correo', $entrega->users->email) }}">
                                    @error('correo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Centro de acopio -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="centro_acopio" class="form-label text-dark">Centro de acopio *</label>
                                    <input type="text" id="centro_acopio" name="centro_acopio"
                                           placeholder="Escribe el nombre del centro de acopio"
                                           class="form-control @error('centro_acopio') is-invalid @enderror"
                                           value="{{ old('centro_acopio', $entrega->acopios->nombre) }}">
                                    @error('centro_acopio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Estado -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="estado" class="form-label text-dark">Estado *</label>
                                    <select id="estado" name="estado"
                                            class="form-select @error('estado') is-invalid @enderror">
                                        <option selected disabled>Elegir estado</option>
                                        <option value="1" {{ old('estado', $entrega->estado) == '1' ? 'selected' : '' }}>Verificar</option>
                                        <option value="2" {{ old('estado', $entrega->estado) == '0' ? 'selected' : '' }}>Verificado</option>
                                    </select>
                                    @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Nota -->
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="descripcion" class="form-label text-dark">Nota</label>
                                    <textarea id="descripcion" name="nota" rows="3"
                                              class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $entrega->nota) }}</textarea>
                                    @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Botones -->
                            <div class="col-md-12 mb-3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <a href="{{ route('entregas.index') }}" class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                    <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="col-xl-4 mb-3 ml-8"> <!-- Clase ml-3 añadida para margen izquierdo -->
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Foto</h5>
                        <h6 class="card-subtitle text-muted">Evidencia de entrega</h6>
                        <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{ $entrega->imagenes->url }}"
                             alt="Card image cap"/>
                        <a href="{{ $entrega->imagenes->url }}" target="_blank" class="card-link">Ver</a>
                    </div>
                </div>
            </div>
            <!-- Input oculto para almacenar datos -->
            <input type="hidden" id="materialesData" name="materialesData">
        </form>
    </div>
    <div class="row">
        <!-- Materiales entregados -->
        <div class="col-xl-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Materiales entregados</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <caption class="ms-4">Lista de Materiales</caption>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Material</th>
                                <th>Cantidad</th>
                                <th>Valor esperado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($materiales as $material)
                                <tr class="odd" data-material-id="{{ $material->materiales_id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $material->materiales->categorias->nombre }}</td>
                                    <td class="sorting_1">
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                @if ($material->materiales->imagenes)
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="{{ $material->materiales->imagenes->url }}" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                @else
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="https://ui-avatars.com/api/?name= {{ $material->materiales->nombre }}"
                                                             alt="Avatar" class="rounded-circle">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="" class="text-body text-truncate">
                                                    <span class="fw-medium">{{ $material->materiales->nombre }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-wrap cantidad" data-cantidad="{{ $material->cantidad }}">{{ wordwrap($material->cantidad, 50, "\n", true) }}</td>
                                    <td class="text-wrap">{{ wordwrap($material->valor, 50, "\n", true) }} {{$material->monedas->nombre}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-edit" data-id="{{ $material->materiales_id }}" data-cantidad="{{ $material->cantidad }}">Editar</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-edit').on('click', function () {
            var materialId = $(this).data('id');
            var currentCantidad = $(this).data('cantidad');

            Swal.fire({
                title: 'Editar Cantidad',
                input: 'text',
                inputValue: currentCantidad,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                inputValidator: (value) => {
                    if (!value) {
                        return '¡Necesitas ingresar una cantidad!'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    var newCantidad = result.value;

                    // Actualiza la cantidad en la tabla
                    var row = $('tr[data-material-id="' + materialId + '"]');
                    row.find('.cantidad').text(newCantidad).data('cantidad', newCantidad);

                    // Actualiza el input oculto con los datos modificados
                    updateMaterialesData();
                }
            });
        });

        function updateMaterialesData() {
            var materialesData = [];

            $('tr[data-material-id]').each(function () {
                var materialId = $(this).data('material-id');
                var cantidad = $(this).find('.cantidad').data('cantidad');
                materialesData.push({id: materialId, cantidad: cantidad});
            });

            $('#materialesData').val(JSON.stringify(materialesData));
        }

        // Inicializa el input oculto con los datos actuales
        updateMaterialesData();
    });
</script>


@endsection
