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
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="cantidadlibra" class="form-label text-dark">Cantidad *</label>
                                        <input type="number" id="cantidadlibra" name="cantidadlibra" min="1"
                                            step="1" placeholder="Escribe la cantidad"
                                            class="form-control @error('cantidadlibra') is-invalid @enderror">
                                        @error('cantidadlibra')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Botones para agregar materiales -->
                                <div class="col-md-12 mb-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <button type="button" id="addMaterial" class="btn btn-warning mb-2">Agregar
                                            Material</button>


                                        <a href="{{ route('entregas.index') }}"
                                            class="btn btn-danger mb-2 me-md-2">Cancelar</a>
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
                        <h5 class="card-title">Materiales Recepcionados</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="materialesTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad en libra</th>
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
    
            // Cargar datos de localStorage al inicio
            loadFromLocalStorage();
    
            $('#addMaterial').on('click', function() {
                var materialId = $('#materiales').val();
                var materialNombre = $('#materiales option:selected').text();
                var cantidad = parseFloat($('#cantidad').val()) || 0;
                var cantidadlibra = parseFloat($('#cantidadlibra').val()) || 0;
    
                // Validación: Solo una cantidad puede ser mayor a 0
                if (cantidad > 0 && cantidadlibra > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Solo puedes ingresar un valor en cantidad o cantidad en libras, no en ambos.'
                    });
                    return;
                }
    
                if (cantidad === 0 && cantidadlibra === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Debe ingresar al menos una cantidad o cantidad en libras.'
                    });
                    return;
                }
    
                // Buscar si el material ya existe en la tabla
                var rowExistente = $('tr[data-material-id="' + materialId + '"]');
    
                if (rowExistente.length) {
                    var cantidadExistente = parseFloat(rowExistente.find('.cantidad').data('cantidad')) || 0;
                    var cantidadLibraExistente = parseFloat(rowExistente.find('.cantidad-libra').data('cantidad-libra')) || 0;
    
                    var nuevaCantidad = cantidadExistente + cantidad;
                    var nuevaCantidadLibra = cantidadLibraExistente + cantidadlibra;
    
                    rowExistente.find('.cantidad').text(nuevaCantidad).data('cantidad', nuevaCantidad);
                    rowExistente.find('.cantidad-libra').text(nuevaCantidadLibra).data('cantidad-libra', nuevaCantidadLibra);
    
                    toggleButtons(rowExistente, nuevaCantidad, nuevaCantidadLibra);
                } else {
                    counter++;
                    var rowHtml = `
                        <tr data-material-id="${materialId}">
                            <td>${counter}</td>
                            <td class="material-nombre">${materialNombre}</td>
                            <td class="cantidad" data-cantidad="${cantidad}">${cantidad}</td>
                            <td class="cantidad-libra" data-cantidad-libra="${cantidadlibra}">${cantidadlibra}</td>
                            <td>
                                ${cantidad > 0 ? `<button type="button" class="btn btn-warning btn-edit-cantidad" data-id="${materialId}" data-cantidad="${cantidad}">Editar Cantidad</button>` : ''}
                                ${cantidadlibra > 0 ? `<button type="button" class="btn btn-warning btn-edit-libra" data-id="${materialId}" data-cantidad-libra="${cantidadlibra}">Editar Libras</button>` : ''}
                                <button type="button" class="btn btn-info btn-switch" data-id="${materialId}">Cambiar entre Unidades y Libras</button>
                                <button type="button" class="btn btn-danger btn-delete" data-id="${materialId}">Eliminar</button>
                            </td>
                        </tr>
                    `;
    
                    $('#materialesTable tbody').append(rowHtml);
                }
    
                updateMaterialesData();
                $('#cantidad').val('');
                $('#cantidadlibra').val('');
            });
    
            function toggleButtons(row, cantidad, cantidadLibra) {
                // Toggle botones de editar cantidad
                if (cantidad > 0) {
                    if (!row.find('.btn-edit-cantidad').length) {
                        row.find('td:last-child').prepend(`<button type="button" class="btn btn-warning btn-edit-cantidad" data-id="${row.data('material-id')}" data-cantidad="${cantidad}">Editar Cantidad</button>`);
                    }
                } else {
                    row.find('.btn-edit-cantidad').remove();
                }
    
                // Toggle botones de editar libras
                if (cantidadLibra > 0) {
                    if (!row.find('.btn-edit-libra').length) {
                        row.find('td:last-child').prepend(`<button type="button" class="btn btn-warning btn-edit-libra" data-id="${row.data('material-id')}" data-cantidad-libra="${cantidadLibra}">Editar Libras</button>`);
                    }
                } else {
                    row.find('.btn-edit-libra').remove();
                }
            }
    
            // Editar cantidad de material
            $(document).on('click', '.btn-edit-cantidad', function() {
                var materialId = $(this).data('id');
                var currentCantidad = $(this).data('cantidad');
    
                Swal.fire({
                    title: 'Editar Cantidad',
                    input: 'number',
                    inputValue: currentCantidad,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        if (!value) {
                            return '¡Necesitas ingresar una cantidad!';
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newCantidad = result.value;
                        var row = $('tr[data-material-id="' + materialId + '"]');
                        row.find('.cantidad').text(newCantidad).data('cantidad', newCantidad);
                        updateMaterialesData();
                        toggleButtons(row, newCantidad, parseFloat(row.find('.cantidad-libra').data('cantidad-libra')) || 0);
                    }
                });
            });
    
            // Editar cantidad de material en libras
            $(document).on('click', '.btn-edit-libra', function() {
                var materialId = $(this).data('id');
                var currentCantidadLibra = $(this).data('cantidad-libra');
    
                Swal.fire({
                    title: 'Editar Cantidad en Libras',
                    input: 'number',
                    inputValue: currentCantidadLibra,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    inputValidator: (value) => {
                        if (!value) {
                            return '¡Necesitas ingresar una cantidad!';
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newCantidadLibra = result.value;
                        var row = $('tr[data-material-id="' + materialId + '"]');
                        row.find('.cantidad-libra').text(newCantidadLibra).data('cantidad-libra', newCantidadLibra);
                        updateMaterialesData();
                        toggleButtons(row, parseFloat(row.find('.cantidad').data('cantidad')) || 0, newCantidadLibra);
                    }
                });
            });
    
            // Cambiar entre cantidad y cantidad en libras
            $(document).on('click', '.btn-switch', function() {
                var materialId = $(this).data('id');
                var row = $('tr[data-material-id="' + materialId + '"]');
                var cantidad = parseFloat(row.find('.cantidad').data('cantidad')) || 0;
                var cantidadlibra = parseFloat(row.find('.cantidad-libra').data('cantidad-libra')) || 0;
    
                // Intercambiar las cantidades
                row.find('.cantidad').text(cantidadlibra).data('cantidad', cantidadlibra);
                row.find('.cantidad-libra').text(cantidad).data('cantidad-libra', cantidad);
    
                updateMaterialesData();
                toggleButtons(row, cantidadlibra, cantidad);
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
                        updateMaterialesData();
                    }
                });
            });
    
            function updateMaterialesData() {
                var materialesData = [];
    
                $('tr[data-material-id]').each(function() {
                    var materialId = $(this).data('material-id');
                    var materialNombre = $(this).find('.material-nombre').text();
                    var cantidad = parseFloat($(this).find('.cantidad').data('cantidad')) || 0;
                    var cantidadlibra = parseFloat($(this).find('.cantidad-libra').data('cantidad-libra')) || 0;
    
                    materialesData.push({
                        materialId: materialId,
                        materialNombre: materialNombre,
                        cantidad: cantidad,
                        cantidadlibra: cantidadlibra
                    });
                });
    
                // Guardar los datos en localStorage
                localStorage.setItem('materialesData', JSON.stringify(materialesData));
    
                // Actualizar el valor del input hidden
                $('#materialesData').val(JSON.stringify(materialesData));
            }
    
            function loadFromLocalStorage() {
                var storedData = localStorage.getItem('materialesData');
    
                if (storedData) {
                    var materialesData = JSON.parse(storedData);
                    counter = 0;
                    materialesData.forEach(function(material) {
                        counter++;
                        var rowHtml = `
                            <tr data-material-id="${material.materialId}">
                                <td>${counter}</td>
                                <td class="material-nombre">${material.materialNombre}</td>
                                <td class="cantidad" data-cantidad="${material.cantidad}">${material.cantidad}</td>
                                <td class="cantidad-libra" data-cantidad-libra="${material.cantidadlibra}">${material.cantidadlibra}</td>
                                <td>
                                    ${material.cantidad > 0 ? `<button type="button" class="btn btn-warning btn-edit-cantidad" data-id="${material.materialId}" data-cantidad="${material.cantidad}">Editar Cantidad</button>` : ''}
                                    ${material.cantidadlibra > 0 ? `<button type="button" class="btn btn-warning btn-edit-libra" data-id="${material.materialId}" data-cantidad-libra="${material.cantidadlibra}">Editar Libras</button>` : ''}
                                    <button type="button" class="btn btn-info btn-switch" data-id="${material.materialId}">Cambiar entre Unidades y Libras</button>
                                    <button type="button" class="btn btn-danger btn-delete" data-id="${material.materialId}">Eliminar</button>
                                </td>
                            </tr>
                        `;
    
                        $('#materialesTable tbody').append(rowHtml);
                    });
    
                    // Restaurar el valor del input hidden con los datos de localStorage
                    $('#materialesData').val(storedData);
                }
            }
        });
    </script>
    
@endsection
