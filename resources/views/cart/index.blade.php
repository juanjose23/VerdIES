@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Material recolectado')
@section('content')

<div class="container mt-5">
    <form id="clearCartForm" action="{{ route('cart.clear') }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <div class="text-end mt-3 mb-3">
        @if (!is_null($cartItems) && !$cartItems->isEmpty())
        <button id="clearCartBtn" class="btn btn-danger me-2">
            <i class="bi bi-trash"></i> Eliminar cesta
        </button>
       
            <a href="{{route('entrega')}}" class="btn btn-primary me-2">
                <i class="bi bi-box-arrow-up"></i> Realizar entrega
            </a>
        @endif
        <a href="{{ route('recepcion-materia', ['centroAcopio' => $primerCentroAcopio]) }}" class="btn btn-danger">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="row">
        @foreach ($cartItems as $item)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="{{ $item->attributes->image_url }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="item-details mt-3">
                            <h5>{{ $item->name }}</h5>
                            <p>Monedas obtenidas: {{ $item->price }}</p>
                            <p>Cantidad: {{ $item->quantity }}</p>
                            <p>Total: {{ $item->price * $item->quantity }}</p>
                         
                        </div>
                        <div class="item-actions mt-3">
                            <button type="button" class="btn btn-primary btn-custom me-2"
                                onclick="updateQuantity('{{ $item->id }}')">
                                <i class="bi bi-pencil-square"></i> Actualizar cantidad
                            </button>
                            <form id="deleteForm{{ $item->id }}"
                                action="{{ route('cart.remove', ['itemId' => $item->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-custom"
                                    onclick="confirmAction('{{ $item->id }}')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <script>
        document.getElementById('clearCartBtn').addEventListener('click', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará todos los productos del carrito',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar todo la entrega'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('clearCartForm');
                    form.submit();
                }
            });
        });
    </script>


    <script>
        function confirmAction(itemId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará el producto del carrito',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('deleteForm' + itemId);
                    form.submit();
                }
            });
        }


        function updateQuantity(itemId) {
            // Obtener la URL de la acción con el itemId como parte de la ruta
            var actionUrl = "{{ route('cart.update', ['itemId' => ':itemId']) }}";
            actionUrl = actionUrl.replace(':itemId', itemId);

            Swal.fire({
                title: 'Actualizar Cantidad',
                input: 'number',
                inputLabel: 'Nueva Cantidad',
                inputAttributes: {
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Actualizar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (quantity) => {
                    // Asignar la cantidad al input hidden del formulario
                    document.querySelector('#quantityInput').value = quantity;
                    // Establecer la acción del formulario con la URL correcta
                    document.querySelector('#updateForm').action = actionUrl;
                    // Enviar el formulario
                    document.querySelector('#updateForm').submit();
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        }
    </script>

    <form id="updateForm" action="#" method="POST" style="display: none;">
        @csrf
        @method('PUT')
        <input type="hidden" id="quantityInput" name="quantity">
    </form>


    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.css') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif
            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ Session::get('error') }}',
                    confirmButtonText: 'Aceptar'
                });
            @endif
        });
    </script>
@endsection
