@extends('Layouts.layouts')
@section('title', 'Categorias')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Actualizar Universidad</h5>
                        <small class="text-muted float-end">Campos requeridos *</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('areas.update', ['areas' => $areas->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label text-dark">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ old('nombre', $areas->nombre) }}">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estado" class="form-label text-dark">Estado</label>
                                        <select id="estado" name="estado"
                                            class="form-select @error('estado') is-invalid @enderror">
                                            <option selected disabled>Elegir estado</option>
                                            <option value="1"
                                                {{ old('estado', $areas->estado) == '1' ? 'selected' : '' }}>Activo</option>
                                            <option value="0"
                                                {{ old('estado', $areas->estado) == '0' ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="selectpickerMultiple" class="form-label">Carreras</label>
                                        <select id="materiales" class="form-select w-100" data-style="btn-default"
                                            data-icon-base="bx" data-tick-icon="bx-check text-primary">
                                            @foreach ($carrera as $carrera)
                                                <option value="{{ $carrera->id }}"
                                                    {{ old('carreras') == $carrera->id ? 'selected' : '' }}>
                                                    {{ $carrera->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('carreras')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo" class="form-label text-dark">Logo *</label>
                                        <input type="file" id="logo" name="logo" placeholder=""
                                            class="form-control @error('logo') is-invalid @enderror"
                                            value="{{ old('logo') }}">
                                        @error('logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion" class="form-label text-dark">Descripción</label>
                                        <textarea id="descripcion" name="descripcion" rows="3"
                                            class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $areas->descripcion) }}</textarea>
                                        @error('descripcion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" id="materialesData" name="materialesData">
                                <div class="col-md-12">

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <button type="button" id="addMaterial" class="btn btn-warning mb-2">Agregar
                                            carrera</button>


                                        <a href="{{ route('areas.index') }}"
                                            class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Materiales entregados -->
                <div class="col-xl-12 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Carreras Asociadas</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="materialesTable">
                                    <caption class="ms-4">Lista de Carreras</caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Carrera</th>
                                            <th>Estado</th>

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($areas->detalles->isNotEmpty())
                                            @foreach ($areas->detalles as $material)
                                                <tr class="odd" data-material-id="{{ $material->carreras->id }}">
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $material->carreras->nombre }}</td>

                                                    <td><span
                                                            class=" badge bg-label-{{ $material->estado == 1 ? 'primary' : 'danger' }} me-1">
                                                            {{ $material->estado == 1 ? 'Activo' : 'Inactivo' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <button type="button"
                                                        class="btn btn-{{ $material->estado == 1 ? 'danger' : 'success' }}"
                                                        role="button" 
                                                        onclick="confirmAction({{ $material->id }}, {{ $material->estado }})">
                                                    <i class="bx bx-{{ $material->estado == 1 ? 'trash' : 'toggle-left' }}"></i>
                                                </button>
                                                <form id="deleteForm{{ $material->id }}"
                                                      action="{{ route('areas.destroydetalles', ['id' => $material->id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="submitBtn{{ $material->id }}" type="submit" style="display: none;"></button>
                                                </form>
                                                
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       function confirmAction(rolId, estado) {
    // Determinar el mensaje según el estado
    let title = estado == 1 ? '¿Estás seguro?' : '¿Estás seguro ?';
    let text = estado == 1 ? '¿Quieres desactivar esta carrera?' : '¿Quieres activar este carrera?';
    let confirmButtonText = estado == 1 ? 'Sí, desactivar carrera' : 'Sí, activar carrera';

    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: confirmButtonText
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.getElementById('deleteForm' + rolId);

            // Enviar el formulario
            form.submit();
        }
    });
}

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var counter = 0;

            // Cargar materiales desde localStorage
            loadMaterialsFromLocalStorage();

            // Agregar material a la tabla
            $('#addMaterial').on('click', function() {
                var materialId = $('#materiales').val();
                var materialNombre = $('#materiales option:selected').text();
                var estado = 'Pendiente de registro'; // Definir el estado

                // Verificar si el material ya fue añadido
                var exists = $('#materialesTable tbody tr').filter(function() {
                    return $(this).data('material-id') == materialId;
                }).length > 0;

                if (exists) {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Material ya añadido!',
                        text: 'Este material ya ha sido agregado a la lista.',
                    });
                } else if (materialId) {
                    counter++;
                    $('#materialesTable tbody').append(`
                        <tr data-material-id="${materialId}">
                            <td>${counter}</td>
                            <td class="material-nombre">${materialNombre}</td>
                            <td class="material-nombre">
                                <span class="badge bg-label-danger me-1">${estado}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-delete" data-id="${materialId}">Eliminar</button>
                            </td>
                        </tr>
                    `);

                    // Guardar en localStorage
                    saveMaterialToLocalStorage(materialId, materialNombre, estado);

                    // Actualizar el campo oculto con los IDs de los materiales
                    updateMaterialesData();
                }
            });

            // Eliminar material de la tabla
            $(document).on('click', '.btn-delete', function() {
                var materialId = $(this).data('id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('tr[data-material-id="' + materialId + '"]').remove();

                        // Eliminar del localStorage
                        removeMaterialFromLocalStorage(materialId);

                        // Actualizar el campo oculto con los IDs de los materiales
                        updateMaterialesData();
                    }
                });
            });

            // Función para guardar un material en localStorage
            function saveMaterialToLocalStorage(id, nombre, estado) {
                var materiales = JSON.parse(localStorage.getItem('materiales')) || [];
                materiales.push({
                    id: id,
                    nombre: nombre,
                    estado: estado
                });
                localStorage.setItem('materiales', JSON.stringify(materiales));
            }

            // Función para eliminar un material del localStorage
            function removeMaterialFromLocalStorage(id) {
                var materiales = JSON.parse(localStorage.getItem('materiales')) || [];
                materiales = materiales.filter(function(material) {
                    return material.id != id;
                });
                localStorage.setItem('materiales', JSON.stringify(materiales));
            }

            // Función para cargar los materiales del localStorage a la tabla
            function loadMaterialsFromLocalStorage() {
                var materiales = JSON.parse(localStorage.getItem('materiales')) || [];
                materiales.forEach(function(material, index) {
                    counter++;
                    $('#materialesTable tbody').append(`
                        <tr data-material-id="${material.id}">
                            <td>${counter}</td>
                            <td class="material-nombre">${material.nombre}</td>
                            <td class="material-nombre">
                                <span class="badge bg-label-danger me-1">${material.estado}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-delete" data-id="${material.id}">Eliminar</button>
                            </td>
                        </tr>
                    `);
                });

                // Actualizar el campo oculto con los IDs de los materiales
                updateMaterialesData();
            }

            // Función para actualizar el campo oculto con los IDs de los materiales
            function updateMaterialesData() {
                var materialesIds = [];
                $('#materialesTable tbody tr').each(function() {
                    materialesIds.push($(this).data('material-id'));
                });
                $('#materialesData').val(JSON.stringify(materialesIds));
            }
        });
    </script>


@endsection
