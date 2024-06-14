@extends('Layouts.layouts')
@section('title', 'Verficar entregas')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('inventarios.update', $entrega->id) }}" method="POST" class="d-md-flex w-100">
                @csrf
                @method('PUT')
                <!-- Columna principal -->
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Editar Inventarios </h5>
                            <small class="text-muted float-end">Campos requeridos *</small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Nombre -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label text-dark">Centro de acopio *</label>
                                        <input type="text" id="nombre" name="nombre"
                                            placeholder="Escribe el nombre de la categoría"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ old('nombre', $entrega->acopios->nombre) }}" disabled>
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Correo -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="correo" class="form-label text-dark">Categoria del material *</label>
                                        <input type="text" id="correo" name="correo" placeholder="Escribe el correo"
                                            class="form-control @error('correo') is-invalid @enderror"
                                            value="{{ old('correo', $entrega->materiales->categorias->nombre) }}" disabled>
                                        @error('correo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Centro de acopio -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="centro_acopio" class="form-label text-dark">Material *</label>
                                        <input type="text" id="centro_acopio" name="centro_acopio"
                                            placeholder="Escribe el nombre del centro de acopio"
                                            class="form-control @error('centro_acopio') is-invalid @enderror"
                                            value="{{ old('centro_acopio', $entrega->materiales->nombre) }}" disabled>
                                        @error('centro_acopio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="cantidad" class="form-label text-dark">Cantidad *</label>
                                        <input type="number" id="cantidad" name="cantidad"
                                            placeholder="Escribe el nombre del centro de acopio"
                                            class="form-control @error('cantidad') is-invalid @enderror"
                                            value="{{ old('cantidad', $entrega->cantidad) }}">
                                        @error('cantidad')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Estado -->
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="estado" class="form-label text-dark">Estado *</label>
                                        <select id="estado" name="estado"
                                            class="form-select @error('estado') is-invalid @enderror">
                                            <option selected disabled>Elegir estado</option>
                                            <option value="1"
                                                {{ old('estado', $entrega->estado) == '1' ? 'selected' : '' }}>Activo
                                            </option>
                                            <option value="2"
                                                {{ old('estado', $entrega->estado) == '0' ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <!-- Botones -->
                                <div class="col-md-12 mb-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <a href="{{ route('entregas.index') }}"
                                            class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>

    @endsection
