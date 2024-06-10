@extends('Layouts.layouts')
@section('title', 'Materiales')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Registrar Tasa</h5>
                <small class="text-muted float-end">Campos requeridos *</small>
            </div>
            <div class="card-body">
                <form action="{{ route('tasas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="materiales" class="form-label text-dark">Material *</label>
                                <select style="width: 100%" id="materiales" name="materiales"
                                    class="buscador form-select @error('materiales') is-invalid @enderror">
                                    <option>Seleccionar Material</option>
                                    {{var_dump($materiales);}}
                                    @foreach ($materiales as $material => $sub)
                                    <optgroup label="{{ $material }}">
                                        @foreach ($sub as $subs)
                                            <option value="{{ $subs['id'] }}"
                                                {{ old('materiales') == $subs['id'] ? 'selected' : '' }}>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monedas" class="form-label text-dark">Moneda *</label>
                                <select style="width: 100%" id="monedas" name="monedas"
                                    class="buscador form-select @error('monedas') is-invalid @enderror">
                                    <option>Seleccionar Moneda</option>
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
                                <label for="cantidad" class="form-label text-dark">Cantidad</label>
                                <input type="text" id="cantidad" name="cantidad" placeholder="Escribe tu nombre"
                                    class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad') }}">
                                @error('cantidad')
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
                       
                       
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                <a href="{{ route('tasas.index') }}" class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
