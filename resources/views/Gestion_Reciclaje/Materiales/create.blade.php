@extends('Layouts.layouts')
@section('title', 'Verficar entregas')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('material.store') }}" method="POST" class="d-md-flex w-100">
                @csrf
                <!-- Formulario Principal -->
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Realizar Entrega</h5>
                            <small class="text-muted float-end">Campos requeridos *</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Selección de Centro de Acopio -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="acopios" class="form-label text-dark">Centro de reciclaje *</label>
                                        <select style="width: 100%" id="acopios" name="recicladoras"
                                            class="buscador form-select @error('acopios') is-invalid @enderror">
                                            <option>Seleccionar centro</option>
                                            @foreach ($recicladoras as $categoria)
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


                                <!-- Selección de Material -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="materiales" class="form-label text-dark">Material *</label>
                                        <select style="width: 100%" id="materiales" name="materiales"
                                            class="buscador form-select @error('materiales') is-invalid @enderror">
                                            <option>Seleccionar Material</option>
                                            @foreach ($materiales as $nombreAcopio => $categorias)
                                                <optgroup label="{{ $nombreAcopio }}">
                                                    @foreach ($categorias as $nombreCategoria => $materiales)
                                                        @foreach ($materiales as $material)
                                                            <option data-cantidad="{{ $material['cantidad'] }}" value="{{ $material['id'] }}">{{ $material['nombre'] }}
                                                            </option>
                                                        @endforeach
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
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="peso" class="form-label text-dark">Peso en libra*</label>
                                        <input type="number" id="peso" name="peso" min="1" step="1"
                                            placeholder="Escribe el peso en libra"
                                            class="form-control @error('peso') is-invalid @enderror">
                                        @error('peso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="precio" class="form-label text-dark">Precio por libra*</label>
                                        <input type="number" id="precio" name="precio" min="1" step="1"
                                            placeholder="Escribe el precio de la libra"
                                            class="form-control @error('peso') is-invalid @enderror">
                                        @error('peso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Input oculto para almacenar datos -->
                                <input type="text" id="materialesData" name="materialesData" hidden>


                                <!-- Botones para agregar materiales -->
                                <div class="col-md-12 mb-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <button type="button" id="addMaterial" class="btn btn-warning mb-2">Agregar
                                            Material</button>


                                        <a href="{{ route('material.index') }}"
                                            class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                        <button type="submit" id="registrarBtn" class="btn btn-primary mb-2"
                                            hidden>Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
                                        <th>Peso</th>
                                        <th>Precio</th>
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
            var counter = 0;

            $('#addMaterial').on('click', function() {
                var materialId = $('#materiales').val();
                var materialNombre = $('#materiales option:selected').text();
                var cantidad = $('#cantidad').val();
                var peso = $('#peso').val();
                var precio = $('#precio').val();
                var acopioId = $('#acopios').val();
                var cantidadDisponible = parseInt($('#materiales option:selected').data('cantidad'));

                if (!materialId || !cantidad || !peso || !precio || !acopioId || cantidad <= 0) {
                    Swal.fire('Error', 'Por favor, completa todos los campos correctamente.', 'error');
                    return;
                }

                cantidad = parseInt(cantidad, 10);
                if (cantidad > cantidadDisponible) {
                    Swal.fire('Error', `Cantidad excede el límite disponible (${cantidadDisponible}).`,
                        'error');
                    return;
                }

                counter++;
                $('#materialesTable tbody').append(`
                    <tr data-material-id="${materialId}" data-acopio-id="${acopioId}">
                        <td>${counter}</td>
                        <td class="material-nombre">${materialNombre}</td>
                        <td class="cantidad" data-cantidad="${cantidad}">${cantidad}</td>
                          <td class="peso" data-peso="${peso}">${peso}</td>
                            <td class="precio" data-precio="${precio}">${precio}</td>
                        <td>
            <button type="button" class="btn btn-warning btn-edit" 
                    data-id="${materialId}" 
                    data-cantidad="${cantidad}" 
                    data-precio="${precio}" 
                    data-peso="${peso}" 
                    data-acopio="${acopioId}">
                <i class="fas fa-edit"></i> Editar
            </button>
            
            <button type="button" class="btn btn-warning btn-edit-peso" 
                    data-id="${materialId}" 
                    data-peso="${peso}" 
                    data-precio="${precio}" 
                    data-cantidad="${cantidad}" 
                    data-acopio="${acopioId}">
                <i class="fas fa-weight"></i> Editar peso
            </button>
            
            <button type="button" class="btn btn-warning btn-edit-precio" 
                    data-id="${materialId}" 
                    data-precio="${precio}" 
                    data-peso="${peso}" 
                    data-cantidad="${cantidad}" 
                    data-acopio="${acopioId}">
                <i class="fas fa-dollar-sign"></i> Editar precio
            </button>
            
            <button type="button" class="btn btn-danger btn-delete" 
                    data-id="${materialId}" 
                    data-acopio="${acopioId}">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </td>
                    </tr>
                `);
                updateMaterialesData();
            });
            $(document).on('click', '.btn-edit', function() {
                var materialId = $(this).data('id');
                var currentCantidad = $(this).data('cantidad');
                var peso = $(this).data('peso');
                var acopioId = $(this).data('acopio');

                Swal.fire({
                    title: 'Editar Cantidad',
                    input: 'number',
                    inputValue: currentCantidad,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        if (!value || value <= 0) {
                            return '¡Necesitas ingresar una cantidad válida!';
                        }
                        var cantidadDisponible = parseInt($(
                            `#materiales option[value="${materialId}"]`).data(
                            'cantidad'));
                        if (value > cantidadDisponible) {
                            return `Cantidad excede el límite disponible (${cantidadDisponible}).`;
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newCantidad = result.value;

                        var row = $(`tr[data-material-id="${materialId}"]`);
                        row.find('.cantidad').text(newCantidad).data('cantidad', newCantidad);

                        updateMaterialesData();
                    }
                });
            });

            $(document).on('click', '.btn-edit-peso', function() {
                var materialId = $(this).data('id');
                var Cantidad = $(this).data('cantidad');
                var currentpeso = $(this).data('peso');
                var acopioId = $(this).data('acopio');

                Swal.fire({
                    title: 'Editar peso',
                    input: 'number',
                    inputValue: currentpeso,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        if (!value || value <= 0) {
                            return '¡Necesitas ingresar una cantidad válida!';
                        }
                        var cantidadDisponible = parseInt($(
                            `#materiales option[value="${materialId}"]`).data(
                            'peso'));

                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newpeso = result.value;

                        var row = $(`tr[data-material-id="${materialId}"]`);
                        row.find('.peso').text(newpeso).data('peso', newpeso);

                        updateMaterialesData();
                    }
                });
            });
            $(document).on('click', '.btn-edit-precio', function() {
                var materialId = $(this).data('id');
                var Cantidad = $(this).data('cantidad');
                var peso = $(this).data('peso');
                var currentprecio = $(this).data('precio');
                var acopioId = $(this).data('acopio');

                Swal.fire({
                    title: 'Editar precio',
                    input: 'number',
                    inputValue: currentprecio,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        if (!value || value <= 0) {
                            return '¡Necesitas ingresar una cantidad válida!';
                        }
                        var cantidadDisponible = parseInt($(
                            `#materiales option[value="${materialId}"]`).data(
                            'peso'));

                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newprecio = result.value;

                        var row = $(`tr[data-material-id="${materialId}"]`);
                        row.find('.precio').text(newprecio).data('precio', newprecio);

                        updateMaterialesData();
                    }
                });
            });

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
                        $(`tr[data-material-id="${materialId}"]`).remove();
                        updateMaterialesData();
                    }
                });
            });

            function toggleRegistrarButton() {
                var materialesData = JSON.parse($('#materialesData').val());
                if (materialesData.length > 0) {
                    $('#registrarBtn').removeAttr('hidden'); // Mostrar el botón
                } else {
                    $('#registrarBtn').attr('hidden', true); // Ocultar el botón
                }
            }


            function updateMaterialesData() {
                var materialesData = [];

                $('tr[data-material-id]').each(function() {
                    var materialId = $(this).data('material-id');
                    var acopioId = $(this).data('acopio-id');
                    var cantidad = $(this).find('.cantidad').data('cantidad');
                    var peso = $(this).find('.peso').data('peso');
                    var precio = $(this).find('.precio').data('precio');
                    materialesData.push({
                        id: materialId,
                        acopio: acopioId,
                        cantidad: cantidad,
                        peso: peso,
                        precio: precio,
                    });
                });

                $('#materialesData').val(JSON.stringify(materialesData));
                toggleRegistrarButton();
            }
        });
    </script>
@endsection
