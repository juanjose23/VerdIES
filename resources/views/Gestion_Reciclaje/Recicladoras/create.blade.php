@extends('Layouts.layouts')
@section('title', 'Recicladoras')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Registrar Recicladora</h5>
                <small class="text-muted float-end">Campos requeridos *</small>
            </div>
            <div class="card-body">
                <form action="{{ route('recicladoras.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label text-dark">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Escribe el nombre "
                                    class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                                @error('nombre')
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
                                    <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono" class="form-label text-dark">Telefono *</label>
                                <input type="tel" id="telefono" name="telefono" placeholder="Escribe el telefono"
                                    class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo" class="form-label text-dark">Correo electronico*</label>
                                <input type="email" id="correo" name="correo" placeholder="Escribe el correo"
                                    class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}">
                                @error('correo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_contacto" class="form-label text-dark">Nombre del contacto*</label>
                                <input type="text" id="nombre_contacto" name="nombre_contacto" placeholder="Escribe el nombre contacto "
                                    class="form-control @error('nombre_contacto') is-invalid @enderror" value="{{ old('nombre_contacto') }}">
                                @error('nombre_contacto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contacto_telefono" class="form-label text-dark">Telefono *</label>
                                <input type="tel" id="contacto_telefono" name="contacto_telefono" placeholder="Escribe el telefono"
                                    class="form-control @error('contacto_telefono') is-invalid @enderror" value="{{ old('contacto_telefono') }}">
                                @error('contacto_telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contacto_correo" class="form-label text-dark">Correo electronico del contacto*</label>
                                <input type="email" id="contacto_correo" name="contacto_correo" placeholder="Escribe el correo"
                                    class="form-control @error('contacto_correo') is-invalid @enderror" value="{{ old('contacto_correo') }}">
                                @error('contacto_correo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                      
                      
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion" class="form-label text-dark">Dirección</label>
                                <textarea id="direccion" name="direccion" rows="3"
                                    class="form-control @error('direccion') is-invalid @enderror">{{ old('direccion') }}</textarea>
                                @error('direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                <a href="{{ route('recicladoras.index') }}" class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
