@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Acerca de nosotros')
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Registrar carreras</h5>
                        <small class="text-muted float-end">Campos requeridos *</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('realizar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label text-dark">Escribe este Código en la bolsa
                                            de tu entrega *</label>
                                        <input type="text" id="nombre" name="nombre" placeholder=""
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ $codigo }}" disabled>
                                        <input type="text" id="nombre" name="codigo" placeholder=""
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ $codigo }}" hidden>
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label text-dark">Toma una foto con el paquete de
                                            todos tus materiales con tu codigo *</label>
                                        <input type="file" id="imagen" name="imagen"
                                            placeholder="Escribe el nombre de la categoria"
                                            class="form-control @error('imagen') is-invalid @enderror"
                                            value="{{ old('imagen') }}">
                                        @error('imagen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                        <a href="{{ route('cart.index') }}" class="btn btn-danger mb-2 me-md-2">Cancelar</a>
                                        <button type="submit" class="btn btn-primary mb-2">Registrar entrega</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
