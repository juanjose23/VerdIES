@extends('Layouts.layouts')
@section('title', 'Verficar entregas')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('entregas.store') }}" method="POST" class="d-md-flex w-100">
                @csrf
                <!-- Formulario Principal -->
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Verificar Entrega</h5>
                            <small class="text-muted float-end">Campos requeridos *</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Selección de Centro de Acopio -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="acopios" class="form-label text-dark">Centro de acopio *</label>
                                        <select style="width: 100%" id="acopios" name="acopios"
                                            class="buscador form-select @error('acopios') is-invalid @enderror">
                                            <option>Seleccionar Acopios</option>
                                            @foreach ($acopios as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('acopios') == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('acopios')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Selección de Usuarios -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="user" class="form-label text-dark">Usuarios *</label>
                                        <select style="width: 100%" id="user" name="user"
                                            class="buscador form-select @error('user') is-invalid @enderror">
                                            <option>Seleccionar usuarios</option>
                                            @foreach ($usuarios as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->email }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Selección de Material -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="materiales" class="form-label text-dark">Material *</label>
                                        <select style="width: 100%" id="materiales" name="materiales"
                                            class="buscador form-select @error('materiales') is-invalid @enderror">
                                            <option>Seleccionar Material</option>
                                            @foreach ($materiales as $material => $sub)
                                                <optgroup label="{{ $material }}">
                                                    @foreach ($sub as $subs)
                                                        <option value="{{ $subs['id'] }}">
                                                            {{ $subs['nombre'] }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        @error('materiales')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Entrada de Cantidad -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="cantidad" class="form-label text-dark">Cantidad *</label>
                                        <input type="number" id="cantidad" name="cantidad" min="1" step="1"
                                            placeholder="Escribe la cantidad"
                                            class="form-control @error('cantidad') is-invalid @enderror">
                                        @error('cantidad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Botones para agregar materiales -->
                                <div class="col-md-6 mb-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <button type="button" id="addMaterial" class="btn btn-warning mb-2">Agregar
                                            Material</button>


                                        <a href="{{ route('entregas.index') }}"
                                           id="cancelarBtn" class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                        <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input oculto para almacenar datos -->
                <input type="hidden" id="materialesData" name="materialesData">


                <!-- Botones de Acción -->

            </form>
            <!-- Materiales entregados -->
            <div class="col-xl-12 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Materiales entregados</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="materialesTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se agregarán las filas dinámicamente -->
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
        $(document).ready(function() {
            //Eliminar todo el localstorage
            $('#cancelarBtn').on('click', function() {
                localStorage.clear(); 
            });

            let counter = 0;
            const $materialesTable = $('#materialesTable tbody');
            const materialesDataKey = 'materialesData';
            const $registrarBtn = $('.btn-primary'); // Selecciona el botón de "Registrar"

            // Función para mostrar/ocultar el botón de registrar según haya datos o no en localStorage
            const toggleRegistrarBtn = () => {
                const materialesData = JSON.parse(localStorage.getItem(materialesDataKey)) || [];
                if (materialesData.length > 0) {
                    $registrarBtn.show();
                } else {
                    $registrarBtn.hide();
                }
            };

            // Función para añadir un material a la tabla
            const agregarMaterial = (materialId, materialNombre, cantidad) => {
                const existingRow = $materialesTable.find(`tr[data-material-id="${materialId}"]`);
                if (existingRow.length > 0) {
                    // Si el material ya existe, actualiza la cantidad
                    const currentCantidad = parseInt(existingRow.find('.cantidad').data('cantidad'));
                    const nuevaCantidad = currentCantidad + parseInt(cantidad);
                    existingRow.find('.cantidad').text(nuevaCantidad).data('cantidad', nuevaCantidad);
                } else {
                    // Si el material no existe, lo agrega como una nueva fila
                    counter++;
                    $materialesTable.append(`
                        <tr data-material-id="${materialId}">
                            <td>${counter}</td>
                            <td class="material-nombre" data-nombre="${materialNombre}">${materialNombre}</td>
                            <td class="cantidad" data-cantidad="${cantidad}">${cantidad}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-edit" data-id="${materialId}" data-cantidad="${cantidad}">Editar</button>
                                <button type="button" class="btn btn-danger btn-delete" data-id="${materialId}">Eliminar</button>
                            </td>
                        </tr>
                    `);
                }
            };

            // Función para actualizar los datos en localStorage y el input oculto
            const actualizarMaterialesData = () => {
                const materialesData = $materialesTable.find('tr[data-material-id]').map(function() {
                    const $this = $(this);
                    return {
                        id: $this.data('material-id'),
                        nombre: $this.find('.material-nombre').data('nombre'),
                        cantidad: $this.find('.cantidad').data('cantidad')
                    };
                }).get();

                localStorage.setItem(materialesDataKey, JSON.stringify(materialesData));
                $('#materialesData').val(JSON.stringify(materialesData));
                toggleRegistrarBtn(); // Actualiza la visibilidad del botón después de cada cambio
            };

            // Función para cargar los datos del localStorage
            const cargarMaterialesData = () => {
                const materialesData = JSON.parse(localStorage.getItem(materialesDataKey)) || [];
                materialesData.forEach(({
                    id,
                    nombre,
                    cantidad
                }) => {
                    agregarMaterial(id, nombre, cantidad);
                });
                toggleRegistrarBtn(); // Actualiza la visibilidad del botón al cargar la página
            };

            // Evento para añadir material
            $('#addMaterial').on('click', () => {
                const materialId = $('#materiales').val();
                const materialNombre = $('#materiales option:selected').text();
                const cantidad = $('#cantidad').val();

                // Validación: Verificar si el ID del material es válido
                if ($('#materiales option[value="' + materialId + '"]').length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El material seleccionado no es válido.',
                    });
                    return;
                }

                if (materialId && cantidad) {
                    agregarMaterial(materialId, materialNombre, cantidad);
                    actualizarMaterialesData();
                }
            });

            // Evento para editar material
            $(document).on('click', '.btn-edit', function() {
                const $button = $(this);
                const materialId = $button.data('id');
                const cantidadActual = $button.data('cantidad');

                Swal.fire({
                    title: 'Editar Cantidad',
                    input: 'number',
                    inputValue: cantidadActual,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        return value ? null : '¡Necesitas ingresar una cantidad!';
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const nuevaCantidad = result.value;
                        const $row = $materialesTable.find(`tr[data-material-id="${materialId}"]`);
                        $row.find('.cantidad').text(nuevaCantidad).data('cantidad', nuevaCantidad);
                        $button.data('cantidad', nuevaCantidad);
                        actualizarMaterialesData();
                    }
                });
            });

            // Evento para eliminar material
            $(document).on('click', '.btn-delete', function() {
                const $row = $(this).closest('tr');
                const materialId = $row.data('material-id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $row.remove();
                        actualizarMaterialesData();
                    }
                });
            });

            // Cargar datos al iniciar la página
            cargarMaterialesData();
        });
    </script>


@endsection
