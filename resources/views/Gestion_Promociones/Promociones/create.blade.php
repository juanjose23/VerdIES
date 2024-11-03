@extends('Layouts.layouts')
@section('title', 'Promociones')
<link rel="stylesheet" href="{{ asset('administrador/assets/vendor/libs/quill/editor.css') }}">
<link rel="stylesheet" href="{{ asset('administrador/assets/vendor/libs/dropzone/dropzone.css') }}">
<style>
    .image-preview {
        display: none;
        width: 200px;
        height: auto;
        margin-top: 10px;
    }
</style>
@section('content')
    <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Agregar una nueva promocion</h4>

            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <div class="d-flex gap-4">
                    <a class="btn btn-label-secondary" href="{{ route('promociones.index') }}">Descartar</a>

                </div>
                <button type="submit" class="btn btn-primary">Publicar promoción</button>
            </div>

        </div>


        <div class="row">

            <div class="col-12 col-lg-8">
                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Informacion General</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-name">Nombre de la promocion</label>
                            <input type="text" id="nombre" name="nombre"
                                placeholder="Escribe el nombre de la promocion"
                                class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="row mb-6">
                            <div class="col">
                                <label class="form-label" for="cantidad">Cupos</label>
                                <input type="number" class="form-control  @error('cantidad') is-invalid @enderror"
                                    id="cantidad" placeholder="Cantidad de cupos" name="cantidad" aria-label="Product SKU"
                                    value="{{ old('cantidad') }}">
                                @error('cantidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col">
                                <label class="form-label" for="ecommerce-product-barcode">Fecha de
                                    vencimiento</label>
                                <input type="date"
                                    class="form-control @error('fecha') is-invalid
                                
                            @enderror"
                                    id="ecommerce-product-barcode" name="fecha" aria-label="Product barcode"
                                    value="{{ old('fecha') }}">
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Description -->
                        <div>
                            <label class="mb-1">Descripción (Opcional)</label>
                            <textarea name="descripcion" class="form-control" id="" cols="30" rows="10"></textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Logo de la promocion</h5>

                    </div>
                    <div class="card-body">
                        <div class="row mb-6">

                            <input type="file" class="form-control @error('imagen')  is-invalid @enderror "id="imageInput" name="imagen" accept=".jpg,.jpeg,.png,.gif" >
                            @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            <br>
                            <br>
                            <img id="imagePreview" class="image-preview" alt="Image Preview">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">

                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Precios</h5>
                    </div>
                    <div class="card-body">
                        <!-- Base Price -->
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-price">Precio Base en C$</label>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror"
                                id="ecommerce-product-price" placeholder="Precio " name="precio" aria-label="Product price"
                                value="{{ old('precio') }}">
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Discounted Price -->
                        <div class="mb-6">
                            <label class="form-label" for="ecommerce-product-discount-price">Valor virtual</label>
                            <input type="number" class="form-control  @error('preciomoneda') is-invalid @enderror"
                                id="ecommerce-product-discount-price" placeholder="Valor en moneda virtual"
                                name="preciomoneda" aria-label="Product discounted price"
                                value="{{ old('preciomoneda') }}">
                            @error('preciomoneda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-6">
                            <label for="moneda" class="form-label text-dark">Moneda virtual *</label>
                            <select style="width: 100%" id="moneda" name="moneda"
                                class="select2 form-select @error('moneda') is-invalid @enderror">
                                <option>Seleccionar moneda</option>
                                @foreach ($monedas as $moneda)
                                    <option value="{{ $moneda->id }}"
                                        {{ old('moneda') == $moneda->id ? 'selected' : '' }}>
                                        {{ $moneda->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('moneda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>
                    </div>
                </div>

                <div class="card mb-6">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detalles Adicionales</h5>
                    </div>
                    <div class="card-body">


                        <div class="mb-6 col">
                            <label class="form-label mb-1" for="category-org">
                                <span>Categorias</span>
                            </label>
                            <select style="width: 100%" id="categorias" name="categorias"
                                class="select2 form-select @error('categorias') is-invalid @enderror">
                                <option>Seleccionar Aliado</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categorias') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorias')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>

                        <div class="mb-6 col">
                            <label class="form-label mb-1" for="status-org">Estado
                            </label>
                            <select id="estado" name="estado"
                                class="select2 form-select @error('estado') is-invalid @enderror">
                                <option selected disabled>Elegir estado</option>
                                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
  
    </script>
    <script src="{{ asset('administrador/assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('administrador/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('administrador/assets/vendor/libs/dropzone/dropzone.js') }}"></script>
@endsection
