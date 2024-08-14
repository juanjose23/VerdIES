@extends('Layouts.layouts')
@section('title', 'Roles')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Historial de tasas</h5>
                <small class="text-muted float-end">Campos requeridos *</small>
            </div>
            <div class="card-body">

                <form action="{{ route('tasas.update', $materiales->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usuario" class="form-label text-dark">Categoria:</label>
                                <input type="text" id="usuario" name="usuario" placeholder="Escriba el usuario"
                                    class="form-control @error('usuario') is-invalid @enderror"
                                    value="{{ $materiales->categorias->nombre }}" disabled>
                                @error('usuario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empleado" class="form-label text-dark">Material:</label>
                                <input type="text" class="form-control" value="{{ $materiales->nombre }} " disabled>

                            </div>
                        </div>

<input type="hidde" value="{{$materiales->id}}" name="materiales_id" hidden>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monedas" class="form-label text-dark">Agregar nueva tasa:</label>
                                <select style="width: 100%" id="monedas" name="monedas"
                                    class="buscador form-select @error('monedas') is-invalid @enderror">
                                    <option>Seleccionar tasa</option>
                                    @foreach ($monedas as $moneda)
                                        <option value="{{ $moneda->id }}"
                                            {{ old('monedas') == $moneda->id ? 'selected' : '' }}>
                                            {{ $moneda->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('monedas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad" class="form-label text-dark">Cantidad:</label>
                                <input type="text" id="cantidad" name="cantidad" placeholder="Escriba la cantidad"
                                    class="form-control @error('cantidad') is-invalid @enderror" value="">
                                @error('cantidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado" class="form-label text-dark">Estado</label>
                                <select id="estado" name="estado"
                                    class="form-select   @error('estado') is-invalid @enderror">
                                    <option selected disabled>Elegir estado</option>
                                    <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                <a href="{{ route('tasas.index') }}" class="btn btn-danger mb-2 me-md-2">Volver al
                                    inicio</a>
                                <button type="submit" class="btn btn-primary mb-2">Registrar nueva tasa</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <h3 class="h3 mb-3"></h3>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-black">Historico de tasa</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">#</span>
                                        </th>

                                        <th scope="col" class="px-4 py-3">Moneda</th>
                                        <th scope="col" class="px-4 py-3">Cantidad</th>
                                        <th scope="col" class="px-4 py-3">Fecha de registro</th>
                                        <th scope="col" class="px-4 py-3">Fecha de Actualizacion</th>
                                        <th scope="col" class="px-4 py-3">Estado</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasas as $tasa)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>{{ $tasa->monedas->nombre }}</td>
                                            <td>{{ $tasa->cantidad }}</td>
                                            <td>{{ $tasa->created_at }}</td>
                                            <td>{{ $tasa->updated_at }}</td>
                                            <td><span
                                                    class="badge rounded-pill {{ $tasa->estado == 1 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $tasa->estado == 1 ? 'Activo' : 'Inactivo' }}
                                                </span></td>
                                            <td>
                                                <div class="mr-1">

                                                    <!-- Botón para activar/desactivar -->
                                                    @if ($tasa->estado == 1)
                                                        <button type="button"
                                                            class="btn btn-{{ $tasa->estado == 1 ? 'danger' : 'success' }}"
                                                            role="button" onclick="confirmAction({{ $tasa->id }})">
                                                            <i
                                                                class="fas fa-{{ $tasa->estado == 1 ? 'trash' : 'power' }}"></i>
                                                        </button>
                                                    @endif


                                                </div>
                                                <form id="deleteForm{{ $tasa->id }}"
                                                    action="{{ route('tasas.destroy', ['tasas' => $tasa->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Este botón no es visible, pero se utilizará para activar el SweetAlert -->
                                                    <button id="submitBtn{{ $tasa->id }}" type="submit"
                                                        style="display: none;"></button>
                                                </form>

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
@endsection
<script>
    function confirmAction(tasaId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Quieres cambiar el estado de esta tasa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cambiar estado'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('deleteForm' + tasaId);

                // Agregar un campo oculto al formulario para indicar la acción
                var actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = '_method';
                actionInput.value = 'DELETE';
                form.appendChild(actionInput);

                // Enviar el formulario
                form.submit();
            }
        });
    }
</script>
