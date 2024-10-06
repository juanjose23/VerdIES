@extends('gestioncatalogos::layouts.master')
@section('title', 'Monedas/Logo')
@section('content')
   
    <div class="container mt-5">
        <h2 class="text-center">Logos</h2>

        <form action="{{ route('monedas.update', ['monedas' => $Moneda->id]) }}"
          style="background-color: transparent;" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
           
            <div class="fallback">
                <input name="imagen" type="file" required>
            </div>

            <!-- Buttons: Upload and Remove -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-submit" id="submit-all"
                    style="display: none;">Guardar</button>
              
            </div>
        </form>
    </div>

    <!-- Dropzone.js -->
  
@endsection
