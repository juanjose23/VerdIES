@extends('Layouts.layouts')
@section('title', 'Usuarios')

@section('content')
    <div class="col-xl">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center  text-black">
                <h5 class="mb-0">Crear Usuario</h5>
                <small class="text-gray float-end">Campos requeridos *</small>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Nombre completo -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="nombre" class="form-label text-dark"><i class="bx bx-user"></i> Nombre completo *</label>
                                <input style="width: 100%" id="nombre" name="nombre" placeholder="Ingresa el nombre completo"
                                    class=" form-control @error('nombre') is-invalid @enderror" value=" {{ old('nombre') }}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Roles -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="roles" class="form-label text-dark"><i class="bx bx-briefcase-alt"></i> Roles*</label>
                                <select style="width: 100%" id="roles" name="roles"
                                    class="form-select buscador @error('roles') is-invalid @enderror">
                                    <option value="">Seleccionar roles</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ old('roles') == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="estado" class="form-label text-dark"><i class="bx bx-toggle-left"></i> Estado</label>
                                <select id="estado" name="estado" class="form-select buscador @error('estado') is-invalid @enderror">
                                    <option selected disabled>Elegir estado</option>
                                    <option value="2" {{ old('estado') == '2' ? 'selected' : '' }}>Verficar</option>
                                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="col-md-12 mt-4">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('usuarios.index') }}" class="btn btn-danger mb-2 me-md-2">
                                    <i class="bx bx-x-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary mb-2">
                                    <i class="bx bx-check-circle"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
