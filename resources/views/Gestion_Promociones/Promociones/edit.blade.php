@extends('Layouts.layouts')
@section('title', 'Promociones')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Registrar Promocion</h5>
                <small class="text-muted float-end">Campos requeridos *</small>
            </div>
            <div class="card-body">
                <form action="{{ route('promociones.update',$promocion->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categorias" class="form-label text-dark">Aliados *</label>
                                <input type="text" id="nombre" name="categoria"
                                placeholder="Escribe el nombre de la categoria"
                                class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre',$promocion->nombre) }}">
                                @error('categorias')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label text-dark">Nombre de la promocion *</label>
                                <input type="text" id="nombre" name="nombre"
                                    placeholder="Escribe el nombre de la categoria"
                                    class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre',$promocion->nombre) }}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha" class="form-label text-dark">Fecha de vencimiento *</label>
                                @php
                                $fecha_vencimiento = $promocion['fecha_vencimiento'] ?? null;
                                $fecha_formateada = old('fecha', $fecha_vencimiento ? \Carbon\Carbon::parse($fecha_vencimiento)->format('Y-m-d') : null);
                            @endphp
                            
                            <input type="date" id="fecha" name="fecha"
                                   placeholder="Escribe la fecha de vencimiento"
                                   class="form-control @error('fecha') is-invalid @enderror"
                                   value="{{ $fecha_formateada }}">
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado" class="form-label text-dark">Estado *</label>
                                <select id="estado" name="estado"
                                    class="form-select @error('estado') is-invalid @enderror">
                                    <option selected disabled>Elegir estado</option>
                                    <option value="1" {{ old('estado',$promocion->estado) == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('estado',$promocion->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label text-dark">Imagen *</label>
                                <input type="file" id="imagen" name="imagen"
                                    placeholder="Escribe el nombre de la categoria"
                                    class="form-control @error('imagen') is-invalid @enderror" value="{{ old('imagen') }}">
                                @error('imagen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad" class="form-label text-dark">Numero de cupos *</label>
                                <input type="number" id="cantidad" name="cantidad" placeholder="Escribe el total de cupos"
                                    class="form-control @error('cantidad') is-invalid @enderror"
                                    value="{{ old('cantidad',$promocion->detalles->cantidad) }}">
                                @error('cantidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio" class="form-label text-dark">Precio en cordobas *</label>
                                <input type="number" id="precio" name="precio"
                                    placeholder="Escribe el precio en cordoba"
                                    class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio',$promocion->detalles->valor) }}">
                                @error('precio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="moneda" class="form-label text-dark">Moneda virtual *</label>
                                <select style="width: 100%" id="moneda" name="moneda"
                                    class="buscador form-select @error('moneda') is-invalid @enderror">
                                    <option>Seleccionar moneda</option>
                                    @foreach ($monedas as $moneda)
                                        <option value="{{ $moneda->id }}"
                                            {{ old('moneda',$promocion->detalles->monedas_id) == $moneda->id ? 'selected' : '' }}>
                                            {{ $moneda->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('moneda')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preciomoneda" class="form-label text-dark">Precio en moneda virtual *</label>
                                <input type="number" id="preciomoneda" name="preciomoneda"
                                    placeholder="Escribe el precio en moneda virtual"
                                    class="form-control @error('preciomoneda') is-invalid @enderror" value="{{ old('preciomoneda',$promocion->detalles->cantidadmoneda) }}">
                                @error('preciomoneda')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion" class="form-label text-dark">Descripción</label>
                                <textarea id="descripcion" name="descripcion" rows="3"
                                    class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion',$promocion->descripcion) }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                <a href="{{ route('promociones.index') }}"
                                    class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var fechaInput = document.getElementById('fecha');
        var fechaValor = fechaInput.value;

        if (fechaValor) {
            var date = new Date(fechaValor);
            var year = date.getFullYear();
            var month = ('0' + (date.getMonth() + 1)).slice(-2);
            var day = ('0' + date.getDate()).slice(-2);
            fechaInput.value = `${year}-${month}-${day}`;
        }
    });
</script>
